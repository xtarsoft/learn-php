<?php

$title = 'Notes Page';

$model = new models\Notes();
$notes = $model->all();

include view('notes');
