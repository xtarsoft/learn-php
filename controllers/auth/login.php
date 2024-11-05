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

    if (!empty($errors)) {
        return view('register', ['title' => 'Register', 'errors' => $errors]);
    }

    $table = new Users();
    $user = $table->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = [
            'email' => $email
        ];
    }
    header('Location: /');
    die();
}