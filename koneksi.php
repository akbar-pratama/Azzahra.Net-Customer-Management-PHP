<?php

$server = "localhost:3307";
$user = "root";
$password = "";
$database = "azzahra";

$kon = mysqli_connect($server, $user, $password, $database);

if( !$kon ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>