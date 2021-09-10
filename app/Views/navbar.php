<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Glow Rental Motor</title>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?= base_url('bootstrap-4.5.3-dist/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('bootstrap-4.5.3-dist/css/TimeCircles.css') ?>" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="<?= site_url('home') ?>">Glow Rental Motor</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0" id="navcore">
                    <li class="nav-item" id="navbar1"><a class="nav-link js-scroll-trigger" href="<?= site_url('home') ?>">Home</a></li>
                    <li class="nav-item" id="navbar1"><a class="nav-link js-scroll-trigger" href="<?= site_url('antrian') ?>">Antrian</a></li>

                    <?php if (session()->has('logged')) { ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= site_url('user/transaksi') ?>"><i class="fas fa-shopping-cart"></i></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= site_url('user/profil') ?>"><i class="fas fa-user-circle fa-lg"></i></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= site_url('user/logout') ?>"><i class="fas fa-sign-out-alt fa-lg"></i></a></li>

                    <?php } ?>
                    <?php if (!session()->has('logged')) { ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= site_url('user/carasewa') ?>">Cara Sewa</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('user/login') ?>">Login</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('user/register') ?>">Register</a></li>

                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>