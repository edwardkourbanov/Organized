<?php
session_start();
if(isset($_SESSION['authenticated']) && !$_SESSION['authenticated'] || !isset($_SESSION['authenticated']))
{
	header("location: index.php");
	exit();
}
?>
<html>
	<head>
		<link href="images/main_folder.png" type="image/png" rel="shortcut icon"/>
		<link href="css/main.css" type="text/css" rel="stylesheet" media="screen"/>
		<link href="css/about.css" type="text/css" rel="stylesheet" media="screen"/>
		<link href="css/create_folder.css" type="text/css" rel="stylesheet" media="screen"/>
		<link href="css/register.css" type="text/css" rel="stylesheet" media="screen"/>
		<link href="css/sign_in.css" type="text/css" rel="stylesheet" media="screen"/>
		<link href="css/settings.css" type="text/css" rel="stylesheet" media="screen"/>
		<link href="css/calendar.css" type="text/css" rel="stylesheet" media="screen"/>
		<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/script.js"></script>
		<script src="js/list.js"></script>
	</head>
	<meta http-equiv="content-language" content="en" />
	
	<header></header>
	

	
	<body id="main_background">
		<div class="wrapper">
			<ol class="menubar">
				<li id="home"<?php
				if($pageName == "signed_in")
				{
					echo " class='menubar_current'";
				}
				?>><img class="icon" src="images/filing_cabinet.png"/><a href="signed_in.php">Home</a></li>
				<li id="create_folder_menubar_button"<?php
				if($pageName == "create_folder")
				{
					echo " class='menubar_current'";
				}
				?>><a href="create_folder_signed_in.php">Create Folder</a></li>
				<li id="calendar_menubar_button"<?php
				if($pageName == "calendar")
				{
					echo " class='menubar_current'";
				}
				?> class = "menu_hidden">Calendar</li>
				<li id="menu_seperation"><img src="images/main_folder.png" id="logo"><h1>Organized</h1></li>
				<li class = "menu_hidden"><img class="icon" src="images/gear_icon.png"/>Settings</li>
				<li id="menubar_signed_in"><a href="logout_handler.php">

				<?php
					$sani = htmlspecialchars($_SESSION['username']);
					echo "{$sani}";
				?> | Logout</a></li>
			</ol>
		<hr/>
		