<?php
session_start();
require_once 'Dao_local.php';

$_SESSION['errors'] = array();

$_SESSION['username'] = $_POST['username'];

//validation
if(strlen($_POST['username']) > 32 || strlen($_POST['username']) < 8)
{
	$_SESSION['errors'][] = "Username must be between 8 and 32 characters";
}

if(strlen($_POST['password']) > 64 || strlen($_POST['password']) < 8)
{
	$_SESSION['errors'][] = "Password must be between 8 and 64 characters";
}

if(count($_SESSION['errors']) > 0) //Checked for validation
{
	header("Location: sign_in.php");
	exit();
}

$dao = new Dao_local();

//Check credentials
if(!$dao->userLogin($_POST['username'], $_POST['password']))
{
	$_SESSION['errors'][] = "Incorrect username or password";
	header("Location: sign_in.php");
	exit();
}

if($dao->userLogin($_POST['username'], $_POST['password']))
{
	$_SESSION['authenticated'] = true;
}
else
{
	$_SESSION['authenticated'] = false;
}

if($_SESSION['authenticated'])
{
	header("Location: signed_in.php");
	exit();
}
else
{
	header("Location: sign_in.php");
	exit();
}

?>