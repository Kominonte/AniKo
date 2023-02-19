<?php 
	
	include("connect.php");
	if(isset($_POST['input'])){

		$input = $_POST['input'];

		$query = "SELECT * FROM title WHERE title LIKE '{$input}%' ";

		$result = mysqli_query($connect, $query); 

		if(mysqli_num_rows($result) > 0){?>

			<?php

				while ($row = mysqli_fetch_assoc($result)) {
					
					$id = $row['id'];
					$poster = $row['poster'];
					$title = $row['title'];
					?>

					<a class="searchresult-link" href="../title/title.php?id=<?php echo $id;?>">
						<div class="searchresult-element"> 
							<img class="searchresult-img" src="<?php echo $poster; ?>" width="100px">
							<p class="searchresult-title"><?php echo $title; ?></p>
							<br>
						</div>
					</a>

					<?php
				}

			?>


			<?php

		}else{

			echo "<h3 id='not-result'>Нет результатов</h3>";
		}
	}



?>