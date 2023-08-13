<!DOCTYPE html>
<html>
<head>
	<title> Form Data Barang </title>
	<!-- Load file CSS Boostrap offline -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		<?php
		include("koneksi.php");

		if ( !isset($_GET['id']) ) {
			header('Locatiion: view.php');
		}

		$id = $_GET['id'];

		$sql = "SELECT * FROM barang WHERE id=$id";
		$query = mysqli_query($kon, $sql);
		$barang = mysqli_fetch_assoc($query);


		if ( mysqli_num_rows($query) < 1 ) {
			die("data tidak ditemukan...");
		}
		?>
		<h2> Update Data </h2>
		<form action="aksi-update.php" method="POST">
			<fieldset>
				<div class="form-group">
					
					<input type="hidden" name="id" value="<?php echo $barang['id'] ?>" />
				</div>

				<div class="form-group">
					<label> Nama Barang: </label>
					<input type="text" name="nama" class="form-control" placeholder=" Nama Barang" value="<?php echo $barang['nama_barang'] ?>"/>

				</div>

				<div class="form-group">
					<label for="jenis_barang"> Jenis Barang </label>
					<?php $jenis_barang = $barang['jenis_barang']; ?>
					<label> <input type="radio" name="jenis_barang" value="Makanan"
						<?php echo($jenis_barang == 'Makanan') ? "checked": "" ?>> Makanan </label>
						<label> <input type="radio" name="jenis_barang" value="Peralatan Dapur"
							<?php echo($jenis_barang == 'Peralatan Dapur') ? "checked": "" ?>> Peralatan Dapur </label>
							<label> <input type="radio" name="jenis_barang" value="Peralatan Mandi"
								<?php echo($jenis_barang == 'Peralatan Mandi') ? "checked": "" ?>> Peralatan Mandi</label>
				</div>

			<div class="form-group">
				<label> Harga: </label>
				<input type="text" name="harga" class="form-control" placeholder=" Nama Barang" value="<?php echo $barang['harga'] ?>"/>
			</div>

			<br>

			<p>
				<input type="submit" value="Simpan" name="simpan" />
				<input type="button" value="Kembali" onclick="history.back(-1)" />
			</p>
			</fieldset>
		</p>
		</form>
	</div>
</body>
</html>