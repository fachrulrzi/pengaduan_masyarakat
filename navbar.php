<?php 
function navbar() {
    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top ">
    <div class="container">
        <a class="navbar-brand fw-bold  p-2" href="../../pengaduan_masyarakat/index.php">Pengaduan Masyarakat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex justify-content-center me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#nik"
                        href="../../pengaduan_masyarakat/masyarakat/keluhan.php">Keluhan</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="../../pengaduan_masyarakat/login/login.php" class="btn btn-outline-light">Login</a>
            </div>
        </div>
    </div>
</nav>
<!-- modal nik-->
<div class="modal fade" id="nik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="staticBackdropLabel">Nomor Induk Kependudukan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-12 mt-2">
                        <form action="./controller/controller_nik.php" method="post">
                            <input class="form-control" type="number" name="id_penduduk" placeholder="Masukkan NIK">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" value="submit">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
}?>