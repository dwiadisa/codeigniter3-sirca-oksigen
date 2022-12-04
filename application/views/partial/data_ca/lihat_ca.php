<main id="main" class="main">

    <div class="pagetitle">
        <h1>Lihat Informasi Calon Anggota</h1>
        <nav>
            <a class="btn btn-primary" href="<?php echo base_url('data_ca'); ?>" role="button">Kembali</a>


        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <?php

                foreach ($calon_anggota as $ca) {

                    // var_dump($calon_anggota); 
                ?>
                    <h5 class="card-title">Informasi Calon Anggota No induk <?php echo $ca->no_induk_CA ?> </h5>
                    <div class=" container card text-center" style="width: 18rem;">
                        <img src="<?php echo base_url('upload/foto_ca/');
                                    echo $ca->foto_diri; ?> " class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?php echo $ca->pengguna_nama; ?></p>
                        </div>
                    </div>

                    <div class="container">
                        <h5 class="card-title">Rincian </h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b> Nama Calon Anggota</b> </div>
                            <div class="col-lg-9 col-md-8"><?php echo $ca->pengguna_nama; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b> Nomor Induk Mahasiswa</b> </div>
                            <div class="col-lg-9 col-md-8"><?php echo $ca->nim; ?></div>
       
                 </div>
                 <?php

  $fakultas_query = $this->db->query("SELECT nama_fakultas FROM data_fakultas WHERE id_fakultas=$ca->fakultas LIMIT 1")->result();
        $prodi_query = $this->db->query("SELECT nama_prodi FROM data_prodi WHERE id_prodi=$ca->prodi LIMIT 1")->result();

        ?>
        <?php
                            foreach ($fakultas_query as $faq) {
                                $nama_fak = $faq->nama_fakultas;
                            }

                            foreach ($prodi_query as $pdq) {
                                $nama_prodi = $pdq->nama_prodi;
                            }

                          
?>

                        
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b> Fakultas / Prodi</b> </div>
                            <div class="col-lg-9 col-md-8"><?php echo $nama_fak . " / " . $nama_prodi; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b> Jenis Kelamin</b> </div>
                            <div class="col-lg-9 col-md-8"><?php echo $ca->jenis_kelamin;  ?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b>Tempat/Tanggal Lahir</b> </div>
                            <div class="col-lg-9 col-md-8"><?php echo $ca->tempat_lahir . " / " . $ca->tanggal_lahir ?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b>Alamat Rumah</b> </div>
                            <div class="col-lg-9 col-md-8"><?php echo $ca->alamat_rumah; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b>Alamat Kost</b> </div>
                            <div class="col-lg-9 col-md-8"><?php echo $ca->alamat_kost; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b>Instagram</b> </div>
                            <a href="https://www.instagram.com/<?php echo $ca->instagram ?>" div class="col-lg-9 col-md-8"><?php echo $ca->instagram ?>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b>No HP</b> </div>
                            <div class="col-lg-9 col-md-8"><?php echo $ca->no_hp; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b>Hobi</b> </div>
                            <div class="col-lg-9 col-md-8"><?php echo $ca->hobi; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b>Divisi</b> </div>
                            <div class="col-lg-9 col-md-8">
                                <?php

                                if ($ca->div_drama == 1) {
                                    echo "Drama";
                                } else {
                                    echo "";
                                }
                                if ($ca->div_tari == 1) {
                                    echo " Tari";
                                } else {
                                    echo "";
                                }
                                if ($ca->div_rupa == 1) {
                                    echo " Rupa";
                                } else {
                                    echo "";
                                }
                                if ($ca->div_sinema == 1) {
                                    echo " Sinematografi";
                                } else {
                                    echo "";
                                }






                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b>Alasan</b> </div>
                            <div class="col-lg-9 col-md-8"><?php echo $ca->alasan; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label "><b>Riwayat Organisasi</b> </div>
                            <div class="col-lg-9 col-md-8"><?php echo $ca->riwayat_organisasi; ?></div>
                        </div>

                        <div class=" container card mt-4" style="width: 18rem;">
                            <img src="<?php echo base_url('upload/ktm/');
                                        echo $ca->foto_ktm; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><b> Kartu Tanda Mahasiswa.</b> </p>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
    </section>



</main>
<?php } ?>