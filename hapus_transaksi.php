<?php
include 'koneksi.php';

if (isset($_GET['id'])){
    $id = htmlspecialchars($_GET["id"]);

     $hapus =mysqli_query($kon,"delete from transaksi where id='$id'");

    if($hapus){
        header("Location:transaksi.php");
    }
    else {
        echo "<div class='alert alert-danger'> Data gagal dihapus.</div>";
    }
}
?>