<?php
session_start();
require_once 'User.php';

$user = new User();
$user->logout();
header('Location: index.php');
exit();
?>