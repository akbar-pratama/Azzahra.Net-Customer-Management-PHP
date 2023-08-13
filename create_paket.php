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
<title>Form Data Paket</title>

<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
    <div class="container col-md-10">
 
<?php
   include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $id=input($_POST["id"]);
        $nama=input($_POST["Nama_Paket"]);
        $kecepatan=input($_POST["Kecepatan"]); 
        $harga=input($_POST["Harga"]);


       //query input menginput data kedalam tabel barang
        $sql="insert into paket (id_paket, jenis_paket, kecepatan, harga) values
        ('$id','$nama','$kecepatan','$harga')";

        //mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon, $sql);

        //kondisi apakah berhasil atau tidak
        if ($hasil) {
            echo '<script type ="text/JavaScript">';  
                echo 'alert("Data Berhasil Disimpan") ';                   
                     echo '</script>';
        }
        else{
            echo "<div class ='alert alert-danger'> Data gagal di simpan.</div>";
        }
    }
    ?>

    <h2>Input Data Paket</h2><br>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Id Paket </label>
            <input type="text" name="id" class="form-control" placeholder="Masukkan Kode Paket" required />

        </div>
        <div class="form-group">
            <label>Jenis Paket</label>
            <input type="text" name="Nama_Paket" class="form-control" placeholder="Masukkan Nama Paket" required />

        </div>
        <div class="form-group">
            <label>Kecepatan</label>
            <input type="text" name="Kecepatan" class="form-control" placeholder="Kecepatan" required />
        </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" name="Harga" class="form-control" placeholder="Harga" required />
        </div>
        

        <br>
        <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
     </form>
</div>
</body>
</html>
<?php include("layout/footer.php"); ?>