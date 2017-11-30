<?php
session_start();
if(isset($_POST['mottagare']) && isset($_POST['produkt']) && isset($_POST['kund_namn']) && isset($_POST['kontaktuppgifter'])){

  $dbc = mysqli_connect("localhost","root","","techbit");



  $mottagare = $_POST['mottagare'];
  $produkt = $_POST['produkt'];
	$kund_namn = $_POST['kund_namn'];
	$kontaktuppgifter = $_POST['kontaktuppgifter'];

	$meddelande = "";
	if(isset($_POST['meddelande'])){
		$meddelande = $_POST['meddelande'];
	}


	$pris = "0";
	if(isset($_POST['pris'])){
		if($_POST['pris'] == ""){
			$pris = "0";
		}
		else{
			$pris = $_POST['pris'];
		}
	}

	$ansvarig = "";
	if(isset($_POST['ansvarig'])){
		$extra = $_POST['ansvarig'];
	}

	$extra = "";
	if(isset($_POST['extra'])){
		$extra = $_POST['extra'];
	}

	$query = "INSERT INTO tickets (mottagare,produkt,kund_namn,kontaktuppgifter,meddelande,pris,ansvarig,extra) VALUES ";
	$query .= '("'.$mottagare.'","'.$produkt.'","'.$kund_namn.'","'.$kontaktuppgifter.'","'.$meddelande.'",'.$pris.',"'.$ansvarig.'","'.$extra.'")';

mysqli_query($dbc,$query);
	echo $query;
	echo mysqli_error($dbc);

}
?>
<form method="post" action="">

Mottagare:<input type="text" name="mottagare"required></input><br>

Produkt: <input type="text" name="produkt"required></input><br>

Meddelande: <input type="text" name="meddelande"></input><br>

Ansvarig: <input type="text" name="ansvarig"></input><br>

Pris: <input type="text" name="pris"></input><br>

Kund namn:<input type="text" name="kund_namn"required></input><br>

Kontaktuppgifter:<input type="text" name="kontaktuppgifter"required></input><br>

Extra information: <input type="text" name="extra"></input><br>

<input type="submit">

</form>
