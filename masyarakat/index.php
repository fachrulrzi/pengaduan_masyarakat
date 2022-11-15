<?php
 include('../koneksi/koneksi.php');
 if (isset($_GET['nomor_pengaduan']) and isset($_GET['id_penduduk'])) {
     $nomor_pengaduan = $_GET['nomor_pengaduan'];
     $id_penduduk = $_GET['id_penduduk'];
     $sql = mysqli_query($db,"SELECT * FROM input_aspirasi WHERE id_penduduk= '$id_penduduk' and status!='Selesai' and id_pelapor LIKE '%".$nomor_pengaduan."%' ");
   }
   elseif (isset($_GET['tanggal']) and isset($_GET['id_penduduk'])) {
     $tanggal = $_GET['tanggal'];
     $id_penduduk = $_GET['id_penduduk'];
     $sql = mysqli_query($db,"SELECT * FROM input_aspirasi WHERE id_penduduk= '$id_penduduk' and status!='Selesai' and tanggal='$tanggal'");
   }
    elseif (isset($_GET['status'])) {
    $status = $_GET['status'];
    $id_penduduk = $_GET['id_penduduk'];
    $sql = mysqli_query($db,"SELECT * FROM input_aspirasi WHERE id_penduduk='$id_penduduk' and status='$status'");
  }
   elseif ( isset($_GET['jenis_aspirasi']) and isset($_GET['id_penduduk'])) {
     $jenis_aspirasi = $_GET['jenis_aspirasi'];
     $id_penduduk = $_GET['id_penduduk'];
     $sql = mysqli_query($db, "SELECT * FROM input_aspirasi where id_penduduk= '$id_penduduk' and status!='Selesai' and  jenis_aspirasi='$jenis_aspirasi' ");
   }else {
      $id_penduduk = $_GET['id_penduduk'];
      $sql = mysqli_query( $db, "SELECT * FROM input_aspirasi where id_penduduk= '$id_penduduk' and status!='Selesai'");
     }

if (isset($_GET["id_penduduk"])) {
    $id_penduduk = $_GET["id_penduduk"] ;
$id_penduduk = $_GET["id_penduduk"];
$sqlp = mysqli_query( $db, "SELECT * FROM penduduk where id_penduduk = '$id_penduduk'");
foreach ($sqlp as $p):?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $p['nama']; ?> | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <?php 
    endforeach;
    
include('navbar.php') ;
include('tab-masyarakat.php') ;
include('../../pengaduan_masyarakat/controller/controller_function.php');
navbar(); 
?>

    <div class=" container" style="margin-top: 8rem;">
        <div class="row mt-5">
            <?php 
            TabDashboard()
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
                                            <th scope="col" class="col-5">Laporan Pengaduan</th>
                                            <th scope="col" class="col-2">Jenis Aspirasi</th>
                                            <th scope="col" class="col-1">Tanggal</th>
                                            <th scope="col" class="col-1">Status</th>
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
                                            <td class="col-5"><?php echo $d['keluhan'] ?></td>
                                            <td class="col-2"><?php echo $d['jenis_aspirasi'] ?></td>
                                            <td class="col-1"><?php echo $d['tanggal'] ?></td>
                                            <td class="col-1"><?php echo $d['status'] ?></td>
                                            <td class="col-1">
                                                <center><button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php echo $d['id_pelapor'] ?>">
                                                        Detail
                                                    </button></center>

                                            </td>
                                            <td class="col-1">
                                                <?php 
                                                if ($d['status'] == 'Ditanggapi') {
                                                ?> <center><button type="button" class="btn btn-sm btn-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdropform<?php echo $d['id_pelapor'] ?>">
                                                        Rating
                                                    </button></center> <?php
                                                    }else{
                                                        ?>
                                                <center><button type="button" class="btn btn-sm btn-success" disabled>
                                                        Rating
                                                    </button></center> <?php
                                                    }
                                                ?>
                                            </td>
                                            <!-- <td class="col-1">
                                                <?php 
                                                if ($d['status'] == 'On Proses') {
                                                ?> <center><button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrophapus<?php echo $d['id_pelapor'] ?>">
                                                        Hapus
                                                    </button></center> <?php
                                                    }else{
                                                        ?> <center><button type="button" class="btn btn-sm btn-danger"
                                                        disabled>
                                                        Hapus
                                                    </button></center> <?php
                                                    }
                                                ?>
                                            </td> -->

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
                                                        <div class="col-12">Hapus Pengaduan Dari :</div>
                                                        <div class="col-12">
                                                            <p class="fw-bold fs-5">
                                                                <?php echo $p['nama'] ?>
                                                                [<?php echo $d['id_pelapor'] ?>]
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="index.php?Hapus=<?php echo $d['id_pelapor'] ?>"
                                                        class="btn btn-danger">Hapus</a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal rating -->
                                    <div class="modal fade" id="staticBackdropform<?php echo $d['id_pelapor'] ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="staticBackdropLabel">Berikan
                                                        Rating
                                                        Laporan
                                                        Pengaduan [<?php echo $d['id_pelapor'] ?>]
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 fw-bold">Nama :</div>
                                                        <div class="col-12 border-bottom pb-2"><?php echo $p['nama'] ?>
                                                        </div>
                                                        <div class="col-12 fw-bold">Tanggal :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['tanggal'] ?>
                                                        </div>
                                                        <div class="col-12 fw-bold">Alamat :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['alamat'] ?>
                                                        </div>
                                                        <div class="col-12 mt-2 fw-bold text-danger">Isi Pengaduan :
                                                        </div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['keluhan'] ?>
                                                        </div>
                                                        <div class="col-12 mt-2 fw-bold">Bukti :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <a href="" data-bs-toggle="modal"
                                                                data-bs-target="#staticBackdropgambar<?php echo $d['id_pelapor'] ?>">
                                                                <img src=".././assets/img/<?php echo $d['bukti'] ?>"
                                                                    class="w-25" alt=""></a>
                                                        </div>
                                                        <div class="col-12 mt-2 fw-bold text-primary">Tanggapan :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['tanggapan'] ?>
                                                        </div>
                                                        <div class="col-12 mt-2 fw-bold text-primary">Bukti Tanggapan :
                                                        </div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <a href="" data-bs-toggle="modal"
                                                                data-bs-target="#buktiadmin<?php echo $d['id_pelapor'] ?>">
                                                                <img src=".././assets/img/<?php echo $d['bukti_admin'] ?>"
                                                                    class="w-25" alt=""></a>
                                                        </div>
                                                        <div class="col-12 mt-2 fw-bold text-primary">Tanggal Pengerjaan
                                                            :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['tanggal_pengerjaan'] ?>
                                                        </div>
                                                        <div class="col-12 mt-2 fw-bold text-success">Rating :</div>
                                                        <div class="col-12 mt-2">
                                                            <form
                                                                action="../../pengaduan_masyarakat/controller/controller_feedback.php"
                                                                method="post">
                                                                <input type="hidden" name="status" value="Selesai">
                                                                <input type="hidden" name="jenis_aspirasi"
                                                                    value="<?= $d['jenis_aspirasi'] ?>" />
                                                                <input type="hidden" name="tanggal"
                                                                    value="<?= $d['tanggal'] ?>" />
                                                                <input type="hidden" name="alamat"
                                                                    value="<?= $d['alamat'] ?>" />
                                                                <input type="hidden" name="keluhan"
                                                                    value="<?= $d['keluhan'] ?>" />
                                                                <input type="hidden" name="bukti"
                                                                    value="<?= $d['bukti'] ?>" />
                                                                <input type="hidden" name="bukti_admin"
                                                                    value="<?= $d['bukti_admin'] ?>" />
                                                                <input type="hidden" name="tanggal_pengerjaan"
                                                                    value="<?= $d['tanggal_pengerjaan'] ?>" />
                                                                <input type="hidden" name="tanggapan"
                                                                    value="<?= $d['tanggapan'] ?>" />
                                                                <input type="hidden" name="id_penduduk"
                                                                    value="<?= $d['id_penduduk'] ?>" />
                                                                <input type="hidden" name="id_pelapor"
                                                                    value="<?php echo $d['id_pelapor'] ?>">
                                                                <!-- rating -->
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="feedback" value="Sangat Buruk"
                                                                                id="flexRadioDefault1">
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault1">
                                                                                Sangat Buruk
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="feedback" value="Buruk"
                                                                                id="flexRadioDefault2" checked>
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault2">
                                                                                Buruk
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="feedback" value="Baik"
                                                                                id="flexRadioDefault2" checked>
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault2">
                                                                                Baik
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                value="Sangat Baik" type="radio"
                                                                                name="feedback" id="flexRadioDefault2"
                                                                                checked>
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault2">
                                                                                Sangat Baik
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="Reset" class="btn btn-danger"
                                                        value="submit">Reset</button>
                                                    <button type="submit" class="btn btn-success"
                                                        value="submit">Kirim</button>
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
                                                        <div class="col-12 fw-bold mt-2">Alamat :</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['alamat'] ?>
                                                        </div>
                                                        <div class="col-12 fw-bold mt-2">Jenis Keluhan</div>
                                                        <div class="col-12 border-bottom pb-2">
                                                            <?php echo $d['jenis_aspirasi'] ?></div>
                                                        <div class="col-12 fw-bold text-danger mt-2">Pengaduan :</div>
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
                                                        <?php if ($d['status'] == 'On Proses') {
                                                            ?><div
                                                            class="col-12 pt-1 bg-danger text-light text-center">
                                                            <?php echo $d['status']?>
                                                        </div>
                                                        <?php
                                                        }elseif ($d['status'] == 'Waiting') {
                                                            ?>
                                                        <div class="col-12 pt-1 bg-primary text-light text-center">
                                                            <?php echo $d['status']?>
                                                        </div>
                                                        <?php
                                                        }
                                                        else {
                                                            ?><div
                                                            class="col-12 pt-1 bg-warning text-light text-center">
                                                            <?php echo $d['status']?>
                                                        </div><?php
                                                        } ?>

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
                                                        <img src=".././assets/img/<?php echo $d['bukti_admin'] ?>"
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
<?php
}
else {
    header("Location: ../index.php?Id tidak ditemukan!!");
}