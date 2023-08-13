<!DOCTYPE html>
<html>
<head>
	<!-- Load file CSS Bootstrap offline -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<br>
		<h4> Daftar Barang </h4>
		<br>
		<a href="create.php" class="btn btn-primary" role="button"> Tambah Data </a>
		<table class="table table-bordered table-hover">
			<br>
			<thead>
				<tr>
					<th> No </th>
					<th> Kode Barang </th>
					<th> Nama Barang </th>
					<th> Jenis </th>
					<th> Harga </th>
					<th colspan='2'> Aksi </th>
				</tr>
			
			</thead>
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
			<tbody>
				<tr>
					<td> <?php echo $no++; ?> </td>
					<td> <?php echo $data["id"]; ?> </td>
					<td> <?php echo $data["nama_barang"]; ?> </td>
					<td> <?php echo $data["jenis_barang"]; ?> </td>
					<td> <?php echo $data["harga"]; ?> </td>
					<td>
						<a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button"> Update </a>
						<a href="hapus.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-danger" role="button"> Delete </a>
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
					<a class="page-link"> <?php if ($halaman > 1) { echo "href='?halaman=$previous'";} ?>> Previous </a>
				</li>
				<?php
				for ($x=1; $x<=$total_halaman; $x++){ //Menampilkan data berdasarkan jumlah keperluan data
					?>
					<li class="page-item"> <a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a> </li> 
					<?php
				}
				?>
				<li class="page-item">
					<a class="page-link" <?php if ($halaman < $total_halaman) { echo "href='?halaman=$next'";} ?>> Next </a>
				</li>
			</ul>
		</nav>
	</div>
</body>
</html>