<?php

    error_reporting(0);
    include 'koneksi.php';
    session_start();
    if($_SESSION['admin']){
        header('location:home.php');
    }else{

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>Halaman Administrator</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Dashboard Administrator</h4>
                                <?php
                                
                                    if(isset($_POST['submit'])){
                                        $user = $_POST['username'];
                                        $pass = $_POST['password'];
                                        $pwd = md5($pass);
                                        if($user=="" or $pass=""){
                                            echo '<script type="text/javascript">
                                                alert("Harap Isi Username dan Password !!");
                                            </script>';
                                        }else{
                                            global $koneksi;
                                            $query = "SELECT * FROM tbl_user WHERE username='$user' and password='$pwd' and level != 'user'";
                                            $result = mysqli_query($koneksi,$query) or die ('error fungsi');
                                            $data = mysqli_fetch_array($result);
                                            $cek = mysqli_num_rows($result);
                                            if($cek>0){
                                                $_SESSION['admin'] = $data['level'];
                                                echo '<script type="text/javascript">
                                                    alert("Administrator, Akses Diterima !!");window.location="home.php";
                                                </script>';
                                            }else{
                                                echo '<script type="text/javascript">
                                                    alert("Kombinasi Username dan Password Salah !!");
                                                </script>';
                                            }
                                        }
                                    }
                                
                                ?>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-success" name="submit" value="LOGIN" />
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>

<?php

    }

?>