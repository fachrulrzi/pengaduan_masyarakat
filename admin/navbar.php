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

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav d-flex justify-content-center me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="../../pengaduan_masyarakat/admin/index.php">Dashboard</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="../../pengaduan_masyarakat/admin/history.php">History</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="../../pengaduan_masyarakat/login/login.php" class="btn btn-danger">LogOut</a>
            </div>
        </div>
    </div>
</nav>



<?php
}?>