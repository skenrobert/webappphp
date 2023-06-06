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

                <form action="sections/index.php" method="post">

                    <div class="card">
                        <div class="card-header">
                            START SECTION
                        </div>
                        <div class="card-body">

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