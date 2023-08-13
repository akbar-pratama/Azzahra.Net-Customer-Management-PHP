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
    <title>Form Data Barang</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<div class="container col-md-10">
    <?php 
        include("koneksi.php");

        if( !isset($_GET['id']) ){
            header('Location: pelanggan.php');
        }

        $id = $_GET['id'];

        $sql = "SELECT * FROM pelanggan WHERE id=$id";
        $query = mysqli_query($kon, $sql);
        $pelanggan = mysqli_fetch_assoc($query);

        if( mysqli_num_rows($query) < 1 ){
            die("data tidak ditemukan...");
        }
    ?>

    <h2>Update Data Pelanggan</h2>
     <form action="aksi-update.php" method="POST">
     <fieldset>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $pelanggan['id'] ?>" />
        </div>
        <div class="form-group">
            <label>Nama </label>
            <input type="text" name="Nama" class="form-control" placeholder=" Nama Pelanggan" value="<?php echo $pelanggan['nama'] ?>"/>
        </div>
         <div class="form-group">
            <label>Alamat </label>
            <input type="text" name="Alamat" class="form-control" placeholder=" Alamat" value="<?php echo $pelanggan['alamat'] ?>"/>
        </div>
        <div class="form-group">
            <label>No Telepon </label>
             <input type="text" name="Telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan['no_telepon'] ?>"/>
        </div>
        <div class="form-group">
            <label>Paket Internet</label>
             <select class="form-control" name="Paket" onChange="document.getElementById('form_id').submit();" >
                <option disabled selected><?php echo $pelanggan['paket'] ?></option>

                 <!-- ambil data untuk data paket -->

                    <?php 
                      $sql=mysqli_query($kon,"SELECT * FROM paket order by id_paket asc");
                      while ($data=mysqli_fetch_array($sql)) {
                    ?>
                   <option value="<?=$data['jenis_paket']?>"><?=$data['jenis_paket']?></option> 
                 <?php
                    }
                 ?>
                 
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" name="Status" class="form-control" value="<?php echo $pelanggan['status'] ?>"/>
        </div>
        <br>
        <p>
            <input class="btn btn-warning" type="submit" value="Simpan" name="simpan" />
            <input class="btn btn-danger" type="button" value="Kembali" onclick="history.back(-1)" />
        </p>
     </fieldset>
    </p>
    </form>
</div> 
</body>
</html>
<?php include("layout/footer.php"); ?>