<?php $pageName = "register"?>
<?php require_once "menu_bar.php"; ?>
		<title>Organized - Home</title>
		<?php require_once "list_not_signed_in.php"; ?>
		
		<div id="register">
			<Span>Register</Span>
			<Span id="register_exit"><a href="index.php">X</a></Span>
			<hr/>
			<form method="post" action="register_handler.php">
				<div><label for="email">email:</label><input id="email" type="text" name="email"
				<?php
				if(isset($_SESSION['email']))
				{
					$sani = htmlspecialchars($_SESSION['email']);
					echo "value='{$sani}'";
				}
				unset($_SESSION['email']);					
				?>></div>
				<div><label for="username">username:</label><input id="username" type="text" name="username"
				<?php
				if(isset($_SESSION['username']))
				{
					$sani = htmlspecialchars($_SESSION['username']);
					echo "value='{$_SESSION['username']}'";
				}
				unset($_SESSION['username']);	
				?>></div>
				<div id="pswd"><label for="password">password:</label><input id="password" type="password" name="password"></div>
				<div id="verify_password"><label for="verify">(verify):</label><input id="verify" type="password" name="password_verify"></div>
			<div id="reg_register_button"><input type="submit" value="Register"></div>
			</form>
			
			<?php 
			
			if (isset($_SESSION['errors']))
			{
				foreach($_SESSION['errors'] as $error)
				{
					echo "<div class='register_messages'>{$error}</div>";
				}
			}
			$_SESSION['errors'] = array();
			?>
			<p>Already have an account? Sign-In!</p>
			<div id="reg_sign_in_button"><a href="sign_in.php">Sign-In</a></div>
			
		</div>


<?php require_once "footer.php"; ?>