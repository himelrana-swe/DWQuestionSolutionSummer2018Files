<?php 
session_start();
// This file will be included in a page 
// if needed authentication permission to execute operations
if(empty(trim($_SESSION['login']))){
	header("location: login.php");
	die();
}
?>