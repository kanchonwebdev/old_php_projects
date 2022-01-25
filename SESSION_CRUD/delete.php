<?php
    session_start();
   include 'header.php';
   if (array_key_exists('data', $_SESSION) AND !empty($_SESSION['data'])) 
   {
   	unset($_SESSION['data'][$_GET['id']]);
   	$_SESSION['msg'] = "Data Delete Successfully";
   	header('Location: home.php');
   }
?>