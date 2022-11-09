<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data User</h1>
        <a class="btn btn-primary mt-1" href="<?php echo base_url('data_user/tambah_user') ?>" role="button">Tambah User</a>
        <!-- <button type="button" class="btn btn-primary mt-1">Tambah User</button> -->
    </div><!-- End Page Title -->

    <section class="section">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Admin</h5>

                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Level</th>
                            <th scope="col">Status</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengguna as $p) { ?>

                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $p->pengguna_nama; ?></td>
                                <td><?php echo $p->pengguna_email; ?></td>
                                <td><?php echo $p->pengguna_username; ?></td>
                                <td><?php echo $p->pengguna_level; ?></td>
                                <td><?php if ($p->pengguna_status == 1) {
                                        echo "<span class='badge bg-primary'>Aktif</span>";
                                        // echo "<span class='badge badge-success'>Aktif</span>";
                                    } else {
                                        echo "<span class='badge bg-danger'>Nonaktif</span>";
                                        // echo "<span class='badge badge-danger'>Non Aktif</span>";
                                    } ?></td>
                                <td>
                                    <a href="<?php echo base_url() . 'data_user/data_user_edit/' . $p->id_pengguna; ?>" class="btn btn-success btn-sm"> <i class="bi bi-pencil"></i> </a>
                                    <a href="<?php echo base_url() . 'data_user/data_user_hapus/' . $p->id_pengguna; ?>" class="btn btn-danger btn-sm"> <i class="bi bi-x-square-fill"></i> </a>

                                </td>

                            </tr>




                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

</main><!-- End #main -->