<main id="main" class="main">

    <div class="pagetitle">
        <h1>Ekspor Data Calon Anggota</h1>

    </div><!-- End Page Title -->

    <section class="section">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ekspor Data CA Per-Tahun</h5>
                <div class="row mb-3">
                    <form action="<?php echo base_url('Ekspor_CA/Ekspor_Aksi') ?>" method="post">
                        <label class="mb-2">Pilih Tahun Perekrutan</label>

                        <select class="form-select" name="tahun" aria-label="Default select example">
                            <!-- <option selected="">Pilih Tahun</option> -->
                            <?php
                            foreach ($tahunan as $tahun) { ?>

                                <option value="<?php echo $tahun->tahun_submit; ?>"><?php echo $tahun->tahun_submit; ?></option>
                            <?php } ?>



                        </select>



                        <small>pilih tahun untuk ekspor data Calon Anggota ke Format Excel</small>


                </div>
                <button type="submit" class="btn btn-primary">Submit Form</button>
                </form>

                <!-- <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p> -->
            </div>
        </div>








    </section>

</main><!-- End #main -->