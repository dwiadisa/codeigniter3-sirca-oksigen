<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Fakultas</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <?php foreach ($fakultas as $f) { ?>
                    <h5 class="card-title">Form Fakultas</h5>

                    <!-- General Form Elements -->
                    <form method="POST" action="<?php echo base_url('data_fakultas/update_fakultas') ?> ">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Fakultas</label>
                            <input type="hidden" name="id_fakultas" value="<?php echo $f->id_fakultas; ?>">
                            <div class="col-sm-10">
                                <input type="text" name="nama_fakultas" class="form-control" value="<?php echo $f->nama_fakultas; ?>">
                                <small class="text-danger"> <?php echo form_error('nama_fakultas'); ?></small>
                            </div>

                        </div>


                        <div class="row mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <div class="col-sm-10">
                            </div>

                        </div>


                    </form><!-- End General Form Elements -->
                <?php } ?>
            </div>
        </div>
    </section>

</main><!-- End #main -->