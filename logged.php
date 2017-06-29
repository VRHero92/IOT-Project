<?php
include("iot_park.php");
mysqli_select_db($conn,$db_database);

$id_usr=$_POST["id_usr"]; //prendiamo il valore utente che ci passa Nunzio

//Nella query, usiamo id_usr per recuperare lo stato logged dell'utente con quell'id.
$ricercaLOG= "SELECT id_usr,logged FROM utente WHERE id_usr ='".$id_usr."'";
$result = mysqli_query($conn, $ricercaLOG); //qui eseguiamo la query
if($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ //separiamo la tabella nelle righe.
  $data = array( //chiudiamo i risultati in un array.
		"id" => $row["id_usr"],
		"logged" => $row["logged"],
		"status"=>"OK"
	)
  //che ritorni 0 o 1, va qui.
	$json=json_encode($data);
	echo $json;

}else{ //se succede qualcosa di inaspettato, va qui.
	$data = array(
	"id" => "",
	"logged" => "",
	"status"=>"NOT"
	)
	$json=json_encode($data);
  echo $json;

}

?>
