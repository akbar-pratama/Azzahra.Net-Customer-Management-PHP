<!DOCTYPE html>
<html>
<head>
	<title> From Data Barang </title>
	<!-- Load file CSS Boostrap offline -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		<?php
		//Include file koneksi, untuk koneksikan ke databse
		include "koneksi.php";

		//Fungsi untuk mencegah inputan karakter yang tidak sesuai
		function input($data){
			$data = trim($data); //Trim digunakan untuk menghapus spasi
			$data = stripslashes($data); //Stripslashes digunakan untuk menghapus karakter backlashes
			$data = htmlspecialchars($data); //Untuk mengubah karakter yang telah ditentukan menjadi entitas HTML
			return $data;
		}
		?>
		<h2> Input Data Barang </h2>

		
		<?php
				include "koneksi.php";

				$batas = 5; //Untuk mengatur jumlah data yang ditampilkan per halaman
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1; //Menyimpan url halaman yg dikirim
				$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

				$previous = $halaman - 1;
				$next = $halaman + 1;

				$sql = mysqli_query($kon, "select * from barang order by id desc");
				$jumlah_data = mysqli_num_rows($sql);
				$total_halaman = ceil($jumlah_data / $batas);

				$hasil = mysqli_query($kon, "select * from barang limit $halaman_awal, $batas");
				$no = $halaman_awal + 1;
				while ($data = mysqli_fetch_array($hasil)) {
			?>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method = "post">
			<div class="form-group">
				<label> Kode Barang: </label>
				<input type="text" name="id" class="form-control" placeholder="Masukkan Kode Barang" required />
			
			</div>
			<div class="form-group">
				<label> Nama Barang: </label>
				<label> <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Barang" required />

				</div>
				<div class="form-group">
					<label> Jenis Barang: </label>
				<label> <input type="radio" name="jenis_barang" value="Makanan"> Makanan </label>
				<label> <input type="radio" name="jenis_barang" value="Peralatan Dapur"> Peralatan Dapur </label>
				<label> <input type="radio" name="jenis_barang" value="Peralatan Mandi"> Peralatan Mandi </label>
			</div>
			<div class="form-group">
				<label> Harga: </label>
				<input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Barang" required />
			</div>
			<br>
			<button type="submit" name="submit" class="btn btn-primary"> Submit </button>
		</form>
	</div>
</body>
</html>