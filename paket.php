<?php
    session_start();
    if($_SESSION['status']!="login"){
        header("location:login.php?pesan=belum_login");
    }
?>  

<?php include("layout/header.php"); ?>

<?php include("layout/sidebar.php"); ?>

<?php include("layout/topbar.php"); ?>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Daftar Paket</title>
</head>
<body>
    <div class="container col-md-11">
    <br>
     <h4>DAFTAR PAKET</h4>
        <br>
        <a href="create_paket.php" class="btn btn-primary" role="button">+Tambah Data</a><br>
        <table class="table table-bordered table-hover">
            <br>
            <thead>
                <tr align="center">
                   <th>No</th>
                    <th>Jenis Paket</th>
                    <th>Kecepatan</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <?php
            include 'koneksi.php';

            $batas = 5;
            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $sql=mysqli_query($kon, "select*from paket order by id_paket desc");
            $jumlah_data = mysqli_num_rows($sql);
            $total_halaman = ceil($jumlah_data / $batas);

            $hasil=mysqli_query($kon, "select*from paket limit $halaman_awal, $batas");
            $no= $halaman_awal+1;
            while ($data = mysqli_fetch_array($hasil)) {
                ?>
                <tbody>
                    <tr align="center">
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data["jenis_paket"]; ?></td>
                        <td><?php echo $data["kecepatan"]; ?></td>
                        <td><?php echo $data["harga"]; ?></td>

                    </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){echo "href ='?halaman=$previous'";} ?>>Previous</a>
                </li>
                <?php
                for ($x=1; $x<=$total_halaman; $x++) { 
                    ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php if($halaman < $total_halaman){echo "href='?halaman=$next'";} ?>>Next</a>
                </li>
            </ul>
        </nav>
</div>

</body>
</html>
<?php include("layout/footer.php"); ?>
