<?php
// pattern to locate suspect content
$pattern = '/[\s\r\n]|Content-Type:|Bcc:|Cc:/i';
// check the submitted email address
$suspect = preg_match($pattern, $_POST['email']);

if (!$suspect) {
    foreach ($_POST as $key => $value) {
        // strip whitespace from $value if not an array
        if (!is_array($value)) {
            $value = trim($value);
        }
        if (!in_array($key, $expected)) {
            // ignore the value, it's not in $expected
            continue;
        }
        if (in_array($key, $required) && empty($value)) {
            // required value is missing
            $missing[] = $key;
            $$key = "";
            continue;
        }
        $$key = $value;
    }
}