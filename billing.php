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
    <title>Billing Pelanggan</title>
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
        $nama=input($_POST["nama"]);
        $paket=input($_POST["paket"]); 
        $status=input($_POST["Status"]);

       //query input menginput data kedalam tabel barang
        $sql="insert into transaksi (id, nama, jenis_paket, status) values
         ('$id','$nama','$paket','$status')";

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

    <h2>Tambah Billing</h2><br>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Id Pelanggan </label>
            <select class="form-control" onchange="autofill()" name="id"  required>
                 <option disabled selected>-- Pilih Id Pelanggan --</option>
                 <?php 
                      $sql=mysqli_query($kon,"SELECT * FROM Pelanggan order by id asc");
                      while ($data=mysqli_fetch_array($sql)) {
                    ?>
                 <option  value="<?=$data['id']?>"><?=$data['id']?></option>
                  <?php
                    }
                 ?> 
            </select>

           <!--  <input type="text" id="id" onkeyup="autofill()" class="form-control" placeholder="Masukkan Nama" required  /> -->
        </div>
        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama"  class="form-control" placeholder="Masukkan Nama" required  />

        </div>
        <div class="form-group">
            <label>paket</label>
            <input type="text" name="paket"  class="form-control" placeholder="Masukkan Paket" required  />
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" name="Status" class="form-control" placeholder="Masukkan Status" required />
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
     </form>
</div>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
      function isi_otomatis(){
        var id = $("#id").val();
        $.ajax({
          url: 'getdata.php',
          data: "id="+id,
        }).success(function(data){
          var a = data;
          obj = JSON.parse(a);
          $('#nama').val(obj.nama);
          // $('#kecepatan').val(obj.kecepatan);
          $('#paket').val(obj.paket);
        });
      }
    </script> -->
</body>
</html>
<?php include("layout/footer.php"); ?>