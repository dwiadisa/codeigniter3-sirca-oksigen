<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('<?= base_url('assets/img/') ?>website_banner.png');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-4">
                            <h3>Register Account</h3>
                            <p class="mb-4">Selamat Datang Di Sistem Informasi Pendaftaran Calon Anggota UKM Teater Oksigen UMJ. Buat Akunmu disini</p>
                        </div>
                        <form action="<?php echo base_url('auth/register_aksi') ?>" method="post">
                            <div class="form-group first">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username">

                            </div>
                            <div class="form-group first">
                                <label for="username">Nama</label>
                                <input type="text" name="nama" class="form-control" id="username">

                            </div>
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="email" name="email" class="form-control" id="email">

                            </div>
                            <div class="form-group first">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">

                            </div>
                            <div class="form-group first">
                                <label for="password">Ulangi Password</label>
                                <input type="password" name="ulang_password" class="form-control" id="ulangi passwordpassword">

                            </div>

                            <div class="form-group last mb-3">
                                <?php echo $this->recaptcha->getWidget(); ?>
                            </div>

                            <input type="submit" value="Register" class="btn btn-block btn-primary">
                            <a class="btn btn-block btn-primary text-light text-wrap fw-bold" href="<?= base_url('auth') ?>" role="button">Sudah Punya Akun? Silakan Login</a>

                        </form>
                        <!-- <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> -->
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="<?= base_url('assets/assets_login/') ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets/assets_login/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/assets_login/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/assets_login/') ?>js/main.js"></script>
</body>