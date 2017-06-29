<?php
include("iot_park.php");
mysqli_select_db($conn,$db_database);

$id_usr=$_POST["id_usr"];

$ricercaLOG= "SELECT id_usr,logged FROM utente WHERE id_usr ='".$id_usr."'";
$result = mysqli_query($conn, $ricercaLOG);
if($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  $data = array(
		"id" => $row["id_usr"],
		"logged" => $row["logged"],
		"status"=>"OK"
	)

	$json=json_encode($data);
	echo $json;

}else{
	$data = array(
	"id" => "",
	"logged" => "",
	"status"=>"NOT"
	)
	$json=json_encode($data);
  echo $json;

}

?>
