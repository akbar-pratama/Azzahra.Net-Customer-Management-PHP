<?php
    session_start();
    if($_SESSION['status']!="login"){
        header("location:login.php?pesan=belum_login");
    }
?>  

<?php include("layout/header.php"); ?>

<?php include("layout/sidebar.php"); ?>

<?php include("layout/topbar.php"); ?>

<title>Home</title>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Selamat Datang Admin </h1>
                    <?php
                    include 'koneksi.php';
                    //get data
                    //ambil data total pelanggan
                
                    $get1 = mysqli_query($kon,"select*from pelanggan");
                    $count1 = mysqli_num_rows($get1); //menghitung seluruh kolom

                    //get data
                    //ambil data total paket
                
                    $get2 = mysqli_query($kon,"select*from paket");
                    $count2 = mysqli_num_rows($get2); //menghitung seluruh kolom
                    

                    //get data
                    //ambil data total paket
                
                    $get3 = mysqli_query($kon,"select*from transaksi");
                    $count3 = mysqli_num_rows($get3); //menghitung seluruh kolom
                    ?>
                
                    <br>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                DATA PELANGGAN</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <sub class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <?=$count1;?>
                                                </sub>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                       

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Data Paket </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <sub class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <?=$count2;?>
                                                </sub>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        

                      
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Data Transaksi</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                             <sub class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <?=$count3;?>
                                                </sub>
                                            <div class="col-auto">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 <?php include("layout/footer.php"); ?>