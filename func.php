<?php

function clean($input) {
    // Remove spaces
    $input = trim($input);

    // Remove slaches
    $input = stripslashes($input);

    
    $input =htmlspecialchars($input);

    return $input;
}
function sanitize($username) {
    // Define a regular expression pattern to allow only alphanumeric characters and underscores
    $pattern = '/[^a-zA-Z0-9_]/';
    
    // Use preg_replace to remove disallowed characters
    $sanitized_username = preg_replace($pattern, '', $username);
    
    return $sanitized_username;
}
function is_password_complex($password) {
    // Define complexity rules
    $length_rule = strlen($password) >= 8;
    $uppercase_rule = preg_match('/[A-Z]/', $password);
    $lowercase_rule = preg_match('/[a-z]/', $password);
    $digit_rule = preg_match('/\d/', $password);
    $special_char_rule = preg_match('/[@$!%*?&]/', $password);
    
    // Check all rules
    return $length_rule && $uppercase_rule && $lowercase_rule && $digit_rule && $special_char_rule;
}




?>