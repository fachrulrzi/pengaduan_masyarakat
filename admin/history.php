<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <?php 
    include('../koneksi/koneksi.php');
include('navbar.php') ;
include('tab.php') ;
include('../../pengaduan_masyarakat/controller/controller_function.php');
navbar(); 
if (isset($_GET['Hapus'])){
    $id_pelapor = $_GET['Hapus'];
    mysqli_query($db, "UPDATE input_aspirasi SET status='On Proses', tanggapan='' where id_pelapor='$id_pelapor'");
    mysqli_query($db, "UPDATE status_aspirasi SET status='On Proses' where id_pelapor='$id_pelapor'");
}
if (isset($_GET['nomor_pengaduan'])) {
    $nomor_pengaduan = $_GET['nomor_pengaduan'];
    $sql = mysqli_query($db,"SELECT * FROM input_aspirasi WHERE id_pelapor LIKE '%".$nomor_pengaduan."%' and status='Ditanggapi'");
  }
  elseif (isset($_GET['tanggal'])) {
    $tanggal = $_GET['tanggal'];
    $sql = mysqli_query($db,"SELECT * FROM input_aspirasi WHERE tanggal='$tanggal' and status='Ditanggapi'");
  }
  elseif ( isset($_GET['jenis_aspirasi'])) {
    $jenis_aspirasi = $_GET['jenis_aspirasi'];
    $sql = mysqli_query($db, "SELECT * FROM input_aspirasi where jenis_aspirasi='$jenis_aspirasi' and status='Ditanggapi'");
  }else {
    $sql = mysqli_query( $db, "SELECT * FROM input_aspirasi where status='Ditanggapi'");
    }
?>

    <div class=" container" style="margin-top: 8rem;">
        <div class="row mt-5">
            <?php 
            TabHistory()
             ?>
            <div class="col-12 border rounded-bottom bg-light border-light pb-5 px-0">
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
                                            <th scope="col" class="col-1">Status</th>
                                            <th scope="col" class="col-2">Tanggapan</th>
                                            <th scope="col" class="col-2 text-center">Aksi</th>
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
                                            <td class="col-1"><?php echo $d['status'] ?></td>
                                            <td class="col-2"><?php echo $d['tanggapan'] ?></td>
                                            <td class="col-1">
                                                <center><button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php echo $d['id_pelapor'] ?>">
                                                        Detail
                                                    </button></center>

                                            </td>
                                            <td class="col-1">
                                                <center><button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrophapus<?php echo $d['id_pelapor'] ?>">
                                                        Hapus
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
                                                        <div class="col-12 fw-bold mt-2 text-danger">Pengaduan :</div>
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
                                                                <img src=".././assets/img/<?php echo $d['bukti'] ?>"
                                                                    class="w-25" alt=""></a>
                                                        </div>
                                                        <div class="col-12 fw-bold mt-2 text-primary">Tanggapan :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['tanggapan'] ?>
                                                        </div>
                                                        <div class="col-12 pt-1 bg-warning fw-bold text-center">
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
                                                        <img src=".././assets/img/<?php echo $d['bukti'] ?>"
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