<?php require_once "menu_bar.php"; ?>

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
			<Span id="create_folder_exit"><a href="index.php">X</a></Span>
			<hr/>
			<div>Folder Name:<input type="text" id="folder_name"></div>
			<div>Folder Icon:
				<img src="images/default_folder.png">
				<img src="images/extended_folder.png">
				<img src="images/stylized_folder.png">
			</div>
			<div id="category">Category:
				<table>
					<tr>
						<td><input type="radio" class="category_button" name = "category">School</td>
						<td><input type="radio" class="category_button" name = "category">Red</td>
						<td><input type="radio" class="category_button" name = "category">Yellow</td>
					</tr>
					<tr>
						<td><input type="radio" class="category_button" name = "category">Work</td>
						<td><input type="radio" class="category_button" name = "category">Blue</td>
						<td><input type="radio" class="category_button" name = "category"><input type="text" id="category_name" placeholder="Category"></td>
					</tr>
				</table>
			</div>
			<div id="create_button"><a href="index.php">Create</a></div>
			<br>
			
		</div>


<?php require_once "footer.php"; ?>