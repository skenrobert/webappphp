<?php
session_start();

if($_POST){

    $error = 'wrong user or password';

    if($_POST['user'] == 'admin' && $_POST['password'] == 'admin'){
            $_SESSION['user'] = $_POST['user'];
            header('Location: sections/index.php');
    }
}


// The MySQL service named in the docker-compose.yml.
$host = 'server_mysql';

// Database use name
$user = 'root';

//database user password
$pass = 'mysql';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully!";
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" class="d-flex justify-content-center">
                <br />

                <form action="" method="post">

                    <div class="card">
                        <div class="card-header">
                            START SESSION 
                        </div>
                        <div class="card-body">

                        <?php   if(isset($error)){ ?>

                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo $error; ?></strong> try against
                            </div>
                            
                            <?php }  ?>

                            <div class="mb-3">
                                <label for="" class="form-label">User</label>
                                <input type="text" class="form-control" name="user" id="user" aria-describedby="helpId" placeholder="User">
                                <small id="helpId" class="form-text text-muted">Write nick</small>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Password">
                                <small id="helpId" class="form-text text-muted">Write Password</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>

                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>






    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>