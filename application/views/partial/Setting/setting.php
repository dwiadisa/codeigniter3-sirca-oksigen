<main id="main" class="main">

    <div class="pagetitle">
        <h1>Setting</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Set Status Formulir</h5>
                <form action="<?php echo base_url('Settings/simpan_setting') ?>" method="post">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Set Status</label>
                        <div class="col">
                            <select class="form-select" name="setting" aria-label="Default select example">
                                <?php
                                foreach ($setting as $set) {


                                    // jika terpilih laki-laki maka option select nya berubah menjadi
                                    if ($set->value == 1) {
                                        echo "<option selected value ='1'>Aktif</option>
                                            <option value='0'>Nonaktif</option>";
                                        // begitupun sebaliknya jika perempuan
                                    } elseif ($set->value == 0) {
                                        echo "<option  selected value ='0'>Nonaktif</option>
                                                <option value='1'>Aktif</option>";
                                    }
                                }
                                # code...

                                ?>

                            </select>
                            <small>digunakan untuk menonaktifkan fungsi pengisian formulir calon anggota</small>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3">Set Status Pendaftaran</button>

                    </div>
                </form>
                <h5 class="card-title">Opsi Lain</h5>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Backup Database Aplikasi</label>
                    <div class="col-sm-10">
                        <a href="<?php echo base_url('Settings/backup_database'); ?>" button type="button" class="btn btn-primary">Backup Database</a>
                        <small>klik disini untuk backup database ke format .sql</small>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-danger">Hapus Semua Data Calon Anggota</label>
                            <div class="col-sm-10">
                                <a href="<?php echo base_url('Settings/hapus_seluruh_data_ca'); ?>" onclick="return confirm('PERHATIAN !!! Tindakan ini tidak dapat diurungkan. apakah anda yakin untuk menghapus semua data Calon Anggota?')" button type="button" class="btn btn-danger" disabled>Hapus Semua Data</a>
                                <small class="text-danger">PERHATIAN !!! tombol ini digunakan untuk menghapus semua data CALON ANGGOTA yang terdaftar.</small>
                            </div>
                        </div>
                    </div>




                </div>

            </div>


        </div>
        </div>

    </section>

</main><!-- End #main -->