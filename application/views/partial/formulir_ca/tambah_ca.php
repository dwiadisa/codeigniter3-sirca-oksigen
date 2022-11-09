<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Calon Anggota</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Formulir Tambah Data Calon Anggota</h5>

                <!-- General Form Elements -->
                <form method="POST" action="<?php echo base_url('data_ca/tambah_ca_aksi');  ?>  ">



                    <!-- data auth -->
                    <!-- 
                    <label for="">Data Autentifikasi</label>
                    <hr>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div> -->



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
                        </div>
                    </div>
                    <!-- form nama -->

                    <!-- form nim -->
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Nomor Induk Mahasiswa</label>
                        <div class="col-sm-10">
                            <input type="number" name="nim" class="form-control">
                        </div>
                    </div>
                    <!-- form nim -->
                    <!-- form fakultas dan prodi -->
                    <!-- fakultas -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <!-- fakultas -->
                    <!-- prodi -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <!-- prodi -->

                    <!-- form fakultas dan prodi -->
                    <!-- jenis kelamin -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>



                    <!-- jenis kelamin -->
                    <!-- Tempat Lahir -->
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <!-- Tempat Lahir -->


                    <!-- tanggal lahir -->

                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control">
                        </div>
                    </div>

                    <!-- tanggal lahir -->
                    <!-- alamat rumah -->


                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Rumah</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <!-- alamat rumah -->
                    <!-- alamat kost -->



                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Kost</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <!-- alamat kost -->

                    <!-- instagram -->
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <!-- instagram -->


                    <!-- no hp  -->



                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <!-- no hp  -->
                    <!-- hobi -->


                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Hobi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <!-- hobi -->


                    <!-- checklist divisi -->


                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Divisi</legend>
                        <div class="col-sm-10">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Drama
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Tari
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Rupa
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
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
                            <textarea class="form-control" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <!-- alasan mengikuti oksigen -->

                    <!-- Riwayat Organisasi -->


                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Riwayat Organisasi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <!-- Riwayat Organisasi -->

                    <!-- form upload foto diri -->


                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    <!-- form upload foto diri -->


                    <!-- form upload ktm -->

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    <!-- form upload ktm -->



                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Submit Button</label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit Form</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->