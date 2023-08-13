<?php
include("koneksi.php");

if (isset($_GET['info'])) {
    $informasi=htmlspecialchars($_GET['info']);

    $sql="delete from informasi where info='$informasi'";
    $hasil=mysqli_query($kon,$sql);

    //Kondisi apakah berhasil atau tidak
    if($hasil){
        header("Location:informasi.php");

    }
    else{
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Data Gagal Dihapus") ';                   
        echo '</script>';;

    }
}
?>