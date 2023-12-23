<?php
// Includes Login Script
include ("login.php") ;
error_reporting(E_ALL ^ E_NOTICE);
$error=$_GET['error'];

if (isset ($_SESSION['login_user'])) {
	header ("location: main_page.php");
}
?>