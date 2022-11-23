<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_ca extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // cek session login
        // jika ketahuan gak login akan redirect ke halaman auth
        if (!is_login()) redirect('auth?alert=belum_login');
        $this->load->model('m_data');
        $this->load->model('akademik');

        // upload file loader

        $this->load->library('upload');
        // $this->upload->initialize($config);
        // upload file loader
        // $this->load->model('selector_akademik');
        // load hak akses model

        $this->load->model('Access_block_model');
        // jika pengguna bukan ca tendang ke 403
        $this->Access_block_model->ca_akses();


        // load hak akses model




    }

    public function index()
    {
        // simpan data judul
        $data['title']  = "Data CA - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";
        $data['pengguna'] = $this->db->query("SELECT * FROM data_ca, data_prodi, data_fakultas WHERE data_ca.fakultas = id_fakultas and data_ca.prodi=id_prodi")->result();

        // $data['prodi_fakultas'] = $this->m_data->relasi_prodi();

        // var_dump($data['prodi_dan_fakultas']);
        $this->load->model('m_data');
        // $data['pengguna'] = $this->m_data->get_data('data_ca')->result();
        $this->load->view('templates/header_sidebar', $data);
        $this->load->view('partial/data_ca/index', $data);
        $this->load->view('templates/footer');
        // $this->load->view('welcome_message');
    }
    public function tambah_ca()
    {
        $data['title']  = "Tambah CA - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";
        $data['fakultas'] =  $this->akademik->get_fakultas();
        $this->load->view('templates/header_sidebar', $data);
        $this->load->view('partial/data_ca/tambah_ca', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_ca_aksi()
    {
        // form validation untuk data autentifikasi
        $this->form_validation->set_rules('username', 'User name', 'required|is_unique[data_ca.pengguna_username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[data_ca.pengguna_email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        //   form validation untuk formulir pendaftaran
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|is_unique[data_ca.nim]', 'integer');
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'required');
        $this->form_validation->set_rules('alamat_kost', 'Alamat Kost');

        $this->form_validation->set_rules('instagram', 'Instagram');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required', 'integer');
        $this->form_validation->set_rules('hobi', 'Hobi');
        // $this->form_validation->set_rules('hobi', 'Hobi');
        // form validation untuk kolom divisi
        // untuk pemilihan subdivisi berada di perintah $this->input-post dikarenakan berupa form checkbox
        // form validation untuk kolom divisi
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('riwayat_organisasi', 'Alasan', 'required');
        // validasi untuk foto

        if (empty($_FILES['foto_diri']['name'])) {
            $this->form_validation->set_rules('foto_diri', 'Foto', 'required');
        }

        if ($this->form_validation->run() != false) {
            // perjalanan untuk form validation data auth
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            // perjalanan untuk form validation data diri
            $nama = $this->input->post('nama');
            $nim = $this->input->post('nim');
            $fakultas = $this->input->post('fakultas');
            $prodi = $this->input->post('prodi');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $alamat_rumah = $this->input->post('alamat_rumah');
            $alamat_kost = $this->input->post('alamat_kost');
            $instagram = $this->input->post('instagram');
            $no_hp = $this->input->post('no_hp');
            $hobi = $this->input->post('hobi');
            // perjalanan untuk form validation divisi
            $drama = $this->input->post("div_drama");
            if ($drama != null) {
                $drama = "1";
            } else {
                $drama =  "0";
            }
            $tari = $this->input->post("div_tari");
            if ($tari != null) {
                $tari =  "1";
            } else {
                $tari =  "0";
            }
            $rupa = $this->input->post("div_rupa");
            if ($rupa != null) {
                $rupa =  "1";
            } else {
                $rupa =  "0";
            }
            $sinema = $this->input->post("div_sinema");
            if ($sinema != null) {
                $sinema =  "1";
            } else {
                $sinema =  "0";
            }
            // perjalanan untuk form validation divisi


            $alasan = $this->input->post('alasan');
            $riwayat_organisasi = $this->input->post('riwayat_organisasi');
            // perjalanan untuk upload file ktm dan foto diri
            // // foto diri
            $foto_diri = $_FILES['foto_diri'];
            if ($foto_diri == "") {
            } else {
                $config['upload_path'] = './upload/foto_ca';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                // maksimal ukuran file adalah 2 mb
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                // $this->upload->library('upload', $config);
                if (!$this->upload->do_upload('foto_diri')) {
                    echo  "<script>
                    alert('Foto terlalu besar (lebih 2 mb)/format file bukan jpg atau png. untuk foto bisa ditambahkan nanti ');
                    history.back()
                    </script>";
                    $foto_diri = "null_foto.jpg";
                    // var_dump($this->upload->display_errors());
                    // die();
                } else {
                    $foto_diri = $this->upload->data('file_name');
                }
            }



            // $foto = $_FILES['foto'];
            // if ($foto = '') {
            // } else {
            //     $config['upload_path'] = './upload/foto_ca';
            //     $config['allowed_types'] = 'jpg|png|gif';

            //     // $this->upload->initialize($config);
            //     $this->load->library('upload', $config);
            //     if (!$this->upload->do_upload('foto')) {
            //         $foto = "null_foto.jpg";
            //         // die();
            //     } else {
            //         $foto = $this->upload->data('file_name');
            //     }
            // }
            // teest upload
            // format ID CA
            $cato_ = "CATO";
            $date = date("Y");
            $cato = $cato_ . "-"  . $date . "-" . $nim;
            // format ID CA
            $data = array(
                'no_induk_CA' => $cato,
                'pengguna_username' => $username,
                'pengguna_nama' => $nama,
                'pengguna_password' => $password,
                'pengguna_email' => $email,
                'pengguna_level' => 'CALON_ANGGOTA',
                'pengguna_status' => '1',
                'nim' => $nim,
                'fakultas' => $fakultas,
                'prodi' => $prodi,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat_rumah' => $alamat_rumah,
                'alamat_kost' => $alamat_kost,
                'instagram' => $instagram,
                'no_hp' => $no_hp,
                'hobi' => $hobi,
                'div_drama' => $drama,
                'div_tari' =>  $tari,
                'div_rupa' => $rupa,
                'div_sinema' => $sinema,
                'alasan' => $alasan,
                'riwayat_organisasi' => $riwayat_organisasi,
                'foto_ktm' => "null_ktm.png",
                'foto_diri' => $foto_diri,
                'tanggal_submit' => date("Y-m-d"),
                'tahun_submit' => date("Y"),

            );
            $this->m_data->insert_data($data, 'data_ca');
            redirect(base_url() . 'data_ca');


            // perjalanan untuk upload file ktm dan foto diri

            // var_dump($foto_diri);
            // // $ipl = implode($foto_diri);
            // // var_dump($ipl);
            // var_dump($data);

            // echo $username . "<br>";
            // echo $email . "<br>";
            // echo $password . "<br>";
            // echo $nama . "<br>";
            // echo $nim . "<br>";
            // echo $fakultas . "<br>";
            // echo $prodi . "<br>";
            // echo $jenis_kelamin . "<br>";
            // echo $tempat_lahir . "<br>";
            // echo $tanggal_lahir . "<br>";
            // echo $alamat_rumah . "<br>";
            // echo $alamat_kost . "<br>";
            // echo $instagram . "<br>";
            // echo $no_hp . "<br>";
            // echo $hobi . "<br>";
            // echo $drama . "<br>";
            // echo $tari . "<br>";
            // echo $rupa . "<br>";
            // echo $sinema . "<br>";
            // echo $alasan . "<br>";
            // echo $riwayat_organisasi . "<br>";
            // echo $foto . "<br>";
        } else {
            $data['fakultas'] =  $this->akademik->get_fakultas();
            $this->load->view('templates/header_sidebar');
            $this->load->view('partial/data_ca/tambah_ca', $data);
            $this->load->view('templates/footer');
        }
    }


    public function lihat_ca($id)
    {
        $data['title']  = "Lihat Data CA - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";
        $where = array(
            'id_ca' => $id
        );
        $data['calon_anggota'] = $this->m_data->edit_data($where, 'data_ca')->result();

        $this->load->view('templates/header_sidebar', $data);
        $this->load->view('partial/data_ca/lihat_ca', $data);
        $this->load->view('templates/footer');
    }
    public function ubah_ca($id)
    {
        $data['title']  = "Ubah Data CA - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";
        $where = array(
            'id_ca' => $id
        );
        // load model pada database untuk form ubah
        $data['fakultas'] =  $this->akademik->get_fakultas();
        // $data['prodi'] = $this->m_data->get_data('data_prodi')->result();
        $data['calon_anggota'] = $this->m_data->edit_data($where, 'data_ca')->result();
        // load model pada database untuk form ubah

        $this->load->view('templates/header_sidebar', $data);
        $this->load->view('partial/data_ca/edit_ca', $data);
        $this->load->view('templates/footer');
    }

    public function update_ca()
    {
        // form validation untuk data autentifikasi
        $this->form_validation->set_rules('username', 'User name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        //   form validation untuk formulir pendaftaran
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required', 'integer');
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'required');
        $this->form_validation->set_rules('alamat_kost', 'Alamat Kost');

        $this->form_validation->set_rules('instagram', 'Instagram');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required', 'integer');
        $this->form_validation->set_rules('hobi', 'Hobi');
        // $this->form_validation->set_rules('hobi', 'Hobi');
        // form validation untuk kolom divisi
        // untuk pemilihan subdivisi berada di perintah $this->input-post dikarenakan berupa form checkbox
        // form validation untuk kolom divisi
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('riwayat_organisasi', 'Alasan', 'required');
        // validasi untuk foto

        // if (empty($_FILES['foto_diri']['name'])) {
        //     $this->form_validation->set_rules('foto_diri', 'Foto');
        // }


        if ($this->form_validation->run() != false) {
            // perjalanan untuk form validation data auth
            // $id =  $this->input->post('id');

            $id =  $this->input->post('id_ca');
            // perjalanan untuk form validation data auth
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            // perjalanan untuk form validation data diri
            $nama = $this->input->post('nama');
            $nim = $this->input->post('nim');
            $fakultas = $this->input->post('fakultas');
            $prodi = $this->input->post('prodi');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $alamat_rumah = $this->input->post('alamat_rumah');
            $alamat_kost = $this->input->post('alamat_kost');
            $instagram = $this->input->post('instagram');
            $no_hp = $this->input->post('no_hp');
            $hobi = $this->input->post('hobi');
            // penampung nama data gambar

            $foto_diri = $this->input->post('hid_foto_diri');
            // penampung nama data gambar
            // perjalanan untuk form validation divisi
            $drama = $this->input->post("div_drama");
            if ($drama != null) {
                $drama = "1";
            } else {
                $drama =  "0";
            }
            $tari = $this->input->post("div_tari");
            if ($tari != null) {
                $tari =  "1";
            } else {
                $tari =  "0";
            }
            $rupa = $this->input->post("div_rupa");
            if ($rupa != null) {
                $rupa =  "1";
            } else {
                $rupa =  "0";
            }
            $sinema = $this->input->post("div_sinema");
            if ($sinema != null) {
                $sinema =  "1";
            } else {
                $sinema =  "0";
            }
            // perjalanan untuk form validation divisi


            $alasan = $this->input->post('alasan');
            $riwayat_organisasi = $this->input->post('riwayat_organisasi');

            $file_name = $_FILES['foto_diri']['name'];
            $config['upload_path'] = './upload/foto_ca';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['overwrite']            = true;
            $config['max_size']             = 2048; // 1MB
            // $config['max_width']            = 1080;
            // $config['max_height']           = 1080;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_diri')) {

                $foto_diri = $this->input->post('hid_foto_diri');
                // var_dump($foto_diri);
                // $error = array('error' => $this->upload->display_errors());
                // echo  "<script>
                //     alert('Foto terlalu besar (lebih 2 mb)/format file bukan jpg atau png. untuk foto bisa ditambahkan nanti ');
                //     history.back();
                //     </script>";
                // var_dump($error);
                // die;
            } else {

                $foto_diri = ($this->upload->data('file_name'));
                // commingsoon unlink

                // die;
                // $foto_diri = $this->upload->data();
            }

            // format ID CA

            $cato_ = "CATO";
            $date = date("Y");
            $cato = $cato_ . "-"  . $date . "-" . $nim;
            if ($this->input->post('password') == "") {
                $data = array(
                    'no_induk_CA' => $cato,
                    'pengguna_username' => $username,
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email,
                    'pengguna_level' => 'CALON_ANGGOTA',
                    'pengguna_status' => '1',
                    'nim' => $nim,
                    'fakultas' => $fakultas,
                    'prodi' => $prodi,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'alamat_rumah' => $alamat_rumah,
                    'alamat_kost' => $alamat_kost,
                    'instagram' => $instagram,
                    'no_hp' => $no_hp,
                    'hobi' => $hobi,
                    'div_drama' => $drama,
                    'div_tari' =>  $tari,
                    'div_rupa' => $rupa,
                    'div_sinema' => $sinema,
                    'alasan' => $alasan,
                    'riwayat_organisasi' => $riwayat_organisasi,
                    'foto_ktm' => "null_ktm.png",
                    'foto_diri' => $foto_diri,
                    'tanggal_submit' => date("Y-m-d"),
                    'tahun_submit' => date("Y"),
                );
            } else {

                $data = array(
                    'no_induk_CA' => $cato,
                    'pengguna_username' => $username,
                    'pengguna_nama' => $nama,
                    'pengguna_password' => $password,
                    'pengguna_email' => $email,
                    'pengguna_level' => 'CALON_ANGGOTA',
                    'pengguna_status' => '1',
                    'nim' => $nim,
                    'fakultas' => $fakultas,
                    'prodi' => $prodi,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'alamat_rumah' => $alamat_rumah,
                    'alamat_kost' => $alamat_kost,
                    'instagram' => $instagram,
                    'no_hp' => $no_hp,
                    'hobi' => $hobi,
                    'div_drama' => $drama,
                    'div_tari' =>  $tari,
                    'div_rupa' => $rupa,
                    'div_sinema' => $sinema,
                    'alasan' => $alasan,
                    'riwayat_organisasi' => $riwayat_organisasi,
                    'foto_ktm' => "null_ktm.png",
                    'foto_diri' => $foto_diri,
                    'tanggal_submit' => date("Y-m-d"),
                    'tahun_submit' => date("Y"),
                );
            }
            $where = array(
                'id_ca' => $id
            );

            $update_ca_query = $this->m_data->update_data($where, $data, 'data_ca');
            redirect(base_url() . 'data_ca');
            // jika terdapat data ganda yang diiunput maka munculkan error

            // var_dump($data);
        } else {
            $id =  $this->input->post('id_ca');
            $where = array(
                'id_ca' => $id
            );
            // load model pada database untuk form ubah
            $data['fakultas'] =  $this->akademik->get_fakultas();
            // $data['prodi'] = $this->m_data->get_data('data_prodi')->result();
            $data['calon_anggota'] = $this->m_data->edit_data($where, 'data_ca')->result();
            // load model pada database untuk form ubah

            $this->load->view('templates/header_sidebar');
            $this->load->view('partial/data_ca/edit_ca', $data);
            $this->load->view('templates/footer');
        }
    }



    public function hapus_ca($id)
    {

        $where = array(
            'id_ca' => $id,
        );
        $this->m_data->delete_data($where, 'data_ca');
        redirect(base_url() . 'data_ca');




        // harus ada function unlink untuk delete file foto dan ktm
    }


    // fungsi untuk print form CA 

    public function print_form_ca($id)
    {

        // // load untuk salah satu data yang akan di jadikan PDF
        $where = array(
            'id_ca' => $id
        );
        // $ca_['calon_anggota'] = $this->m_data->edit_data($where, 'data_ca')->result();

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['calon_anggota'] =  $this->m_data->edit_data($where, 'data_ca')->result();;

        // filename dari pdf ketika didownload
        // $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('cetak_formulir',  $this->data, true);
        // $html = $this->load->view('cetak_formulir', $this>data);


        // run dompdf
        $this->pdfgenerator->generate($html,  $paper, $orientation);
    }

    public function download()
    // fungsi ini digunakan untuk export ke file excel rekapan data CA nya..
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('UKM Teater Oksigen')
            ->setLastModifiedBy('UKM Teater Oksigen')
            ->setTitle("Data Calon Anggota")
            ->setSubject("Calon Anggota")
            ->setDescription("Laporan Semua Data Calon Anggota")
            ->setKeywords("Data calon anggota");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA Calon Anggota"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:R1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NO INDUK CA"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "NIM"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "FAKULTAS"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "PRODI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "JENIS KELAMIN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "TEMPAT LAHIR"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "TANGGAL LAHIR"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "ALAMAT RUMAH"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "ALAMAT KOST"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "INSTAGRAM"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "NO HP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('N3', "HOBI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('O3', "DIVISI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('P3', "ALASAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('Q3', "PENGALAMAN ORGANISASI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('R3', "FOTO"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $calon_anggota = $this->db->query("SELECT * FROM data_ca, data_prodi, data_fakultas WHERE data_ca.fakultas = id_fakultas and prodi=id_prodi")->result();
        // $siswa = $this->SiswaModel->view();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($calon_anggota as $data) { // Lakukan looping pada variabel siswa
            // $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no++);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->no_induk_CA);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->pengguna_nama);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nim);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nama_fakultas);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->nama_prodi);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->jenis_kelamin);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->tempat_lahir);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->tanggal_lahir);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->alamat_rumah);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->alamat_kost);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->instagram);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->no_hp);
            $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data->hobi);
            // pengisian value untuk setiap divisi 
            if ($data->div_drama == 1) {
                $drama = "Drama";
            } else {
                $drama = "";
            }
            if ($data->div_tari == 1) {
                $tari = " Tari";
            } else {
                $tari = "";
            }
            if ($data->div_rupa == 1) {
                $rupa =  " Rupa";
            } else {
                $rupa = "";
            }
            if ($data->div_sinema == 1) {
                $sinema =  " Sinematografi";
            } else {
                $sinema = "";
            }
            // pengisian value untuk setiap divisi 
            $excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, $drama . $tari . $rupa . $sinema);
            $excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, $data->alasan);
            $excel->setActiveSheetIndex(0)->setCellValue('Q' . $numrow, $data->riwayat_organisasi);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('P' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('Q' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('R' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('R')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data calon anggotas");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data calon anggota UKM Teater OKsigen.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }


    public function cek()
    {
        $this->load->view('cetak_formulir');
    }


    //  chain drodown fakultas dan prodi
    public function get_prodi()
    {
        $id = $this->input->post('id');
        $data = $this->akademik->get_prodi($id);
        echo json_encode($data);
    }
    //  chain drodown fakultas dan prodi

}
