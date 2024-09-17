<?php

use Models\Notes;

$title = 'Create Notes';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'The note body is required';
    }

    if (strlen($_POST['body']) > 1000) {
        $errors['body'] = 'The note body must be less than 1,000 characters';
    }

    if (empty($errors)) {
        $data = [
            'body' => $_POST['body'],
            'user_id' => 3
        ];
        $table = new Notes();
        $table->create($data);
    }
}

include view('note-create');
