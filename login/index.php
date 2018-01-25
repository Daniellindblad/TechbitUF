<?php
session_start();
if(isset($_SESSION['login'])){
	header("Location: /techbituf/form/");
}
if(isset($_POST['usr']) && isset($_POST['pass'])){

	$dbc = mysqli_connect("localhost","root","","techbit");

	mysqli_query($dbc,"SET CHARSET utf8");

	$usr = $_POST['usr'];
	$pass = $_POST['pass'];

	$query = "SELECT * FROM admins WHERE admin_name='$usr' AND admin_password='$pass'";
	
	$result = mysqli_query($dbc,$query);
	
	if($row = mysqli_fetch_array($result)){
		$_SESSION['login'] = true;
		$_SESSION['usr'] = $row['admin_id'];
		header("Location: /techbituf/form/");
	}
	else{
		echo "Fel inloggningsuppgifter!";
		session_unset();
		session_destroy();
	}
	
	
}
?>


<!DOCTYPE html>
<html>

	<head>
	
		<title> TechBitUF </title>
		<link rel="stylesheet" href="formCSS.css" />
	</head>

	<body>
	
	
	<form method="POST">
	<ul class="form-style-1" >
		<li>
        <label>Namn <span class="required">*</span></label>
        <input type="text" name="usr" class="field-long" />
    </li>
	<li>
        <label>Lösenord <span class="required">*</span></label>
        <input type="password" name="pass" class="field-long" />
    </li>
	<li>
		<input type="submit" value="Logga in" />
	</li>
	</ul>
	</form>
		
		

	</body>
	
</html>
