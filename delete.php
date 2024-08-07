<?php
$servername = 'localhost';
$username = 'root';
$serverpassword = '';
$databasename = 'precedural_php';

$connection  = mysqli_connect($servername, $username,  $serverpassword, $databasename);

if(!$connection){

    die('connection failed'. mysqli_connect_error());
}



if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // get the data of the user
if(!isset($_GET['id'])){
    header('location:index.php');

    exit();
}
$id = $_GET['id'];

$sql = "DELETE FROM users where id = $id";
$result = $connection->query($sql);

if($result == true){
    
    header('location:index.php');
    exit;
}

    


}



?>
