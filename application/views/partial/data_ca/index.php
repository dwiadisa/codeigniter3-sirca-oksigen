<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data CA</h1>
        <a class="btn btn-primary mt-1" href="<?php echo base_url('data_ca/tambah_ca') ?>" role="button"><i class="fa-solid fa-plus-large"></i> Tambah Data Calon Anggota</a>
        <a class="btn btn-success mt-1" href="<?php echo base_url('data_ca/download') ?>" role="button"> <i class="fa-solid fa-file-excel"></i> Download</a>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Calon Anggota</h5>

                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- nambah -->
                            <th scope="col">No.</th>
                            <th scope="col">Foto Diri</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Bidang Peminatan</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengguna as $p) { ?>

                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td>

                                    <img src="<?php echo base_url('upload/foto_ca/');
                                                echo $p->foto_diri; ?> " width="55px" alt="" srcset="">

                                </td>
                                <td><?php echo $p->nim; ?></td>
                                <td><?php echo $p->pengguna_nama; ?></td>
                                <td>
                                    <?php echo $p->nama_fakultas; ?>
                                </td>
                                <td>

                                    <?php
                                    if ($p->id_prodi !== NULL) {
                                        echo $p->nama_prodi;
                                    } elseif ($p->id_prodi == "") {
                                        echo "nama prodi tidak valid";
                                    } else {
                                        echo "nama prodi tidak valid";
                                    }



                                    ?>

                                </td>
                                <td>

                                    <div class="row">
                                        <div class="col-1"><?php if ($p->div_drama == 1) {
                                                                echo "<i class='fas fa-theater-masks'></i>";
                                                            } else {
                                                            }  ?>
                                        </div>
                                        <div class="col-1">
                                            <?php
                                            $icon_tari = "<img src=" . base_url('assets/img/tari.png ') . "width='16px'></img> ";
                                            ?><?php if ($p->div_tari == 1) {
                                                    echo $icon_tari;
                                                } else {
                                                } ?></div>
                                        <div class="col-1"><?php if ($p->div_rupa == 1) {
                                                                echo "<i class='fas fa-palette'></i>";
                                                            } else {
                                                            } ?></div>
                                        <div class="col-1"><?php if ($p->div_sinema == 1) {
                                                                echo "<i class='fas fa-camera'></i>";
                                                            } else {
                                                            } ?></div>
                                    </div>
                                </td>

                                <td>


                                    <a href="<?php echo base_url() . 'data_ca/lihat_ca/' . $p->id_ca;  ?>" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> </a>
                                    <a href="<?php echo base_url() . 'data_ca/print_form_ca/' . $p->id_ca;  ?>" class="btn btn-warning btn-sm"> <i class="fa fa-download"></i> </a>
                                    <a href="<?php echo base_url() . 'data_ca/ubah_ca/' . $p->id_ca;   ?>" class="btn btn-success btn-sm"> <i class="fa fa-pen"></i> </a>
                                    <a href="<?php echo base_url() . 'data_ca/hapus_ca/' . $p->id_ca;  ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                                </td>


                                </td>

                            </tr>




                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>


</main><!-- End #main -->