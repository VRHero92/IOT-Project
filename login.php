<?php
//includo il db
include("iot_park.php");
mysqli_select_db($conn,$db_database);

	//leggi i dati
	$username=$_POST["username"];
	$password=$_POST["password"];
	//cerca la coppia username password nel database
	$ricercaUP= "SELECT * FROM utente WHERE username ='".$username."' AND password='".$password."'";
	$result = mysqli_query($conn, $ricercaUP);
	//cerchiamo l'id dell'utente
	// $idName= "SELECT id_usr FROM utente WHERE username =\"$username\""
	// $result1 = mysqli_query($conn, $idName);

	if($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){//utente trovato,
		$queryLog= "UPDATE utente SET logged='1' WHERE id_usr ='".$row["id_usr"]."'";
		$ricercaUP= "SELECT * FROM utente WHERE username ='".$username."' AND password='".$password."'";
		$result = mysqli_query($conn, $ricercaUP);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		//separiamo con il fetch il nostro array in righe e settiamo logged ad 1, si è loggato
		// if($row2 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
		// 	$queryLog= "UPDATE utente SET logged='1' WHERE id_usr =\"$row2\" ";
	 		//poi mando un json con loggato
			$data = array(
				"id" => $row["id_usr"],
				"logged" => $row["logged"]
			)
		 $json=json_encode($data);
	     echo $json;

		//}


    }
	else{// Utente non trovato, mando un json con utente non trovato
	$data = array(
	"id" => "null",
	"logged" => "no"
	)
	 $json=json_encode($data);
     echo $json;


	}

?>
