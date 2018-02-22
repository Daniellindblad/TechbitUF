<?php
session_start();

if(!isset($_SESSION['login'])){
	header("Location: /techbituf/login/");
}
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['meddelande']) && isset($_POST['produkt']) && isset($_POST['kontaktuppgifter'])){

	$dbc = mysqli_connect("localhost","root","","techbit");

	mysqli_query($dbc,"SET CHARSET utf8");

	$kund_namn = $_POST['firstname'] . " " . $_POST['lastname'];
	$kontaktuppgifter = $_POST['kontaktuppgifter'];
	$pris = $_POST['produkt'];
	$meddelande = $_POST['meddelande'];

	if($pris == "50"){
		$produkt = "Felsökning - Mjukvara";
	}
	else if($pris == "80"){
		$produkt = "Felsökning - Hårdvara";
	}
	else if($pris == "100"){
		$produkt = "Årgärd - Mjukvara";
	}
	else if($pris == "150"){
		$produkt = "Installation - Hårdvara";
	}
	else if($pris == "200"){
		$produkt = "Paketpris";
	}
	else{
		$produkt = "unknown";
	}

	$extra = "";
	if(isset($_POST['extra'])){
		$extra = $_POST['extra'];
	}



	$mottagare = $_SESSION['usr_id'];

	$query = "INSERT INTO tickets (mottagare,produkt,kund_namn,kontaktuppgifter,meddelande,pris,extra) VALUES ";
	$query .= '('.$mottagare.',"'.$produkt.'","'.$kund_namn.'","'.$kontaktuppgifter.'","'.$meddelande.'","'.$pris.'","'.$extra.'")';

	mysqli_query($dbc,$query);
	//echo $query;
	//echo mysqli_error($dbc);

}
?>


<!DOCTYPE html>
<html>

	<head>
		<title> TechBitUF </title>
		<link rel="stylesheet" href="formCSS.css" />
	</head>

	<body>

	<a href="logout.php"> Logga ut </a>
	<a href="/techbituf/admin/"> Admin Panel</a>


	<form method="POST">
	<ul class="form-style-1">
		<li><label>Kundnamn <span class="required">*</span></label><input type="text" name="firstname" class="field-divided" placeholder="Förnamn" required />&nbsp;<input type="text" name="lastname" class="field-divided" placeholder="Efternamn" required /></li>

			<label>Pris/Produkt<span class="required">*</span></label>
			<select name="produkt" class="field-select" required>
			<option value="50">Felsökning 50kr - Mjukvara</option>
			<option value="80">Felsökning 80kr - Hårdvara</option>
			<option value="100">Åtgärd 100kr - Mjukvara</option>
			<option value="150">Installation 150kr - Hårdvara</option>
			<option value="200">Paketpris 200kr</option>
			</select>
		</li>
		<li>
			<label>Information till meddarbetare <span class="required">*</span></label>
			<textarea name="meddelande" id="field5" class="field-long field-textarea" required></textarea>
		</li>
		<li>
			<label>Kontaktuppgifter <span class="required">*</span></label>
			<textarea name="kontaktuppgifter" id="field5" class="field-long field-textarea" required></textarea>
		</li>
		<li>
			<label>Extra information </label>
			<textarea name="extra" id="field5" class="field-long field-textarea"></textarea>
		</li>
		<li>
			<input type="submit" value="Submit" />
		</li>
	</ul>
	</form>



	</body>

</html>
