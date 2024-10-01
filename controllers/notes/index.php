<?php

$title = 'Notes Page';

$model = new Models\Notes();
$notes = $model->all();

view('notes.index',['title' => 'Home Page', 'notes' => $notes]);
