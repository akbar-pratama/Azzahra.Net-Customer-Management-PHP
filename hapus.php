<?php
include("koneksi.php");

if (isset($_GET['id'])) {
    $id=htmlspecialchars($_GET['id']);

    $sql="delete from pelanggan where id='$id'";
    $hasil=mysqli_query($kon,$sql);

    //Kondisi apakah berhasil atau tidak
    if($hasil){
        header("Location:pelanggan.php");

    }
    else{
        echo "div class='alert alert-danger'> Data Gagal dihapus.</div>";

    }
}
?>