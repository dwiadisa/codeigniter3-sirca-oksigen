<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Fakultas</h1>
        <a class="btn btn-primary mt-1" href="<?php echo base_url('data_fakultas/tambah_fakultas') ?>" role="button">Tambah Fakultas</a>
    </div><!-- End Page Title -->

    <section class="section">


        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Fakultas</h5>

                <!-- Default Table -->
                <table id="table-data" class="table table-data table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Fakultas</th>
                            <th scope="col">Opsi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <?php
                            $no = 1;
                            foreach ($fakultas as $f) { ?>
                        <tr>
                            <th scope="row"><?php echo $no++; ?></td>
                            <td><?php echo $f->nama_fakultas; ?> </td>
                            <td>

                                <a href="<?php echo base_url() . 'data_fakultas/edit_fakultas/' . $f->id_fakultas; ?>" class="btn btn-success btn-sm"> <i class="fa fa-pen"></i> </a>

                                <a href="javascript:void(0);" onclick="hapus(<?php echo  $f->id_fakultas; ?>);" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                            </td>
                        <?php } ?>
                        </tr>



                        </tr>

                    </tbody>
                </table>
                <!-- End Default Table Example -->
            </div>
        </div>
        <!-- kotak konfirmasi untuk delete fakultas -->

        <script type="text/javascript">
            var url = "<?php echo base_url(); ?>";

            function hapus(id) {
                var r = confirm("Apakah Anda yakin menghapus Fakultas Ini?")
                if (r == true)
                    window.location = url + "data_fakultas/hapus_fakultas/" + id;
                else
                    return false;
            }
        </script>
        <!-- kotak konfirmasi untuk delete fakultas -->

    </section>

</main><!-- End #main -->