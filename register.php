<?php
//avvia la Sessione
session_start();
include("iot_park.php");
mysqli_select_db($conn,$db_database);

$username = $_POST["username"];
$password = $_POST["password"];
$password=md5($password);


if(isset($_POST["username"]) && isset($_POST["password"])){
  $verifica = mysqli_query($conn, "select * from UTENTI where username = '".$username."'");
  if(mysqli_num_rows($verifica)>0){
    $res =array("status"=>"EXISTS", );
  }else{
  $result = mysqli_query($conn, "INSERT INTO utente(username,password) VALUES(\"".$username."\", \"".$password."\")");
        if($result){
          $res=array("status"=>"OK", );
          $json=json_encode($res);
          echo $json;
        }else{
  $res=array(
    "status"=>"NOT",
  );
  }
  }
  $json=json_encode($res);
  echo $json;
}

?>
