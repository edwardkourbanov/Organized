<?php
session_start();
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
				if($pageName == "index" || $pageName == "signed_in")
				{
					echo " class='menubar_current'";
				}
				?>><img class="icon" src="images/filing_cabinet.png"/><a href="index.php">Home</a></li>
				<li class="menu_hidden"><a href="create_folder.php">Create Folder</a></li>
				<li class="menu_hidden"><a href="calendar.php">Calendar</a></li>
				<li id="menu_seperation"><img src="images/main_folder.png" id="logo"><h1>Organized</h1></li>
				<li class="menu_hidden"><img class="icon" src="images/gear_icon.png"/>Settings</li>
				<li id="sign_in_menubar_button"<?php
				if($pageName == "sign_in")
				{
					echo " class='menubar_current'";
				}
				?>><a href="sign_in.php">Sign-In</a></li>
				<li id="register_menubar_button"<?php
				if($pageName == "register")
				{
					echo " class='menubar_current'";
				}
				?>><a href="register.php">Register</a></li>
			</ol>
		<hr/>
		