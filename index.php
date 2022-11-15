<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <?php 
include('navbar.php') ;
include('tab.php') ;
include('./koneksi/koneksi.php') ;
include('./controller/controller_home.php');
navbar(); 
if (isset($_GET['pesan'])) {
    $pesan = $_GET ['pesan'];
    if ($pesan == 'berhasil') {
        echo '<div class="mt-5 pt-4 alert alert-success text-center fw-bold  fs-5" role="alert">
        Berhasil Melakukan Pengaduan
      </div>';
    }
  }
if (isset($_GET['nomor_pengaduan'])) {
    $nomor_pengaduan = $_GET['nomor_pengaduan'];
    $sql = mysqli_query($db,"SELECT * FROM history WHERE id_pelapor LIKE '%".$nomor_pengaduan."%'");
  }
  elseif (isset($_GET['tanggal'])) {
    $tanggal = $_GET['tanggal'];
    $sql = mysqli_query($db,"SELECT * FROM history WHERE tanggal='$tanggal'");
  }
  elseif ( isset($_GET['jenis_aspirasi'])) {
    $jenis_aspirasi = $_GET['jenis_aspirasi'];
    $sql = mysqli_query($db, "SELECT * FROM history where jenis_aspirasi='$jenis_aspirasi'");
  }else {
    $sql = home();
    }
?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-12 bg-light pb-3 d-block mb-4 m-auto">
                <img class=" w-100" height="550" src="./assets/img/pengaduan.jpg" alt="">
            </div>
            <?php 
            TabHistory()
             ?>
            <div class="col-12 border rounded-bottom bg-light border-light pb-5 mx-0  px-0">
                <div class="row">
                    <div class="col-12 d-block mt-2 m-auto px-5">
                        <div class="row">
                            <div class="col-12 d-block m-auto my-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="d-flex">
                                            <th scope="col" class="col-1">ID Pelapor</th>
                                            <th scope="col" class="col-3">Laporan Pengaduan</th>
                                            <th scope="col" class="col-2">Jenis Aspirasi</th>
                                            <th scope="col" class="col-1">Tanggal</th>
                                            <th scope="col" class="col-2">Tanggapan Admin</th>
                                            <th scope="col" class="col-1">Feedback</th>
                                            <th scope="col" class="col-1">Status</th>
                                            <th scope="col" class="col-1 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                 foreach ($sql as $d):
                                    $id_penduduk = $d['id_penduduk'];
                                    $sqlp = mysqli_query( $db, "SELECT * FROM penduduk WHERE id_penduduk='$id_penduduk' ");?>
                                    <tbody>
                                        <tr class="d-flex">
                                            <td class="col-1 text-center"><?php echo $d['id_pelapor'] ?></td>
                                            <td class="col-3"><?php echo $d['keluhan'] ?></td>
                                            <td class="col-2"><?php echo $d['jenis_aspirasi'] ?></td>
                                            <td class="col-1"><?php echo $d['tanggal'] ?></td>
                                            <td class="col-2"><?php echo $d['tanggapan'] ?></td>
                                            <td class="col-1"><?php echo $d['feedback'] ?></td>
                                            <td class="col-1"><?php echo $d['status'] ?></td>
                                            <td class="col-1">
                                                <center><button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php echo $d['id_pelapor'] ?>">
                                                        Detail
                                                    </button></center>

                                            </td>

                                        </tr>
                                    </tbody>
                                    <?php foreach ($sqlp as $p):
                                    
                                    ?>
                                    <!-- modal hapus -->
                                    <div class="modal fade" id="staticBackdrophapus<?php echo $d['id_pelapor'] ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="staticBackdropLabel">Hapus
                                                        Pengaduan [<?php echo $d['id_pelapor'] ?>]
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row d-flex text-center">
                                                        <div class="col-12">Hapus Tanggapan :</div>
                                                        <div class="col-12">
                                                            <p class="fw-bold fs-5">
                                                                <?php echo $p['nama'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="history.php?Hapus=<?php echo $d['id_pelapor'] ?>"
                                                        class="btn btn-danger">Hapus</a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal detail -->
                                    <div class="modal fade" id="staticBackdrop<?php echo $d['id_pelapor'] ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="staticBackdropLabel">Laporan
                                                        Aspirasi
                                                        Masyarakat [<?php echo $d['id_pelapor'] ?>]
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 fw-bold mt-2">Nama :</div>
                                                        <div class="col-12 border-bottom pb-2"><?php echo $p['nama'] ?>
                                                        </div>
                                                        <div class="col-12 fw-bold mt-2">NIK :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['id_penduduk'] ?>
                                                        </div>
                                                        <div class="col-12 fw-bold mt-2">Jenis Keluhan</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['jenis_aspirasi'] ?></div>
                                                        <div class="col-12 fw-bold mt-2 ">Pengaduan :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['keluhan'] ?>
                                                        </div>
                                                        <div class="col-12 fw-bold mt-2">Tanggal :</div>
                                                        <div class="col-12 border-bottom pb-2 ">
                                                            <?php echo $d['tanggal']?>
                                                        </div>
                                                        <div class="col-12 fw-bold mt-2">Bukti :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <a href="" data-bs-toggle="modal"
                                                                data-bs-target="#staticBackdropgambar<?php echo $d['id_pelapor'] ?>">
                                                                <img src="./assets/img/<?php echo $d['bukti'] ?>"
                                                                    class="w-25" alt=""></a>
                                                        </div>
                                                        <div class="col-12 fw-bold mt-2 text-primary">Tanggapan :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['tanggapan'] ?>
                                                        </div>
                                                        <div class="col-12 fw-bold text-primary mt-2">Rating :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['feedback'] ?>
                                                        </div>
                                                        <div class="col-12 mt-2 fw-bold text-primary">Bukti Tanggapan :
                                                        </div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <a href="" data-bs-toggle="modal"
                                                                data-bs-target="#buktiadmin<?php echo $d['id_pelapor'] ?>">
                                                                <img src="assets/img/<?php echo $d['bukti_admin'] ?>"
                                                                    class="w-25" alt=""></a>
                                                        </div>
                                                        <div class="col-12 mt-2 fw-bold text-primary">Tanggal Pengerjaan
                                                            :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['tanggal_pengerjaan'] ?>
                                                        </div>
                                                        <div
                                                            class="col-12 pt-1 bg-success text-light fw-bold text-center">
                                                            <?php echo $d['status']?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal gambar -->
                                    <div class="modal fade" id="staticBackdropgambar<?php echo $d['id_pelapor'] ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="staticBackdropLabel">Bukti
                                                        Laporan
                                                        Aspirasi
                                                        Masyarakat [<?php echo $d['id_pelapor'] ?>]
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="gambar">
                                                        <img src="./assets/img/<?php echo $d['bukti'] ?>"
                                                            class="w-100 h-100" alt="">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal bukti admin -->
                                    <div class="modal fade" id="buktiadmin<?php echo $d['id_pelapor'] ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="staticBackdropLabel">Bukti
                                                        Admin [<?php echo $d['id_pelapor'] ?>]
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="gambar">
                                                        <img src="assets/img/<?php echo $d['bukti_admin'] ?>"
                                                            class="w-100 h-100" alt="">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    endforeach; 
                                    endforeach; ?>
                                </table>




                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>