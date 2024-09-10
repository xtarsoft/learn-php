<?php

$title = 'Notes Page';

$model = new Models\Notes();
$notes = $model->all();

include view('notes');
