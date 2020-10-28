<?php
		require_once 'Dao_local.php';
		global $path;
		$dao = new Dao_local();
		$user_id = $dao->getUserId($_SESSION['username']);
		$folders = $dao->getFolders($user_id);
		if(!empty($folders))
		{
			foreach($folders as $folder)
			{
				$saniName = htmlspecialchars($folder['folder_name']);
				$saniCategory = htmlspecialchars($folder['category']);
				
				if($folder['icon'] == "default")
					$path = "images/default_folder.png";
				else if($folder['icon'] == "extended")
					$path = "images/extended_folder.png";
				else if($folder['icon'] == "stylized")
					$path = "images/stylized_folder.png";
			
				echo "<div class='folder'>
						<span>
							<img src={$path}>
							{$saniName}
						</span>
						<div>
							{$saniCategory}
						</div>
					</div>";
			}
		}

?>