<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Calon Anggota</h1>
        <a class="btn btn-primary mt-1" href="<?php echo base_url('data_ca') ?>" role="button">Kembali</a>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Formulir Tambah Data Calon Anggota</h5>

                <!-- General Form Elements -->
                <?php echo form_open_multipart('data_ca/tambah_ca_aksi'); ?>

                <!-- data auth -->

                <label for="">Data Autentifikasi</label>
                <hr>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control">
                        <small class="text-danger">
                            <?php echo
                            form_error('username'); ?> </small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control">
                        <small class="text-danger">
                            <?php echo
                            form_error('email'); ?> </small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control">
                        <small class="text-danger">
                            <?php echo
                            form_error('password'); ?> </small>
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
                        <input type="text" name="nama" class="form-control">
                        <small class="text-danger">
                            <?php echo
                            form_error('nama'); ?> </small>
                    </div>
                </div>
                <!-- form nama -->

                <!-- form nim -->
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Nomor Induk Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="number" name="nim" class="form-control">
                        <small class="text-danger">
                            <?php echo
                            form_error('nim'); ?> </small>
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
                                <option value="<?php echo $row->id_fakultas; ?>"> <?php echo $row->nama_fakultas; ?> </option>
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

                        </select>
                        <small class="text-danger">
                            <?php echo
                            form_error('prodi'); ?> </small>
                    </div>
                </div>
                <!-- prodi -->

                <!-- form fakultas dan prodi -->
                <!-- jenis kelamin -->

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example">
                            <option selected="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>

                        </select>
                        <small class="text-danger">
                            <?php echo
                            form_error('jenis_kelamin'); ?> </small>
                    </div>
                </div>



                <!-- jenis kelamin -->
                <!-- Tempat Lahir -->
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" name="tempat_lahir" class="form-control">
                        <small class="text-danger">
                            <?php echo
                            form_error('tempat_lahir'); ?> </small>
                    </div>
                </div>
                <!-- Tempat Lahir -->


                <!-- tanggal lahir -->

                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" name="tanggal_lahir" class="form-control">
                        <small class="text-danger">
                            <?php echo
                            form_error('tanggal_lahir'); ?> </small>
                    </div>
                </div>

                <!-- tanggal lahir -->
                <!-- alamat rumah -->


                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Rumah</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="alamat_rumah" style="height: 100px"></textarea>
                        <small class="text-danger">
                            <?php echo
                            form_error('alamat_rumah'); ?> </small>
                    </div>
                </div>
                <!-- alamat rumah -->
                <!-- alamat kost -->



                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Kost</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="alamat_kost" style="height: 100px"></textarea>
                        <small class="text-danger">
                            <?php echo
                            form_error('alamat_kost'); ?> </small>
                    </div>
                </div>
                <!-- alamat kost -->

                <!-- instagram -->
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Instagram</label>
                    <div class="col-sm-10">
                        <input type="text" name="instagram" class="form-control">
                        <small class="text-danger">
                            <?php echo
                            form_error('instagram'); ?> </small>
                    </div>
                </div>
                <!-- instagram -->


                <!-- no hp  -->



                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_hp" class="form-control">
                        <small class="text-danger">
                            <?php echo
                            form_error('no_hp'); ?> </small>
                    </div>
                </div>
                <!-- no hp  -->
                <!-- hobi -->


                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Hobi</label>
                    <div class="col-sm-10">
                        <input type="text" name="hobi" class="form-control">
                        <small class="text-danger">
                            <?php echo
                            form_error('hobi'); ?> </small>
                    </div>
                </div>
                <!-- hobi -->


                <!-- checklist divisi -->


                <div class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Divisi</legend>
                    <div class="col-sm-10">

                        <div class="form-check">
                            <input class="form-check-input" name="div_drama" type="checkbox" id="gridCheck1" value="1">
                            <label class="form-check-label" for="gridCheck1">
                                Drama
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="div_tari" type="checkbox" id="gridCheck1" value="1">
                            <label class="form-check-label" for="gridCheck1">
                                Tari
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="div_rupa" type="checkbox" id="gridCheck1" value="1">
                            <label class="form-check-label" for="gridCheck1">
                                Rupa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="div_sinema" type="checkbox" id="gridCheck1" value="1">
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
                        <textarea class="form-control" name="alasan" style="height: 100px"></textarea>
                        <small class="text-danger">
                            <?php echo
                            form_error('alasan'); ?> </small>
                    </div>
                </div>
                <!-- alasan mengikuti oksigen -->

                <!-- Riwayat Organisasi -->


                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Riwayat Organisasi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="riwayat_organisasi" style="height: 100px"></textarea>
                        <small class="text-danger">
                            <?php echo
                            form_error('riwayat_organisasi'); ?> </small>
                    </div>
                </div>
                <!-- Riwayat Organisasi -->

                <!-- form upload foto diri -->


                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Foto Diri</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="foto_diri" id="formFile">
                        <small>foto maksimal 2 mb format *.jpg atau *.png</small>
                        <small class="text-danger">
                            <?php echo
                            form_error('foto_diri'); ?> </small>
                    </div>
                </div>
                <!-- form upload foto diri -->


                <!-- form upload ktm -->

                <!-- <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Kartu tanda Mahasiswa</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="ktm" id="formFile">
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

</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<!-- JS jquery chain -->

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







<!-- JS jquery chain -->