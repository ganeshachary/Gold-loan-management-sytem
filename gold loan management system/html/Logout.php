<?php
  
session_start();
unset($_SESSION['login_user']);
if(empty($_SESSION['login_user']))
{
header('Location: Login.php');
}
?>
