<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_database = "iot_park";
/*Da cambiare probabilmente*/

$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

?>
