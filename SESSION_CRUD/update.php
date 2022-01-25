<?php
  session_start();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
  	if (isset($_POST['update'])) 
  	{
  		if (array_key_exists('data', $_SESSION)) 
  		{
  			$_SESSION['data'][$_SESSION['id']] = $_POST;
  			$_SESSION['msg'] = "Data Update Successfully";
  			header('Location: home.php');
  		}
  	}
  }

  else
  {
  	header('Location: home.php');
  }
?>