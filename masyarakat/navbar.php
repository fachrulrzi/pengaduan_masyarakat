<?php 
function navbar() {
    $id_penduduk = $_GET["id_penduduk"] ;
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
                        href="../../pengaduan_masyarakat/masyarakat/index.php?id_penduduk=<?=$id_penduduk?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="../../pengaduan_masyarakat/masyarakat/history.php?id_penduduk=<?=$id_penduduk?>">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#keluhan"
                        href="">Keluhan</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- Keluhan -->

<div class="modal fade" id="keluhan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="staticBackdropLabel">Keluhan Masyarakat
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="form-signin" action="../controller/controller_keluhan.php" enctype="multipart/form-data"
                    method="POST">
                    <div class="row">
                        <div class="col-6">
                            <div class="form mb-3">
                                <input type="hidden" name="id_penduduk" value="<?= $id_penduduk ?>">
                                <input type="hidden" name="status" value="Waiting">
                                <label for="exampleFormControlInput1" class="form-label fw-bold">ID Keluhan</label>
                                <input type="text" readonly value="<?php echo id_data_aspirasi() ; ?>"
                                    class="form-control" id="floatingInput" name="id_pelapor">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form mb-3">
                                <label for="exampleFormControlInput1" class="form-label fw-bold">Jenis Keluhan</label>
                                <select class="form-select" aria-label="Default select example" required
                                    name="jenis_aspirasi">
                                    <option selected>Pilih Katagori</option>
                                    <option value="Kebersihan">Kebersihan</option>
                                    <option value="Keamanan">Keamanan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class=" mb-3">
                                <label for="exampleFormControlInput1" class="form-label fw-bold">Tanggal</label>
                                <input type="date" class="form-control" id="floatingInput" required name="tanggal">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class=" mb-3">
                                <label for="exampleFormControlInput1" class="form-label fw-bold">Alamat</label>
                                <input type="text" class="form-control" id="floatingInput" placeholder="Masukkan alamat"
                                    required name="alamat">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label fw-bold">Bukti</label>
                                <input class="form-control" type="file" id="formFileMultiple" required name="file"
                                    multiple>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form mb-3">
                                <label for="exampleFormControlInput1" class="form-label fw-bold">Keluhan</label>
                                <textarea class="form-control"
                                    placeholder="Masukkan data yang komplit seperti alamat, jam, dll"
                                    id="floatingTextarea" required name="keluhan"></textarea>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="Reset" class="btn btn-danger" value="submit">Reset</button>
                <button type="submit" class="btn btn-success" value="submit"
                    onclick="return confirm('Anda yakin mau kirim ?')">Kirim</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
}?>