<?php
// pattern to locate suspect phrases
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
// validate the user's email
if (!$suspect && !empty($email)) {
    $validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($validemail) {
        $headers[] = "Reply-To: $validemail";
    } else {
        $errors['email'] = true;
    }
}
