<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    return view('index',['title' => 'Home Page']);
}
view('login',['title' => 'Login']);