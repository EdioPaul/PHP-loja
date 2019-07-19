<?php
//session_start();
if(!$_SESSION['usuario']) {
    header('Location: login2.php');
    exit();
}