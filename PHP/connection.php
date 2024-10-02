<?php
function connection(){
$host = 'localhost';
$user = 'root';
$pass = 'root';
$bd = 'northwind';

$connect = mysqli_connect($host, $user, $pass, $bd);
mysqli_select_db($connect, $bd);
if($connect -> connect_error){
    die("Connection failed: " . $connect->connect_error);
}else{
    echo "Connected successfully";
}


return $connect;
}
?>
