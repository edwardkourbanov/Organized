<?php
session_start();

require_once 'Dao_local.php';
$dao = new Dao_local();
$user_id = $dao->getUserId($_SESSION['username']);

//If they are not signed in
if(isset($_SESSION['authenticated']) && !$_SESSION['authenticated'] || !isset($_SESSION['authenticated']))
{
	header("Location: register.php");
	exit();
}
//If they are signed in
else if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'])
{
	if($dao->checkLists($user_id))
	{
		$dao->addList($user_id);
	}
	header("Location: signed_in.php");
	exit();
}
?>