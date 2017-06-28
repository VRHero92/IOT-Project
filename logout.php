<?php
//includo il db
include("iot_park.php");
mysqli_select_db($conn,$db_database);
//leggi l'id
$id_usr=$_POST["id_usr"];
$idName= "SELECT id_usr,logged FROM utente WHERE id_usr= '".$id_usr."'";
$querySlog= "UPDATE utente SET logged='0' WHERE id_usr ='".$id_usr."'";
$log1 = mysqli_query($conn,$idName);
$log2 = mysqli_query($conn,$querySlog);
$row = mysqli_fetch_array($log1, MYSQLI_ASSOC);

$data = array(
  "id" => $id_usr,
  "logged" => $row["logged"]
)
$json=json_encode($data);
 echo $json;
?>
