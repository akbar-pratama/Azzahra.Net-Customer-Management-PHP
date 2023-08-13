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
<title>Form Data Pelanggan</title>

 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

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
        $nama=input($_POST["Nama"]);
        $alamat=input($_POST["Alamat"]); 
        $telepon=input($_POST["Telepon"]);
        $paket=input($_POST["Paket"]);
        $status=input($_POST["Status"]);

       //query input menginput data kedalam tabel barang
        $sql="insert into pelanggan (id, nama, alamat, no_telepon, paket, status) values
         ('$id','$nama','$alamat','$telepon','$paket','$status')";

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

    <h2>Input Data Pelanggan</h2><br>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Id Pelanggan </label>
            <input type="text" name="id" class="form-control" placeholder="Masukkan id pelanggan" required />

        </div>
        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="Nama" class="form-control" placeholder="Masukkan Nama" required />

        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="Alamat" class="form-control" placeholder="Masukkan Alamat" required />
        </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="Telepon" class="form-control" placeholder="Masukkan Telepon" required />
        </div>
        
       <div class="form-group">
            <label>Paket Internet</label>
            <select class="form-control" name="Paket">
                <option disabled selected> Pilih Paket </option>

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
            <input type="text" name="Status" class="form-control" placeholder="Masukkan Status" required />
        </div> 

        <br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
     </form>
</div>
</body>
</html>
<?php include("layout/footer.php"); ?>