<?php
include("koneksi.php");

if(isset($_POST['kirim'])) {
        $id = $_POST['id'];
        $status = $_POST['Status'];
    
        $sql = "UPDATE transaksi SET status='$status' where id=$id";
        $query = mysqli_query($kon, $sql);
    
        if( $query ) {
            header('Location: transaksi.php');
        } else {
            die("Gagal menyimpan perubahan....");
         }
        } 
        else {
            die("Akses dilarang....");
        }
    ?>