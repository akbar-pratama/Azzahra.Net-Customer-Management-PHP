<?php 

// membuat koneksi ke database
$koneksi=mysqli_connect("localhost:3307", "root", "", "azzahra");

//variable nim yang dikirimkan form.php
$id=$_GET['id'];

//mengambil data
$query = mysqli_query($koneksi, "select * from pelanggan where id='$id'");
$pelanggan = mysqli_fetch_array($query);
$data = array(
	'nama' => $pelanggan['nama'],
	'paket' => $pelanggan['paket']
	// 'harga' => $mahasiswa['harga']
);

//tampil data
echo json_encode($data);
 ?>
