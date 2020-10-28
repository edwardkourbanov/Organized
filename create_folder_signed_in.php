<?php require_once "menu_bar_signed_in.php"; ?>

		<title>Organized - Home</title>
		<div class="list">
		<h2>List Name</h2>
			<div>
				<input type="checkbox" class="list_item">
				<span>Add Item +</span>
			</div>
		</div>
		<div class="add_list">
		+
		</div>
		
		<div id="create_folder">
			<Span>Create Folder</Span>
			<Span id="create_folder_exit"><a href="signed_in.php">X</a></Span>
			<hr/>
			<form method="post" action="create_folder_handler.php">
				<div>Folder Name:<input type="text" id="folder_name" name="folder_name"
				<?php
				if(isset($_SESSION['folder_name']))
				{
					$saniName = htmlspecialchars($_SESSION['folder_name']);
					echo "value='{$saniName}'";
				}
				unset($_SESSION['folder_name']);			
				?>></div>
				<div>Icon:
					<input type="radio" class="category_button" name = "icon" value="default" 
					<?php
					if(!isset($_SESSION['icon']))
					{
						echo "checked";
					}
					else if(isset($_SESSION['icon']) && $_SESSION['icon'] == "default")
					{
						echo "checked";
					}		
					?>>
					<img src="images/default_folder.png">
					<input type="radio" class="category_button" name = "icon" value="extended" 
					<?php
					if(isset($_SESSION['icon']) && $_SESSION['icon'] == "extended")
					{
						echo "checked";
					}		
					?>>
					<img src="images/extended_folder.png">
					<input type="radio" class="category_button" name = "icon" value="stylized" 
					<?php
					if(isset($_SESSION['icon']) && $_SESSION['icon'] == "stylized")
					{
						echo "checked";
					}
					unset($_SESSION['icon']);
					?>>
					<img src="images/stylized_folder.png">
				</div>
				<div id="category">Category:
					<table>
						<tr>
							<td><input type="radio" class="category_button" name = "category" value="School" 
							<?php
							if(isset($_SESSION['category']) && $_SESSION['category'] == "School")
							{
								echo "checked";
							}
							?>>School</td>
							<td><input type="radio" class="category_button" name = "category" value="Red" 
							<?php
							if(isset($_SESSION['category']) && $_SESSION['category'] == "Red")
							{
								echo "checked";
							}
							?>>Red</td>
							<td><input type="radio" class="category_button" name = "category" value="Yellow" 
							<?php
							if(isset($_SESSION['category']) && $_SESSION['category'] == "Yellow")
							{
								echo "checked";
							}
							?>>Yellow</td>
						</tr>
						<tr>
							<td><input type="radio" class="category_button" name = "category" value="Work" 
							<?php
							if(isset($_SESSION['category']) && $_SESSION['category'] == "Work")
							{
								echo "checked";
							}
							?>>Work</td>
							<td><input type="radio" class="category_button" name = "category" value="Blue" 
							<?php
							if(isset($_SESSION['category']) && $_SESSION['category'] == "Blue")
							{
								echo "checked";
							}
							?>>Blue</td>
							<td><input type="radio" class="category_button" name = "category" value="custom"
							<?php
							if(!isset($_SESSION['category']))
							{
								echo "checked";
							}
							else if(isset($_SESSION['category']) && $_SESSION['category'] == "custom")
							{
								echo "checked";
							}		
							?>>
							<input type="text" id="category_name" name="category_name" placeholder="Category"
							<?php
							if(isset($_SESSION['category']) && $_SESSION['category'] == "custom")
							{
								$saniCategory = htmlspecialchars($_SESSION['category_name']);
								echo " value = '{$saniCategory}'";
							}
							unset($_SESSION['category_name']);
							unset($_SESSION['category']);
							?>></td>
						</tr>
					</table>
				</div>
				<div id="create_button"><input type="submit" value="Create"></div>
			<?php 
			if(isset($_SESSION['errors']))
			{
				foreach($_SESSION['errors'] as $error)
				{
					echo "<div class='create_folder_messages'>{$error}</div>";
				}
			}
			$_SESSION['errors'] = array();
			?>
			</form>
			
		</div>


<?php require_once "footer_signed_in.php"; ?>