<body>
    <?php $session = session();
    $errors = $session->getFlashdata('errors');
    $success = $session->getFlashData('success');
    ?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                <form class="login100-form validate-form flex-sb flex-w" action="<?= current_url() ?>" method="POST">
                    <span class="login100-form-title p-b-51">
                        Login
                    </span>

                    <?php if ($errors != null) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $errors  ?>
                        </div>
                    <?php endif ?>
                    <?php if ($success != null) :  ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $success  ?>
                        </div>
                    <?php endif  ?>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
                        <input class="input100" type="email" name="email" placeholder="Username">
                        <span class="focus-input100"></span>
                    </div>


                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-24">
                        <div class="contact100-form-checkbox">

                        </div>

                        <div>
                            <a href="<?= base_url('user/register') ?>" class="txt1">
                                Daftar Akun
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>