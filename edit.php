<?php
include 'db_connect.php';


$id = '';
$name = '';
$email = '';
$errormessage = '';
$successmessage = '';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // get the data of the user
if(!isset($_GET['id'])){
    header('location:index.php');

    exit;
}
$id = $_GET['id'];

$sql = "SELECT * FROM users where id = $id";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

if(!$row){
    header('location:index.php');
    exit;
}

$name = $row['name'];
$email =$row['email'];
    


}else{

    // update the user

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    do{
        if(empty($name) || empty($email)){
            $errormessage = 'name or email is emplty';

            break;

        }
        
    $sql =  "UPDATE users SET `name` = '$name', email = '$email' WHERE id = $id";

    $row = $connection->query($sql);
    
    $successmessage = 'User updated Updated successfully ';
    }
    while(false);

}



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

                <h1>Edit User</h1>
                <?php
                if(!empty($successmessage)){
                    echo "<div class='alert alert-dismissible alert-success'>
  <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
  <strong>$successmessage</strong> 
</div>";

                }
                
                ?>
                <?php
                if(!empty($errormessage)){
                    echo "<div class='alert alert-dismissible alert-danger'>
  <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
  <strong>$errormessage</strong> 
</div>";

                }
                
                ?>
                <form method='POST'>
                    <input type="hidden" value="<?php echo $id ?>" name="id">
                    <label class="form-label">Name</label>


                    <div class="form-group">

                        <input type="text" name="name" class="form-control" placeholder="<?php echo $name ?>">
                    </div>
                    <label for="">Email</label>

                    <div class="form-group">

                        <input type="email" name="email" class="form-control" placeholder="<?php echo $email ?>">
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
