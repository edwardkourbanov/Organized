		<div class="list_spacing">
		</div>
		<?php
		require_once 'Dao_local.php';
		$_SESSION['folder'] = $_GET['id'];
		$dao = new Dao_local();
		$user_id = $dao->getUserId($_SESSION['username']);
		$results = $dao->getListsFolder($user_id, $_GET['id']);
		$check1 = true;
		$check2 = true;
		$check3 = true;
		foreach($results as $row)
		{
			if($row['list_order'] == 1)
			{
				if($check1)
				{
					echo "<div class='list'>
					<h2 class='editable'>{$row['list_name']}</h2>
					<Span id='list_delete'>X</Span>";
					$check1 = false;
				}
				echo "<div><input type='checkbox' class='list_item'";
				if($row['checked'] == 1)
				{
					echo " checked";
				}
				echo ">";
				echo "<span class='editable'>{$row['item_name']}</span>";
				echo "</div>";
			}
			if($row['list_order'] == 2)
			{
				if($check2)
				{
					echo "</div>";
					echo "<div class='list'>
					<h2 class='editable'>{$row['list_name']}</h2>
					<Span id='list_delete'>X</Span>";
					$check2 = false;
				}
				echo "<div><input type='checkbox' class='list_item'";
				if($row['checked'] == 1)
				{
					echo " checked";
				}
				echo ">";
				echo "<span class='editable'>{$row['item_name']}</span>";
				echo "</div>";
			}
			if($row['list_order'] == 3)
			{
				if($check3)
				{
					echo "</div>";
					echo "<div class='list'>
					<h2 class='editable'>{$row['list_name']}</h2>
					<Span id='list_delete'>X</Span>";
					$check3 = false;
				}
				echo "<div><input type='checkbox' class='list_item'";
				if($row['checked'] == 1)
				{
					echo " checked";
				}
				echo ">";
				echo "<span class='editable'>{$row['item_name']}</span>";
				echo "</div>";
			}
		}
		echo "</div>";
		?>
		
		<?php
		require_once 'Dao_local.php';
		$dao = new Dao_local();
		$user_id = $dao->getUserId($_SESSION['username']);
		$displayAddButton = $dao->checkListsFolder($user_id, $_GET['id']);
		if($displayAddButton)
		{
			echo "<div class='add_list_folder'>+</div>";
		}
		?>