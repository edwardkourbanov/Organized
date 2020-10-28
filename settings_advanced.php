<?php require_once "menu_bar_signed_in.php"; 

if(isset($_SESSION['authenticated']) && !$_SESSION['authenticated'] || !isset($_SESSION['authenticated']))
{
	header("location: index.php");
	exit();
}
?>

		<title>Organized - Home</title>
		<?php require_once "list_not_signed_in.php"; ?>
		
		<div id="settings" class="settings_advanced">
			<Span>Settings - Advanced</Span>
			<Span id="settings_exit"><a href="signed_in.php">X</a></Span>
			<hr/>
			<div>Color:
				<img src="images/settings_images/blue_circle.png">
				<img src="images/settings_images/red_circle.png">
				<img src="images/settings_images/green_circle.png">
				<img src="images/settings_images/yellow_circle.png">
				<img src="images/settings_images/purple_circle.png">
				<img src="images/settings_images/orange_circle.png">
			</div>
			<div>Layout:
				<span id="round">Round</span>
				<span>Box</span>
			</div>
			<div>Background: <span>Upload Image</span></div>
			<span>Account: 
				<table>
					<tr>
						<td>Username: edwardkourbanov</td>
						<td>Email: edwardkourbanov@gmail</td>
					</tr>
					<tr>
						<td>Change Password</td>
						<td>Change Email</td>
					</tr>
				</table>
			</span>
			<div id="clear_data" class="settings_advanced">Clear User Data</div>
		</div>


<?php require_once "footer_signed_in.php"; ?>