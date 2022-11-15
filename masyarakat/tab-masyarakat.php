<?php 
function TabHistory(){
    $id_penduduk = $_GET["id_penduduk"] ;
?>
<div class="col-12 rounded-top p-2 px-4 mx-0 bg-primary text-light">
    <div class="row">
        <div class="col-5">
            <h3 class="">History Masyarakat</h3>
        </div>
        <div class="col-7 d-block m-auto">
            <div class="row ">
                <div class="col-2 me-5 ">
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Jenis Aspirasi
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item"
                                    href="../masyarakat/history.php?id_penduduk=<?=$id_penduduk?>&jenis_aspirasi=Kebersihan">Kebersihan</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="../masyarakat/history.php?id_penduduk=<?=$id_penduduk?>&jenis_aspirasi=Keamanan">Keamanan</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- cari -->
                <div class="col-4 ">
                    <form class="d-flex" action="../masyarakat/history.php" method="get">
                        <input type="hidden" name="id_penduduk" value="<?=$id_penduduk?>" />
                        <input class="form-control bg-warning text-bold me-2 border-warning" type="date" name="tanggal"
                            value="<?php  if(isset($_GET['tanggal'])){
                                $tanggal = $_GET['tanggal'];
                                    echo $tanggal;
                                } ?>" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Cari</button>
                    </form>
                </div>
                <div class="col-5 ">
                    <form class="d-flex" action="../masyarakat/history.php" method="get">
                        <input type="hidden" name="id_penduduk" value="<?=$id_penduduk?>" />
                        <input class="form-control me-2  text-bold bg-warning" type="search" name="nomor_pengaduan"
                            value="<?php  if(isset($_GET['nomor_pengaduan'])){
                        $nomor_pengaduan = $_GET['nomor_pengaduan'];
                        echo$nomor_pengaduan;
                      } ?>" placeholder="Nomor Pengaduan" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Cari</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<?php 
function TabDashboard(){
    $id_penduduk = $_GET['id_penduduk'];
?>
<div class="col-12 rounded-top p-2 pt-3 px-4 mx-0 bg-primary text-light">
    <div class="row">
        <div class="col-4">
            <h3 class="">Dashboard Masyarakat</h3>
        </div>
        <div class="col-8  d-block m-auto">
            <div class="row ">
                <div class="col-4 ">
                    <div class="row">
                        <div class="col-7 ">
                            <div class="dropdown">
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Jenis Aspirasi
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item"
                                            href="../masyarakat/index.php?id_penduduk=<?=$id_penduduk?>&jenis_aspirasi=Kebersihan">Kebersihan</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="../masyarakat/index.php?id_penduduk=<?=$id_penduduk?>&jenis_aspirasi=Keamanan">Keamanan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="dropdown">
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Status
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item"
                                            href="../masyarakat/index.php?id_penduduk=<?=$id_penduduk?>&status=waiting">Waiting</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="../masyarakat/index.php?id_penduduk=<?=$id_penduduk?>&status=On Proses">On
                                            Proses</a></li>
                                    <li><a class="dropdown-item"
                                            href="../masyarakat/index.php?id_penduduk=<?=$id_penduduk?>&status=Ditanggapi">Ditanggapi</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- cari -->
                <div class="col-4 ">
                    <form class="d-flex" action="../masyarakat/index.php" method="get">
                        <input type="hidden" name="id_penduduk" value="<?=$id_penduduk?>" />
                        <input class="form-control bg-warning text-bold me-2 border-warning" type="date" name="tanggal"
                            value="<?php  if(isset($_GET['tanggal'])){
                                $tanggal = $_GET['tanggal'];
                                    echo $tanggal;
                                } ?>" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Cari</button>
                    </form>
                </div>
                <div class="col-4 ">
                    <form class="d-flex" action="../masyarakat/index.php" method="get">
                        <input type="hidden" name="id_penduduk" value="<?=$id_penduduk?>" />
                        <input class="form-control me-2  text-bold bg-warning" type="search" name="nomor_pengaduan"
                            value="<?php  if(isset($_GET['nomor_pengaduan'])){
                        $nomor_pengaduan = $_GET['nomor_pengaduan'];
                        echo$nomor_pengaduan;
                      } ?>" placeholder="Nomor Pengaduan" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Cari</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>