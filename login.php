<!DOCTYPE html>
<html lang="en">

<?php include("layout/header.php"); ?>

<body class="bg-dark bg-gradient">

    <div class="container">
    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo '<script type="text/javascript">
                alert("Login gagal, username dan password salah!");
            </script>';
        } else if($_GET['pesan'] == "logout"){
            echo '<script type="text/javascript">
                alert("Anda telah berhasil logout!");
            </script>';
        } else if($_GET['pesan'] == "belum_login"){
            echo '<script type="text/javascript">
                alert("Silahkan login!");
            </script>';
        }
    }
    ?>

        
        <div class="row justify-content-center mt-5">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-9 shadow-lg my-5 py-8">
                    <div class="card-body p-0">
                        
                        <div class="row bg-gradient-light">
                            <div class="col-lg-6 d-none d-lg-block"><img src="foto/logo.png" width="550px"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                                    </div>
                                    <form class="user" method="post" action="cek_login.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="username" aria-describedby="emailHelp"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                                name="password">
                                            </div>
                                        </div>
                                        <input class="btn btn-primary btn-user btn-block" type="submit" value="LOGIN">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <script src="asset/js/sb-admin-2.min.js"></script>

</body>

</html>