<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Prodi</h1>
        <a class="btn btn-primary mt-1" href="<?php echo base_url('data_prodi/tambah_prodi'); ?>" role="button">Tambah Prodi</a>
    </div><!-- End Page Title -->

    <!-- <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0"> -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Manajemen Data Prodi</h5>

                <!-- Default Table -->
                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Prodi</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Opsi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($prodi as $p) { ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $p->nama_prodi; ?></td>
                                <td><?php echo $p->nama_fakultas ?></td>
                                <td>

                                    <a href="<?php echo base_url() . 'data_prodi/edit_prodi/' . $p->id_prodi; ?>" class="btn btn-success btn-sm"> <i class="fa fa-pen"></i> </a>
                                    <a href="javascript:void(0);" onclick="hapus(<?php echo  $p->id_prodi; ?>);" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>

                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- End Default Table Example -->
            </div>
        </div>
        </div>
        <!-- kotak konfirmasi hapus -->

        <script type="text/javascript">
            var url = "<?php echo base_url(); ?>";

            function hapus(id) {
                var r = confirm("Apakah anda yakin menghapus Program Studi Ini?")
                if (r == true)
                    window.location = url + "data_prodi/hapus_prodi/" + id;
                else
                    return false;
            }
        </script>
        <!-- kotak konfirmasi hapus -->
</main><!-- End #main -->