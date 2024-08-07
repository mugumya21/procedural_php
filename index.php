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

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

$servername = 'localhost';
$username = 'root';
$serverpassword = '';
$databasename = 'precedural_php';

$connection  = mysqli_connect($servername, $username,  $serverpassword, $databasename);

if(!$connection){

    die('connection failed'. mysqli_connect_error());
}
?>
                    <?php
$sql = ' SELECT * FROM users order by id desc';

$results = $connection->query($sql);

$i =1;
                    while($row = $results->fetch_assoc()):?>

                    <tr class=''>
                        <th><?php echo $i++ ?></th>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><span> <a class='btn btn-success'
                                    href="edit.php?id=<?php  echo $row['id'] ?>">Edit</a></span><span> <a
                                    class='btn btn-danger' href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                            </span>
                        </td>
                    </tr>

                    <?php endwhile ?>



                </tbody>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
