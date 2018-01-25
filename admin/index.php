<?php
session_start();

if(!isset($_SESSION['login'])){
	header("Location: /techbituf/login/");
}

$dbc = mysqli_connect("localhost","root","","techbit");
mysqli_query($dbc,"SET CHARSET utf8");
	

?>


<!DOCTYPE html>
<html>

	<head>
		<title> TechBitUF </title>
		<link rel="stylesheet" href="formCSS.css" />
	</head>

	<body>
	
	<a href="logout.php"> Logga ut </a>
	<a href="/techbituf/form/"> Registrera ärende </a>
	
	<br>
	<?php
	
	
	
	$query = "SELECT * FROM tickets";
	
	$result = mysqli_query($dbc,$query);
	
	while($row = mysqli_fetch_array($result)){ // skriv ut alla ärenden
		
		echo "Ärendenummer: " . $row['ticket_id'] . " - ";
		echo $row['produkt'] . "<br>";
		
	}
	
	
	?>
		
		

	</body>
	
</html>
