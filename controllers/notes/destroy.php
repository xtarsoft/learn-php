<?php

use Models\Notes;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? null;

    if (!$id) {
        header('Location: /notes');
    }

    $model = new Notes();
    $note = $model->find($id);

    auth(!isset($note['user_id']) || $note['user_id'] !== 3);

    $model->destroy($id);

    header('Location: /notes');
}