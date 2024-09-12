<?php

use Models\Notes;

$title = 'Create Notes';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'body' => $_POST['body'],
        'user_id' => 3
    ];

    $table = new Notes();
    $table->create($data);
}

include view('note-create');
