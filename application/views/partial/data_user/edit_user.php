<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit User</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Formulir Edit User</h5>

                <!-- Vertical Form -->
                <?php foreach ($pengguna as $p) { ?>
                    <form class="row g-3" action="<?php echo base_url('data_user/data_user_update') ?> " method="POST">
                        <div class="col-12">
                            <input type="hidden" name="id" value="<?php echo $p->id_pengguna; ?>">
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
                            <label for="inputAddress" class="form-label">Hak Akses</label>
                            <select class="form-select" aria-label="Default select example" name="level">
                                <option value="">- Pilih Level -</option>
                                <option <?php if ($p->pengguna_level == "WTO_ADMIN") {
                                            echo "selected='selected'";
                                        } ?> value="WTO_ADMIN">WTO_ADMIN</option>
                                <option <?php if ($p->pengguna_level == "WTO_VIEW") {
                                            echo "selected='selected'";
                                        } ?> value="WTO_VIEW">WTO_VIEW</option>
                                <option <?php if ($p->pengguna_level == "KEANGGOTAAN") {
                                            echo "selected='selected'";
                                        } ?> value="KEANGGOTAAN">KEANGGOTAAN</option>
                                <small class="text-danger"><?php echo
                                                            form_error('level'); ?></small>

                            </select>
                            </select>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Status Aktif</label>
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option value="">- Pilih Status -</option>
                                    <option <?php if ($p->pengguna_status == "1") {
                                                echo "selected='selected'";
                                            } ?> value="1">Aktif</option>
                                    <option <?php if ($p->pengguna_status == "0") {
                                                echo "selected='selected'";
                                            } ?> value="0">Non-Aktif</option>
                                    <small class="text-danger">

                                        <?php echo
                                        form_error('status'); ?>
                                    </small>

                                </select>


                                <!-- </select> -->

                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </form><!-- Vertical Form -->
                <?php } ?>
            </div>
        </div>
    </section>

</main><!-- End #main -->