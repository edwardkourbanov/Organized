<?php
session_start();

require_once 'Dao_local.php';
$_SESSION['errors'] = array();
$_SESSION['email'] = $_POST['email'];
$_SESSION['username'] = $_POST['username'];
$dao = new Dao_local();
	
//validation
if(strlen($_POST['email']) > 64 || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == FALSE)
{
	$_SESSION['errors'][] = "Email must be valid and under 64 characters";
}

if(strlen($_POST['username']) > 32 || strlen($_POST['username']) < 8)
{
	$_SESSION['errors'][] = "Username must be between 8 and 32 characters";
}

if(strlen($_POST['password']) > 64 || strlen($_POST['password']) < 8)
{
	$_SESSION['errors'][] = "Password must be between 8 and 64 characters";
}

if(htmlspecialchars($_POST['username']) != $_POST['username'])
{
	$_SESSION['errors'][] = "Username contains invalid characters (&, >, /, ...)";
}

if($_POST['password'] != $_POST['password_verify'])
{
	$_SESSION['errors'][] = "Passwords don't match";
}

if($dao->checkEmail($_POST['email']))
{
	$_SESSION['errors'][] = "Email is already taken";
}

if($dao->checkUsername($_POST['username']))
{
	$_SESSION['errors'][] = "Username is already taken";
}

if(count($_SESSION['errors']) > 0)
{
	header("Location: register.php");
	exit();
}

if($_POST['password'] == $_POST['password_verify'])
{
	$success = $dao->register($_POST['email'], $_POST['username'], $_POST['password']);
	if($success)
	{
		unset($_SESSION['email']);
		$_SESSION['success'][] = "Account successfully registered";
		$userId = $dao->getUserId($_SESSION['username']);
		$dao->addDefaultList($userId);
		header("Location: sign_in.php");
		exit();
	}
	else
	{
		$_SESSION['errors'][] = "Database registration error";
		header("Location: register.php");
		exit();
	}
	
}
else
{
	header("Location: register.php");
	exit();
}
?>