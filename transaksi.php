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
    <title>Data Transaksi</title>
</head>
<body>
    <div class="container col-md-11">
    <br>
     <h4>DAFTAR TRANSAKSI PELANGGAN</h4>
           <br>
       <!-- caridata -->
        
        <div class="form-group form-inline ">
            <a href="cetakPDF.php" class="btn btn-secondary justify-content-end" role="button"><i class="fas fa-solid fa-print"></i>
            Cetak PDF</a>
            <form  method="POST" action="" style="margin-left: auto;"> 
                <input type="text" name="pencarian" class="form-control" placeholder="Cari Data" required /> 
                <button type="submit" class="btn btn-success"> cari</button>
            </form>
        </div> 
        
   

        <table class="table table-bordered table-hover">
            <thead>
                <tr align="center">
                   <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Paket</th>
                     <th>Tanggal tempo</th>
                    <th>Status</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <?php
            include 'koneksi.php';


            $batas = 5;
            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $sql=mysqli_query($kon, "select*from transaksi order by id desc");
            $jumlah_data = mysqli_num_rows($sql);
            $total_halaman = ceil($jumlah_data / $batas);

            //cari data
                if ($_SERVER['REQUEST_METHOD'] == "POST"){
                    $pencarian = trim(mysqli_real_escape_string($kon, $_POST['pencarian']));
                    if ($pencarian != '') {
                        $sql = "SELECT * FROM transaksi WHERE id LIKE '%".$pencarian."%' or nama LIKE '%".$pencarian."%' 
                        or status LIKE '%".$pencarian."%' order by id asc";
                        $query = $sql;
                        $queryjml = $sql;
                         $no = $halaman_awal+1;
                    } else{
                        $query = "SELECT * FROM transaksi";
                    }
                }else{
                     $query = "SELECT * FROM transaksi LIMIT $halaman_awal, 
                        $batas";
                }

            $hasil=mysqli_query($kon, $query);
            $no= $halaman_awal+1;
            while ($data = mysqli_fetch_array($hasil)) {
                ?>
                <tbody>
                    <tr align="center">
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data["id"]; ?></td>
                        <td><?php echo $data["nama"]; ?></td>
                        <td><?php echo $data["jenis_paket"]; ?></td>
                        <td><?php echo $data["tgl_tempo"]; ?></td>
                        <td><?php echo $data["status"]; ?></td>
                        <td>
              
                        <a href="update_transaksi.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button" >Ubah</a>
                        <a href="hapus_transaksi.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-danger" role="button">Hapus</a>
                        </td>
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
