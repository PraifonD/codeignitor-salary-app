<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PRM - Payroll Management System</title>

    <!-- BootStrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- SB Admin CSS -->
    <?php echo link_tag('/assets/css/sb-admin-2.min.css'); ?>

    <!-- Data Table CSS -->
    <?php echo link_tag('/assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>

    <!-- Font Awesome -->

    <script src="https://kit.fontawesome.com/4e6b2f0ee5.js" crossorigin="anonymous"></script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style type="text/css">
        .fr {
            color: red;
            font-size: 0.8em;
            margin-top: 1em !important;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbar-example">
    <div id="preloader"></div>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">
                <!-- <h1><a href="index.html"><span>MY</span>Website</a></h1> -->
                <!-- Uncomment below if you prefer to use an image logo -->
                <h1><a href="index.html"><img src="asset/frontend/img/RPC-JP_Logo.png" alt="" class="img-fluid"><span>MY</span>Website </a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#news">News</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                    <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- Start Blog Area -->
    <div id="blog" class="blog-area">
        <div class="blog-inner area-padding">
            <div class="blog-overly"></div>
            <div class="container ">
                <!-- <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-left">
              <br><br>
              <h2>รายละเอียดข่าว</h2>
            </div>
          </div>
        </div> -->
                <div class="row">

                    <!-- Start Left Blog -->
                    <div class="col-lg-4 col-md-4 col-sm-4"></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <br><br>
                                <h3>Login</h3>
                            </div>
                            <form role="form" action="<?= site_url('login/authen'); ?>" method="post" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-3 control-label mt-3">
                                            Email
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="email" name="admin_email" class="form-control" required placeholder="email" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3 control-label mt-3">
                                            Password
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="password" name="admin_pwd" class="form-control" required minlength="2" placeholder="password" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <div class="col-sm-3 control-label">
                                        </div>
                                        <div class="col-sm-9 mt-3">
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                    </div>

                                </div><!-- /.box-body -->
                            </form>
                        </div>
                        <!-- Start single blog -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <!-- ======= Footer ======= -->
    <footer>
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div class="footer-logo">
                                    <h2><span>e</span>Business</h2>
                                </div>

                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                                <div class="footer-icons">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="bi bi-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="bi bi-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="bi bi-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="bi bi-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-4">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>information</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                </p>
                                <div class="footer-contacts">
                                    <p><span>Tel:</span> +123 456 789</p>
                                    <p><span>Email:</span> contact@example.com</p>
                                    <p><span>Working Hours:</span> 9am-5pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-4">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>Instagram</h4>
                                <div class="flicker-img">
                                    <a href="#"><img src="./asset/frontend/img/portfolio/1.jpg" alt=""></a>
                                    <a href="#"><img src="asset/frontend/img/portfolio/2.jpg" alt=""></a>
                                    <a href="#"><img src="asset/frontend/img/portfolio/3.jpg" alt=""></a>
                                    <a href="#"><img src="asset/frontend/img/portfolio/4.jpg" alt=""></a>
                                    <a href="#"><img src="asset/frontend/img/portfolio/5.jpg" alt=""></a>
                                    <a href="#"><img src="asset/frontend/img/portfolio/6.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright <strong>eBusiness</strong>. All Rights Reserved
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        <?php if ($this->session->flashdata('login_error')) : ?>
            swal("", "Username หรือ Password ไม่ถูกต้อง!", "warning");
        <?php endif; ?>
    </script>
    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>asset/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>asset/frontend/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>asset/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>asset/frontend/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>asset/frontend/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>asset/frontend/js/main.js"></script>
</body>

</html>