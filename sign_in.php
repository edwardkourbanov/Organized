<?php $pageName = "sign_in"?>
<?php require_once "menu_bar.php"; ?>

		<title>Organized - Home</title>
		<?php require_once "list_not_signed_in.php"; ?>
		
		<div id="sign_in">
			<Span>Sign-In</Span>
			<Span id="sign_in_exit"><a href="index.php">X</a></Span>
			<hr/>
			<form method="post" action="login_handler.php">
				<div><label for="username">username:</label><input id="username" type="text" name="username" 
				<?php
				if(isset($_SESSION['username']))
				{
					$sani = htmlspecialchars($_SESSION['username']);
					echo "value='{$sani}'";
				}
				unset($_SESSION['username']);			
				?>></div>
				<div><label for="password">password:</label><input id='password' type="password" name="password"></div>
				<div id="sign_in_button"><input type="submit" value="Sign-In"></div>
			</form>
			
			<?php 
			
			if (isset($_SESSION['errors']))
			{
				foreach($_SESSION['errors'] as $error)
				{
					echo "<div class='sign_in_messages'>{$error}</div>";
				}
			}
			$_SESSION['errors'] = array();
			
			if (isset($_SESSION['success']))
			{
				foreach($_SESSION['success'] as $success)
				{
					echo "<div class='sign_in_success'>{$success}</div>";
				}
			}
			$_SESSION['success'] = array();
			?>
			<p>Don't have an account? Make one!</p>
			<div id="register_button"><a href="register.php">Register</a></div>
			<br>
			
		</div>


<?php require_once "footer.php"; ?>