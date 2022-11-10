<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Data Calon Anggota</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <?php
                foreach ($calon_anggota as $ca) {

                    // var_dump($calon_anggota);
                ?>

                    <h5 class="card-title">Edit Data Calon Anggota</h5>

                    <!-- General Form Elements -->
                    <form method="POST" action="<?php echo base_url('data_ca/update_ca');  ?>  ">



                        <!-- data auth -->

                        <label for="">Data Autentifikasi</label>
                        <hr>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id_ca" class="form-control" value="<?php echo $ca->id_ca; ?>">
                                <input type="text" name="username" class="form-control" value="<?php echo $ca->pengguna_username; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" value="<?php echo $ca->pengguna_email; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control">
                                <small>kosongkan jika tidak merubah password</small>
                            </div>
                        </div>



                        <!-- <hr> -->
                        <!-- data auth -->

                        <label for="">Data Calon Anggota</label>
                        <hr>
                        <!-- data diri CA -->
                        <!-- form nama -->
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" value="<?php echo $ca->pengguna_nama  ?>">
                            </div>
                        </div>
                        <!-- form nama -->

                        <!-- form nim -->
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Nomor Induk Mahasiswa</label>
                            <div class="col-sm-10">
                                <input type="number" name="nim" value="<?php echo $ca->nim; ?>" class="form-control">
                            </div>
                        </div>
                        <!-- form nim -->
                        <!-- form fakultas dan prodi -->
                        <!-- fakultas -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Fakultas</label>
                            <div class="col-sm-10">
                                <select class="form-select fakultas" name="fakultas" id="fakultas" aria-label="Default select example">
                                    <option selected="">Pilih Fakultas</option>
                                    <?php foreach ($fakultas->result() as
                                        $row) { ?>
                                        <option <?php if ($ca->fakultas == $row->id_fakultas) {
                                                    echo "selected='selected'";
                                                } ?> value="<?php echo $row->id_fakultas; ?>"><?php echo $row->nama_fakultas; ?></option>

                                    <?php } ?>


                                </select>
                                <small class="text-danger">
                                    <?php echo
                                    form_error('fakultas'); ?> </small>
                            </div>
                        </div>
                        <!-- fakultas -->

                        <!-- prodi -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Prodi</label>
                            <div class="col-sm-10">
                                <select class="form-select prodi" name="prodi" id="prodi" aria-label="Default select example">
                                    <option selected="">Pilih Prodi</option>
                                    <?php
                                    // ambil salah satu data prodi untuk 1 pilihan 
                                    $where = array(
                                        'id_prodi' => $ca->prodi
                                    );
                                    $prodi = $this->m_data->edit_data($where, 'data_prodi')->result()
                                    ?>
                                    <?php foreach ($prodi as $pd) {
                                        # code...
                                    ?>
                                        <option <?php if ($ca->prodi == $pd->id_prodi) {
                                                    echo "selected='selected'";
                                                } ?> value="<?php echo $pd->id_prodi; ?>"><?php echo $pd->nama_prodi; ?></option>

                                    <?php } ?>
                                </select>
                                <small class="text-danger">
                                    <?php echo
                                    form_error('prodi'); ?> </small>
                            </div>
                        </div>
                        <!-- prodi -->
                        <!-- prodi -->

                        <!-- form fakultas dan prodi -->
                        <!-- jenis kelamin -->

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                                    <?php
                                    // jika terpilih laki-laki maka option select nya berubah menjadi
                                    if ($ca->jenis_kelamin == "Laki-Laki") {
                                        echo "<option selected='Laki-Laki'>Laki-Laki</option>
                                            <option value='Perempuan'>Perempuan</option>";
                                        // begitupun sebaliknya jika perempuan
                                    } elseif ($ca->jenis_kelamin = "Perempuan") {
                                        echo "<option selected='Perempuan'>Perempuan</option>
                                        <option value='Laki-Laki'>Laki-Laki</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>



                        <!-- jenis kelamin -->
                        <!-- Tempat Lahir -->
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" name="tempat_lahir" value="<?php echo $ca->tempat_lahir; ?>" class="form-control">
                            </div>
                        </div>
                        <!-- Tempat Lahir -->


                        <!-- tanggal lahir -->

                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal_lahir" value="<?php echo $ca->tanggal_lahir; ?>" class="form-control">
                            </div>
                        </div>

                        <!-- tanggal lahir -->
                        <!-- alamat rumah -->


                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Rumah</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat_rumah" style="height: 100px"><?php echo $ca->alamat_rumah; ?></textarea>
                            </div>
                        </div>
                        <!-- alamat rumah -->
                        <!-- alamat kost -->



                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Kost</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat_kost" style="height: 100px"><?php echo $ca->alamat_kost; ?></textarea>
                            </div>
                        </div>
                        <!-- alamat kost -->

                        <!-- instagram -->
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Instagram</label>
                            <div class="col-sm-10">
                                <input type="text" name="instagram" value="<?php echo $ca->instagram ?>" class="form-control">
                            </div>
                        </div>
                        <!-- instagram -->


                        <!-- no hp  -->



                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_hp" value="<?php echo $ca->no_hp; ?>" class="form-control">
                            </div>
                        </div>
                        <!-- no hp  -->
                        <!-- hobi -->


                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Hobi</label>
                            <div class="col-sm-10">
                                <input type="text" name="hobi" value="<?php echo $ca->hobi; ?>" class="form-control">
                            </div>
                        </div>
                        <!-- hobi -->


                        <!-- checklist divisi -->


                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Divisi</legend>
                            <div class="col-sm-10">

                                <div class="form-check">
                                    <input class="form-check-input" name="div_drama" value="1" type="checkbox" id="gridCheck1" <?php
                                                                                                                                if ($ca->div_drama == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } else {
                                                                                                                                }


                                                                                                                                ?>>
                                    <label class="form-check-label" for="gridCheck1">
                                        Drama
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="div_tari" value="1" type="checkbox" id="gridCheck1" <?php
                                                                                                                                if ($ca->div_tari == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } else {
                                                                                                                                }


                                                                                                                                ?>>
                                    <label class="form-check-label" for="gridCheck1">
                                        Tari
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="div_rupa" value="1" type="checkbox" id="gridCheck1" <?php
                                                                                                                                if ($ca->div_rupa == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } else {
                                                                                                                                }


                                                                                                                                ?>>
                                    <label class="form-check-label" for="gridCheck1">
                                        Rupa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="div_sinema" value="1" type="checkbox" id="gridCheck1" <?php
                                                                                                                                if ($ca->div_sinema == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } else {
                                                                                                                                }


                                                                                                                                ?>>
                                    <label class="form-check-label" for="gridCheck1">
                                        Sinematografi
                                    </label>
                                </div>



                            </div>
                        </div>
                        <!-- checklist divisi -->

                        <!-- alasan mengikuti oksigen -->


                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alasan Mengikuti UKM Teater Oksigen</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alasan" style="height: 100px"><?php echo $ca->alasan; ?></textarea>
                            </div>
                        </div>
                        <!-- alasan mengikuti oksigen -->

                        <!-- Riwayat Organisasi -->


                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Riwayat Organisasi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="riwayat_organisasi" style="height: 100px"> <?php echo $ca->riwayat_organisasi; ?></textarea>
                            </div>
                        </div>
                        <!-- Riwayat Organisasi -->

                        <!-- form upload foto diri -->


                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="foto_diri" value="<?php echo $ca->foto_diri; ?>" type="file" id="formFile">
                            </div>
                        </div>
                        <!-- form upload foto diri -->


                        <!-- form upload ktm -->
                        <!-- 
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Kartu tanda Mahasiswa</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="ktm" value="<?php $ca->foto_ktm; ?>" type="file" id="formFile">
                            </div>
                        </div> -->
                        <!-- form upload ktm -->



                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"> </label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                        <?php echo form_close(); ?>
                        <!-- End General Form Elements -->

            </div>
        </div>
    </section>
    <!-- dropdown untuk fakultas dan prodi -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#fakultas').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>dropdown/get_prodi",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value =' + data[i].id_prodi + '>' + data[i].nama_prodi;
                            '</option>';
                        }
                        $('#prodi').html(html);

                        // console.log()
                    }
                });
            });
        });
    </script>







    <!-- dropdown untuk fakultas dan prodi -->

</main><!-- End #main -->
<?php } ?>