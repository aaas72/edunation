<?php
$servername = "localhost";
$username = "u354047445_root";
$password = "sHokBh[9txUBu1Fe";
$db_name = "u354047445_edutation";

$conn = new mysqli($servername, $username, $password, $db_name, 3306);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
echo "";


