<?php
//avvia la Sessione
session_start();
include("iot_park.php");
mysqli_select_db($conn,$db_database);

	//leggi i dati
	$username=$_POST["username"];
	$password=$_POST["password"];
	//cerca la coppia username password nel database
	$ricercaUP= "SELECT * FROM utente WHERE username =\"$username\" AND password=\"$password\"";
	$result = mysqli_query($conn, $ricercaUP);
	if($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){//utente trovato, mando un json con loggato
	$data = array(
	"id" => $row["id"],
	"logged" => $row["logged"]
	)
	 $json=json_encode($data);
     echo $json;

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
