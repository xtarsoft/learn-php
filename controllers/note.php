<?php

$title = 'Note';

$model = new models\Notes();
$note = $model->find($_GET['id']);

include view('note');
