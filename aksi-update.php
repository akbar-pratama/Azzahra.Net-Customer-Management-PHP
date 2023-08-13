<?php
include("koneksi.php");

if(isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['Nama'];
    $alamat = $_POST['Alamat'];
    $telepon = $_POST['Telepon'];
    $paket = $_POST['Paket'];
    $status = $_POST['Status'];

    $sql = "UPDATE pelanggan SET nama='$nama', alamat='$alamat', no_telepon='$telepon', paket='$paket', status='$status' where id=$id";
    $query = mysqli_query($kon, $sql);

    if( $query ) {
        header('Location: pelanggan.php');
    } else {
        die("Gagal menyimpan perubahan....");
    }
    } else {
        die("Akses dilarang....");
    }
?>