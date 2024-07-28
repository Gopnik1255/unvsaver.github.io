<?php
// login.php

// Path to the text file containing credentials
$credentials_file = 'docs.txt';

// Retrieve the username and password from the POST request
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Read credentials from the file
$credentials = file($credentials_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$is_valid = false;

foreach ($credentials as $line) {
    list($stored_username, $stored_password) = explode(':', $line);

    // Check if the username and password match
    if ($username === $stored_username && $password === $stored_password) {
        $is_valid = true;
        break;
    }
}

if ($is_valid) {
    echo 'Login successful! Welcome, ' . htmlspecialchars($username) . '.';
} else {
    echo 'Invalid username or password. Please <a href="login.html">try again</a>.';
}
?>
