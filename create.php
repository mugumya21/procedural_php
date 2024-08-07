<?php


$name = '';
$email = '';

$errormessage = '';
$successmessage = '';


$servername = 'localhost';
$username = 'root';
$serverpassword = '';
$databasename = 'precedural_php';

$connection  = mysqli_connect($servername, $username,  $serverpassword, $databasename);

if(!$connection){

    die('connection failed'. mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];


    
$sql = "INSERT INTO users(`name`, `email`) VALUES ('$name', '$email')";

$results = $connection->query($sql);


if($results){
    header('location:index.php');
    
        echo'<div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-heading">User Created Successfully</h4>
</div>';
}

}else{

    $errormessage = 'user not created';
}

$connection->close();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precedural php</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">School Monitor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Users
                            <span class="visually-hidden"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Add User</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">


            <div class="col-3"></div>
            <div class="col-6">

                <h1>Add User</h1>
                <form action="" , method='POST'>
                    <label class="form-label">Name</label>


                    <div class="form-floating">

                        <input type="text" name='name' class="form-control" id="floatingInput"
                            placeholder="<? echo $name ?>">
                    </div>
                    <label for="">Email</label>

                    <div class="form-floating">

                        <input type="email" name='email' class="form-control" id="floatingPassword"
                            placeholder="<? echo $email ?>">
                    </div>
                    <div> <input type="submit" class='btn btn-primary mt-3' style='float:right'></div>

                </form>
            </div>
            <div class="col-3"></div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>