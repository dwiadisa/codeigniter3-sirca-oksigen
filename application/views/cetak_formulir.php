<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- my css -->


    <link rel="stylesheet" href="<?php echo base_url('form/'); ?>style.css">
    <!-- my css -->

    <?php foreach ($calon_anggota as $ca) {
        # code...
    ?>


        <title>Formulir CA <?php echo $ca->no_induk_CA; ?></title>
</head>




<body>
    <div class="container text-center">
        <img src="<?php echo base_url('form/kop_surat.jpg') ?>" alt="" width="500" srcset="">

    </div>
    <div class=" mt-2 container text-center fw-bold ">
        <header class="tnr">
            Formulir Pendaftaran Calon Anggota <br> </header>
        <div class="tnr">UKM TEATER OKSIGEN <br>
            Tahun 2020/2021<br>

            Universitas Muhammadiyah Jember<br>
        </div> <br>
    </div>




    <div class="tnr container">

        Nama Lengkap : <?php echo $ca->pengguna_nama; ?> <br>
        NIM : <?php echo $ca->nim; ?><br>

        <?php
        // query nama prodi untuk identitas
        $fakultas_query = $this->db->query("SELECT nama_fakultas FROM data_fakultas WHERE id_fakultas=$ca->fakultas LIMIT 1")->result();
        $prodi_query = $this->db->query("SELECT nama_prodi FROM data_prodi WHERE id_prodi=$ca->prodi LIMIT 1")->result();

        ?>
        Fakultas / Prodi : <?php
                            foreach ($fakultas_query as $faq) {
                                $nama_fak = $faq->nama_fakultas;
                            }

                            foreach ($prodi_query as $pdq) {
                                $nama_prodi = $pdq->nama_prodi;
                            }

                            echo $nama_fak . " / " . $nama_prodi; ?><br>

        Jenis Kelamin : <?php echo $ca->jenis_kelamin; ?> <br>
        Tempat / Tanggal Lahir : <?php echo $ca->tempat_lahir . "/" . $ca->tanggal_lahir; ?> <br>
        Alamat Rumah :<?php echo $ca->alamat_rumah; ?> <br>

        Alamat Kosan :<?php echo $ca->alamat_kost; ?> <br>

        Instagram :<?php echo $ca->instagram; ?> <br>
        E-mail :<?php echo $ca->pengguna_email; ?> <br>
        Nomer hp :<?php echo $ca->no_hp; ?> <br>
        Hobby : <?php echo $ca->hobi; ?> <br>
        Bidang Peminatan : <?php

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






                            ?> <br>
        Riwayat Organisasi :<?php echo $ca->riwayat_organisasi; ?> <br>
        Alasan :<?php echo $ca->alasan; ?> <br>


    </div>



    <div class="container">

        <table class="mt-4" style="width:100%">
            <tr>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <!-- kolom pas foto dan tertanda -->
                <td><img src="<?php echo base_url('upload/foto_ca/');
                                echo $ca->foto_diri; ?> " class="" width="90px" alt="" srcset=""></td>
                <td style="text-align:center ;">Jember, <?php echo $ca->tanggal_submit; ?> <br><br>
                    <br<br>

                        (<?php echo $ca->pengguna_nama; ?>) <br>
                        Nama Lengkap
                </td>
            </tr>

        </table>
    </div>
<?php } ?>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>