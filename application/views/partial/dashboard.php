<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <small>Sebaran Divisi</small>
        <nav>

        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">


        <!-- Left side columns -->

        <div class="row">

            <!-- kartu divisi -->

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Drama</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-masks-theater"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?php echo $hitung_drama; ?></h6>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">


                    <div class="card-body">
                        <h5 class="card-title">Tari</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?php echo $hitung_tari; ?></h6>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">


                    <div class="card-body">
                        <h5 class="card-title">Rupa</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-palette"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?php echo $hitung_rupa; ?></h6>


                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">


                    <div class="card-body">
                        <h5 class="card-title">Sinematografi</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-camera"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?php echo $hitung_sinema; ?></h6>


                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- kartu divisi -->
            <div class="pagetitle">


                <h1>Data Calon Anggota dan Admin</h1>
            </div>

        </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->

        <div class="row">

            <!-- kartu divisi -->

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Calon Anggota Terdaftar</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-user-plus"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?php echo $user_ca; ?></h6>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">


                    <div class="card-body">
                        <h5 class="card-title">Jumlah Admin</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?php echo $user_admin; ?></h6>


                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- Revenue Card -->


            <!-- Reports -->
            <div class="col-12">
                <div class="card">




                </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->




        </div>

    </section>

</main><!-- End #main -->