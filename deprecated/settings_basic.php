<?php require_once "menu_bar.php"; ?>

		<title>Organized - Home</title>
		<?php require_once "list_not_signed_in.php"; ?>
		
		<div id="settings">
			<Span>Settings - Basic</Span>
			<Span id="settings_exit"><a href="index.php">X</a></Span>
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
			<div id="clear_data">Clear User Data</div>
			<div>
				<span id="settings_message">Please sign in for advanced settings!</span>
				<span class="settings_sign_in_buttons">Register</span>
				<span class = "settings_sign_in_buttons">Sign-In</span>
			</div>
			<br>
			
		</div>


<?php require_once "footer.php"; ?>