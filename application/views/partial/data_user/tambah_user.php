<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah User</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Formulir Tambah User</h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="<?php echo base_url('data_user/tambah_user_aksi') ?> " method="POST">
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="inputNanme4">
                        <small class="text-danger">
                            <?php echo
                            form_error('nama'); ?> </small>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="inputEmail4">
                        <small class="text-danger">
                            <?php echo
                            form_error('email'); ?> </small>
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="inputNanme4">
                        <small class="text-danger">
                            <?php echo
                            form_error('username'); ?> </small>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword4">
                        <small class="text-danger">
                            <?php echo
                            form_error('password'); ?> </small>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Hak Akses</label>
                        <select class="form-select" name="level" aria-label="Default select example">
                            <option selected="">Pilih Hak Akses</option>
                            <option value="WTO_ADMIN">WTO_ADMIN</option>
                            <option value="WTO_VIEWER">WTO_VIEWER</option>
                            <option value="KEANGGOTAAN">KEANGGOTAAN</option>
                            <small class="text-danger">

                        </select>
                        <?php echo
                        form_error('level'); ?> </small>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Status Aktif</label>
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option selected="">Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>


                            </select>
                            <small class="text-danger">
                                <?php echo
                                form_error('status'); ?> </small>

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </section>

</main><!-- End #main -->