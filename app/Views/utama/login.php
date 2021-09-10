<?php echo view('utama/header') ?>
<?php $session = session();
$errors = $session->getFlashdata('errors');
$success = $session->getFlashData('success');
?>

<body class="bg-gradient-warning">

    <div class="container" style="padding: 50px;">
        <div class="col-12">
            <center>
                <h4>Welcome Administrator!</h4>
                <img src="<?= base_url('admintemplate/img/undraw_secure_login_pdn4.svg') ?>" alt="" height="200px" width="200px">
            </center>

        </div>

        <div class="row justify-content-center" style="margin-top: -75px;">
            <div class="col-xl-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4" style="font-weight: bolder;">Adminsistrator Login</h1>
                                </div>
                                <form action="<?= current_url() ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php echo view('utama/footer') ?>
        <script>
            $("#accordionSidebar").attr("hidden", true);
            $("footer").attr("hidden", true);
            $("header").attr("hidden", true);
            $(".navbar-nav ").attr("hidden", true);
        </script>