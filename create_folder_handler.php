<?php
session_start();

require_once 'Dao_local.php';
$_SESSION['errors'] = array();
$_SESSION['folder_name'] = $_POST['folder_name'];
$_SESSION['icon'] = $_POST['icon'];
if($_POST['icon'] == "default")
	$_SESSION['icon'] = "default";
else if($_POST['icon'] == "extended")
	$_SESSION['icon'] = "extended";
else if($_POST['icon'] == "stylized")
	$_SESSION['icon'] = "stylized";


$_SESSION['category'] = $_POST['category'];
$_SESSION['category_name'] = $_POST['category_name'];
$dao = new Dao_local();
	
//validation
if(strlen($_POST['folder_name']) > 32 || strlen($_POST['folder_name']) < 1)
{
	$_SESSION['errors'][] = "Folder name must be between 1 and 32 characters";
}

if(htmlspecialchars($_POST['folder_name']) != $_POST['folder_name'])
{
	$_SESSION['errors'][] = "Folder name contains invalid characters (&, >, /, ...)";
}

//If custom category is specified
if($_POST['category'] == "custom")
{
	if(strlen($_POST['category_name']) > 32 || strlen($_POST['category_name']) < 1)
	{
		$_SESSION['errors'][] = "Category name must be between 1 and 32 characters";
	}
	if(htmlspecialchars($_POST['category_name']) != $_POST['category_name'])
	{
		$_SESSION['errors'][] = "Category name contains invalid characters (&, >, /, ...)";
	}
	else
		$_POST['category'] = $_POST['category_name'];
}

if(count($_SESSION['errors']) > 0)
{
	header("Location: create_folder_signed_in.php");
	exit();
}

//Checks if there is space for another folder
$userId = $dao->getUserId($_SESSION['username']);
$result = $dao->checkFolder($userId);

if($result)
{
	$result = $dao->createFolder($userId, $_POST['category'], $_POST['icon'], $_POST['folder_name']);
	header("Location: signed_in.php");
	exit();
}
else
{
	$_SESSION['errors'][] = "Maximum folders reached";
	header("Location: create_folder_signed_in.php");
	exit();
}

?>