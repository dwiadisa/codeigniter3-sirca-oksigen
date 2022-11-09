<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Program Studi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Blank</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <?php foreach ($prodi as $p) { ?>
                    <h5 class="card-title">Form Program Studi</h5>

                    <!-- General Form Elements -->
                    <form method="POST" action="<?php echo base_url('data_prodi/update_prodi'); ?>">

                        <div class="row mb-3">

                            <label for="inputText" class="col-sm-2 col-form-label">Program Studi</label>
                            <input type="hidden" name="id_prodi" value="<?php echo $p->id_prodi; ?>">
                            <div class="col-sm-10">
                                <input type="text" name="nama_prodi" class="form-control" value="<?php echo $p->nama_prodi; ?>">
                                <small class="text-danger">

                                    <?php echo form_error('nama_prodi'); ?>
                                </small>
                            </div>


                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Fakultas</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="nama_fakultas" aria-label="Default select example">
                                    <option value="">- Pilih Fakultas -</option>
                                    <?php foreach ($fakultas as
                                        $f) { ?>
                                        <option <?php
                                                if (set_value('fakultas') == $f->id_fakultas) {
                                                    echo "selected='selected'";
                                                } ?> value="<?php echo $f->id_fakultas
                                                            ?>">
                                            <?php echo $f->nama_fakultas; ?></option>


                                        <small class="text-danger">

                                            <?php echo form_error('fakultas'); ?>
                                        <?php } ?>
                                        </small>
                                </select>
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