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
        return $this->errors ? false : true;
    }

    public function getErrors() {
        return $this->errors;
    }

}
