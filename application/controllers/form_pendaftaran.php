<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_pendaftaran extends CI_Controller
{

    // controller ini dikhususkan untuk hak akses CA bukan untuk admin
    function __construct()
    {
        parent::__construct();
        // cek session login
        // jika ketahuan gak login akan redirect ke halaman auth
        if (!is_login()) redirect('auth?alert=belum_login');
        $this->load->model('m_data');
        $this->load->model('akademik');
        // $this->load->model('selector_akademik');
        // load hak akses model

        $this->load->model('Access_block_model');
        // jika pengguna bukan ca tendang ke 403
        $this->Access_block_model->ca();


        // load hak akses model


    }
    public function index()
    {
        $data['title']  = "Formulir Pendaftaran CA - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";

        $where = array(
            'id_ca' => $this->session->userdata('id')
        );
        // load model pada database untuk form ubah
        $data['fakultas'] =  $this->akademik->get_fakultas();
        // $data['prodi'] = $this->m_data->get_data('data_prodi')->result();
        $data['calon_anggota'] = $this->m_data->edit_data($where, 'data_ca')->result();
        // load model pada database untuk form ubah

        $this->load->view('templates/header_sidebar', $data);
        $this->load->view('partial/formulir_pendaftaran/formulir_pendaftaran', $data);
        $this->load->view('templates/footer');
    }
    public function simpan()
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

            $id =  $this->session->userdata('id');
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


            if ($this->input->post('password') == "") {
                $data = array(
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
                );
            } else {

                $data = array(
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
                );
            }
            $where = array(
                'id_ca' => $id
            );

            $update_ca_query = $this->m_data->update_data($where, $data, 'data_ca');
            redirect(base_url() . 'form_pendaftaran');
            // jika terdapat data ganda yang diiunput maka munculkan error

            // var_dump($data);
        } else {
            $id = $this->session->userdata('id');
            $where = array(
                'id_ca' => $id
            );
            // load model pada database untuk form ubah
            $data['fakultas'] =  $this->akademik->get_fakultas();
            // $data['prodi'] = $this->m_data->get_data('data_prodi')->result();
            $data['calon_anggota'] = $this->m_data->edit_data($where, 'data_ca')->result();
            // load model pada database untuk form ubah

            $this->load->view('templates/header_sidebar');
            $this->load->view('partial/formulir_pendaftaran/formulir_pendaftaran', $data);
            $this->load->view('templates/footer');
        }
    }
    public function print()
    {
        // // load untuk salah satu data yang akan di jadikan PDF
        $where = array(
            'id_ca' => $this->session->userdata('id')
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
}
