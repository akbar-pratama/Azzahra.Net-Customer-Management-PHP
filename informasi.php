<?php
    session_start();
    if($_SESSION['status']!="login"){
        header("location:login.php?pesan=belum_login");
    }
?>  

<?php include("layout/header.php"); ?>

<?php include("layout/sidebar.php"); ?>

<?php include("layout/topbar.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Informasi Pelanggan</title>
</head>
<body>
<div class="container col-md-11">
    <br>
     <h4>INFORMASI</h4>
     <h6>Tuliskan informasi yang ditujukan untuk pelanggan jika terjadi masalah pada jaringan</h6>
     <br>


    <!--  Aksi CRUD Database -->

  <?php
   include "koneksi.php";

				//Input Data

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //cek apakah ada kiriman form dari method post
    if (isset($_POST['submit'])) {

        $informasi =input($_POST["informasi"]);

       //query input menginput data kedalam tabel barang
        $sql="insert into informasi (info) values
         ('$informasi')";

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

        				//Ubah Data
    } 
    else if(isset($_POST['simpan'])) {

	        $info = $_POST['informasi'];
	    
	        $sql = "UPDATE informasi SET info='$info'";
	        $query = mysqli_query($kon, $sql);
	    
		        if( $query ) {
		            echo '<script type ="text/JavaScript">';  
	                echo 'alert("Data Berhasil Diubah") ';                   
	                echo '</script>';
		        } else {
		            die("Gagal menyimpan perubahan....");
		         }
		      } 
	        
    			//Tampil Data

    	$sql = "SELECT * FROM informasi order by info";
        $query = mysqli_query($kon, $sql);
       	$info = mysqli_fetch_assoc($query);

    ?>
<!--     Akhir Aksi -->


       <form action="" method="post">
        <div class="form-group">
            <textarea style="height: 140px; width: 80%" name="informasi" class="form-control" required>
        <?php 
            if ($info) {
            	echo $info['info']; 
            }else{
           		echo('-- Tuliskan Informasi --');
            }
        ?>      	
            </textarea>
        </div>
        <br>
	        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
	        <button type="update" value="simpan" name="simpan" class="btn btn-warning">Ubah</button>
	        <a href="hapus_info.php?info=<?php echo htmlspecialchars($info['info']); ?>" class="btn btn-danger" 
            role="button">Hapus</a>
     </form>
</div>
</body>
</html>
<?php include("layout/footer.php"); ?>