<html>
<?php
    session_start();
    if($_SESSION['status']!="login"){
        header("location:login.php?pesan=belum_login");
    }
?>  
<?php include("layout/header.php"); ?>

<?php include("layout/sidebar.php"); ?>

<?php include("layout/topbar.php"); ?>

<head>
    <title>Form Data Transaksi</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<div class="container col-md-10">
    <?php 
        include("koneksi.php");

        if( !isset($_GET['id']) ){
            header('Location: transaksi.php');
        }

        $id = $_GET['id'];

        $sql = "SELECT * FROM transaksi WHERE id=$id";
        $query = mysqli_query($kon, $sql);
        $transaksi = mysqli_fetch_assoc($query);

        if( mysqli_num_rows($query) < 1 ){
            die("data tidak ditemukan...");
        }
    ?>

    <h2>Update Data</h2>
     <form action="aksi-update-transaksi.php" method="POST">
     <fieldset>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $transaksi['id'] ?>" />
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" name="Status" class="form-control" value="<?php echo $transaksi['status'] ?>"/>
        </div>
        <br>
        <p>
            <input class="btn btn-warning" type="submit" value="Kirim" name="kirim" />
            <input class="btn btn-danger" type="button" value="Kembali" onclick="history.back(-1)" />
        </p>
     </fieldset>
    </p>
    </form>
</div> 
</body>
</html>
<?php include("layout/footer.php"); ?>