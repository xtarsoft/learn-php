<?php

use Core\Validator;
use Models\Users;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];
    if (!Validator::email($email)) {
        $errors['email'] = 'Please enter a valid email address.';
        $errors['current_email'] = $email;
    }

    if (!Validator::string($password, 6, 255)) {
        $errors['password'] = 'The password field is required and must be at least 6 characters.';
        $errors['current_email'] = $email;
    }

    if (!empty($errors)) {
        return view('register', ['title' => 'Register', 'errors' => $errors]);
    }

    $table = new Users();
    $user = $table->where('email', $email)->first();

    if (!$user) {
        $table->create([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = [
            'email' => $email
        ];
    }
    header('Location: /');
    die();
}