<?php

use Core\Validator;
use Models\Notes;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'The body field is required and must be less than 1000 characters.';
    }
    if (empty($errors)) {
        $data = [
            'body' => $_POST['body'],
            'user_id' => 3
        ];
        $table = new Notes();
        $table->create($data);
    } else {
        return view('notes.create',['title' => 'Create Notes' , 'errors' => $errors]);
    }

    header('Location: /notes');
}