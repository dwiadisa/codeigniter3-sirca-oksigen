<main id="main" class="main">

    <div class="pagetitle">
        <h1>My Profile</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Profil User</h5>

                <!-- Vertical Form -->
                <?php foreach ($pengguna as $p) { ?>
                    <?php echo form_open_multipart('Profile/update_profile'); ?>



                    <div class=" card container" style="width: 18rem;">
                        <img src="<?php echo base_url('upload/foto_ca/');
                                    echo $p->pengguna_foto; ?>" class="card-img-top" alt="...">
                        <div class="card-body">

                        </div>
                    </div>


                    <div class="col-12">
                        <input type="hidden" name="id" value="<?php echo $p->id_pengguna; ?>">
                        <input type="hidden" name="hid_foto_diri" value="<?php echo $p->pengguna_foto; ?>">
                        <label for="inputNanme4" class="form-label">Nama</label>
                        <!-- <input type="hide" class="form-control" name="id" id="inputNanme4"> -->
                        <input type="text" class="form-control" name="nama" id="inputNanme4" value="<?php echo $p->pengguna_nama; ?>">
                        <small class="text-danger">
                            <?php echo
                            form_error('nama'); ?>
                        </small>

                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="inputEmail4" value="<?php echo $p->pengguna_email; ?> ">
                        <small class="text-danger">
                            <?php echo
                            form_error('email'); ?>
                        </small>

                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="inputNanme4" value="<?php echo $p->pengguna_username; ?>">
                        <small class="text-danger"><?php echo
                                                    form_error('username'); ?></small>

                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword4">
                        <small class="text-danger">
                            <?php echo
                            form_error('password'); ?>
                        </small>

                        <small> Kosongkan jika tidak merubah password</small>
                    </div>
                    <div class="col-12">

                        <div class="row mb-3">
                            <label for="inputNumber" class="form-label">File Upload</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="foto_diri" type="file" id="formFile">
                                <small>ukuran foto maksimal 2 mb ekstensi .jpg atau .png</small>
                            </div>
                            <small class="text-danger">

                                <?php echo
                                form_error('foto_diri'); ?>
                            </small>

                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <?php echo form_close(); ?>
                    <?php } ?>
                    </div>
            </div>
    </section>

</main><!-- End #main -->