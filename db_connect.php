<?php 

$servername = 'localhost';
$username = 'root';
$serverpassword = '';
$databasename = 'precedural_php';

$connection  =  mysqli_connect($servername, $username,  $serverpassword, $databasename);

if(!$connection){

    die('connection failed'. mysqli_connect_error());
}

?>
