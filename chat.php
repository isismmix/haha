<?php 
	include 'db.php';
	// connection of databas
	
	$query = "SELECT * FROM chat ORDER BY id DESC";
	$run = $con->query($query);

	// continously fetching while loop
	while($row = $run->fetch_array()) :
		?>
			<div id="chat_data">
				<span style="color:green;"><?php echo $row['name']; ?></span> :
				<span style="color:brown;"><?php echo $row['msg']; ?></span>
				<span style="float:right;"><?php echo formatDate($row['date']); ?></span>
			</div>
			<?php endwhile;?>