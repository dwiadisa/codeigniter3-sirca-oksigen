<body>





    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('<?= base_url('assets/img/') ?>website_banner.png');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-4">
                            <h3>Sign In</h3>
                            <p class="mb-4">Selamat Datang Di Sistem Informasi Pendaftaran Calon Anggota UKM Teater Oksigen UMJ</p>
                        </div>

                        <?php
                        if (isset($_GET['alert'])) {
                            if ($_GET['alert'] == "gagal") {
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                         <span aria-hidden='true'>×</span>
                                                         </button>
                                                        Maaf Anda Gagal Login Silakan Cek Kembali Username/Password Anda!
                                                        </div> ";
                                // echo "Anda Gagal";
                            } else if ($_GET['alert'] == "belum_login") {
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                                </button>
                                               Maaf Anda  Belum Login !
                                               </div> ";
                                // echo "Kamu Belum Login";
                            } else if ($_GET['alert'] == "logout") {
                                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                                </button>
                                              Anda Sudah Logout
                                               </div> ";
                                // echo "kamu udah logout";
                            }
                        }
                        ?>





                        <form action="<?php echo base_url('auth/login_aksi') ?>" method="post">
                            <div class="form-group first">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username">

                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">

                            </div>
                            <!-- 
                            <div class="d-flex mb-5 align-items-center"> -->
                            <!-- <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" />
                                    <div class="control__indicator"></div>
                                </label> -->
                            <!-- <span class="ml-auto"><a href="#" class="forgot-pass">Lupa Password</a></span>
                            </div> -->
                            <!-- <a class="btn btn-primary" href="#" role="button">Link</a> -->
                            <input type="submit" href="" value="Login" role="button" class="btn btn-block btn-primary">

                            <span class="d-block text-center my-4 text-muted">&mdash; Atau &mdash;</span>


                        </form>
                        <a class="btn btn-block btn-primary text-light text-wrap fw-bold" href="<?= base_url('auth/registration') ?>" role="button">Register</a>

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