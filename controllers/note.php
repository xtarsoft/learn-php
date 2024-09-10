<?php

use Models\Notes;

$title = 'Note';

$model = new Notes();
$note = $model->find($_GET['id']);


auth(!isset($note['user_id']) || $note['user_id'] !== 3);


include view('note');
