<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

</body>
<?php 
      if (isset($_GET['pesan'])) {
        $pesan = $_GET ['pesan'];
        if ($pesan == 'gagal') {
            echo '<div class="alert alert-danger text-center fw-bold  fs-5" role="alert">
            Gagal Login
          </div>';
        }
    }
    ?>
<section class="d-flex align-items-center" style="height: 100vh;">
    <div class="container  ">
        <div class="row  justify-content-center">
            <div class="col-4">
                <div class="card shadow">
                    <div class="card-header bg-success">
                        <h2 class="text-center text-light fw-bold">Login</h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="../controller/controller_login.php" method="POST">

                            <div class="mb-3">
                                </label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" class="form-control mt-2" id="exampleInputEmail1" required
                                    aria-describedby="emailHelp" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" required
                                    name="password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            <form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>