<?php

$title = 'Create Notes';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    dd($_POST);
}

include view('note-create');
