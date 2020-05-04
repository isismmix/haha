<?php 
include 'db.php';
?>
<!DOCTYPE html> 
<html>
	<head>
		<title>Chat System in PHP</title>
	<!-- The CSS code link -->
	<link rel="stylesheet" href="style.css" media="all"/>

<!-- The ajax funtion that runs continously to fetch the data from db and display it to you -->

 <!-- IT SEND A REQUESTED EVERY TIME SOME ONE SEND message and get the data from there and give it you back -->
	<script>
		function ajax(){
		
		var req = new XMLHttpRequest();
		
		req.onreadystatechange = function(){
		
		if(req.readyState == 4 && req.status == 200){
		
		document.getElementById('chat').innerHTML = req.responseText;
		} 
		}
		// here it is send request to chat.php page to get the data from db
		req.open('GET','chat.php',true); 
		req.send();
		
		}
		setInterval(function(){ajax()},1000);
	</script>
	</head>
	
<body onload="ajax();">

<div id="container">
		<div id="chat_box">
		<div id="chat"></div>
		</div>
		<form method="post" action="index.php">
		<input type="text" name="name" placeholder="enter name"/> 
		<textarea name="msg" placeholder="enter message"></textarea>
		<input type="submit" name="submit" value="Send it"/>
		
		</form>
		<?php 

		// display the data u get from chat.php page throught ajax function
		
		if(isset($_POST['submit'])){ 
		
		$name = $_POST['name'];
		$msg = $_POST['msg'];
		
		$query = "INSERT INTO chat (name,msg) values ('$name','$msg')";
		
		$run = $con->query($query);
		
		if($run){
			echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
		}
		
		
		}
		?>

</div>

</body>
</html>