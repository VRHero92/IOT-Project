<?php
//includo il db
include("iot_park.php");
mysqli_select_db($conn,$db_database);
//leggi l'id
$id_usr=$_POST["id_usr"];
//seleziono l'id utente e il suo stato che sarà logged=1
$idName= "SELECT id_usr,logged FROM utente WHERE id_usr= '".$id_usr."'";
//cambio logged in 0, si è sloggato
$querySlog= "UPDATE utente SET logged='0' WHERE id_usr ='".$id_usr."'";
//faccio entrambe le query
$log1 = mysqli_query($conn,$idName);
$log2 = mysqli_query($conn,$querySlog);
//inserisco nelle row il risultato
if($row = mysqli_fetch_array($log1, MYSQLI_ASSOC)){//è andata a buon fine
//inserisco in un array
$data = array(
  "id" => $id_usr,
  "logged" => $row["logged"],
  "status"=>"OK"
)
//e impacchetto tutto in un json da mandare
$json=json_encode($data);
 echo $json;
 }
 else{//non è andata a buon fine
   $data = array(
     "id" => "",
     "logged" => "",
     "status"=>"NOT"
   )
   //e impacchetto tutto in un json da mandare
   $json=json_encode($data);
    echo $json;
 }
?>
