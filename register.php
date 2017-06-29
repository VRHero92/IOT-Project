<?php
//includo il db
include("iot_park.php");
mysqli_select_db($conn,$db_database);
//prendo i dati con il metodo post
$username = $_POST["username"];
$password = $_POST["password"];
$password=md5($password);
//verifico che siano stati inseriti i dati
if(isset($_POST["username"]) && isset($_POST["password"])){
  //controllo nel db che non sia già esistente
  $verifica = mysqli_query($conn, "select * from UTENTI where username = '".$username."'");
  //se esiste già salta la query successiva e manda lo stato EXISTS al json_encode
  if(mysqli_num_rows($verifica)>0){
    $res =array("status"=>"EXISTS", );
  }
  else{
    //altrimenti inserisce i dati sul db se riesce...
    $result = mysqli_query($conn, "INSERT INTO utente(username,password) VALUES(\"".$username."\", \"".$password."\")");
      if($result){
        $res=array("status"=>"OK", );
      }
      else{//...oppure no!
        $res=array("status"=>"NOT",);
      }
  }
//prende i dati, li chiude in un json e li manda
$json=json_encode($res);
echo $json;
}

?>
