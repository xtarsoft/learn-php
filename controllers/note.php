<?php

use core\Response;

$title = 'Note';

$model = new models\Notes();
$note = $model->find($_GET['id']);

// If note not found
if (!$note) {
    abort();
}

//Auth
$user_id = 3;

if ($note['user_id'] !== $user_id) {
    abort(Response::FORBIDDEN);
}

include view('note');
