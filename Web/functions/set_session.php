<?php
session_start();
if (isset($_POST['id']) AND isset($_POST['role']) ) {
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['role'] = $_POST['role'];
}

