<?php
namespace PhpSolutions\Authenticate;

class CheckPassword {

    protected $password;
    protected $minChars;
    protected $mixedCase = false;
    protected $minNums = 0;
    protected $minSymbols = 0;
    protected $errors = [];

    public function __construct($password, $minChars = 8) {
        $this->password = $password;
        $this->minChars = $minChars;
    }

    public function requireMixedCase() {
        $this->mixedCase = true;
    }

    public function requireNumbers($num = 1) {
        if (is_numeric($num) && $num > 0) {
            $this->minNums = (int) $num;
        }
    }

    public function requireSymbols($num = 1) {
        if (is_numeric($num) && $num > 0) {
            $this->minSymbols = (int) $num;
        }
    }

    public function check() {
        if (preg_match('/\s{2,}/', $this->password)) {
            $this->errors[] = 'Password can contain only single spaces.';
        }
        if (preg_match('/^\s+|\s+$/', $this->password)) {
            $this->errors[] = 'Password cannot begin or end with spaces.';
        }
        if (strlen($this->password) < $this->minChars) {
            $this->errors[] = "Password must be at least 
                    $this->minChars characters.";
        }
        if ($this->mixedCase) {
            $pattern = '/(?=.*\p{Ll})(?=.*\p{Lu})/u';
            if (!preg_match($pattern, $this->password)) {
                $this->errors[] = 'Password should include uppercase 
                        and lowercase characters.';
            }
        }
        if ($this->minNums) {
            $pattern = '/\d/';
            $found = preg_match_all($pattern, $this->password, $matches);
            if ($found < $this->minNums) {
                $this->errors[] = "Password should include at least 
                        $this->minNums number(s).";
            }
        }
        if ($this->minSymbols) {
            $pattern =  '/[\p{S}\p{P}]/u';
            $found = preg_match_all($pattern, $this->password, $matches);
            if ($found < $this->minSymbols) {
                $this->errors[] = "Password should include at least 
                        $this->minSymbols nonalphanumeric character(s).";
            }
        }
        return $this->errors ? false : true;
    }

    public function getErrors() {
        return $this->errors;
    }

}