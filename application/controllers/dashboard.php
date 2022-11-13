<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // cek session login
        // jika ketahuan gak login akan redirect ke halaman auth
        if (!is_login()) redirect('auth?alert=belum_login');
        $this->load->model('m_data');
        // $this->load->model('selector_akademik');

        // load access block model untuk membatasi user

        $this->load->model('Access_block_model');
        $this->Access_block_model->ca_akses();


        // load access block model untuk membatasi user
    }

    public function index()
    {

        // hitung jumlah ca yang terdaftar di divisi-divisi

        // hitung jumlah CA terdaftar dan user admin yang terdaftar
        $data['user_admin'] = $this->m_data->get_data('pengguna')->num_rows();
        $data['user_ca'] = $this->m_data->get_data('data_ca')->num_rows();
        // hitung jumlah CA terdaftar dan user admin yang terdaftar

        // hitung di tiap divisi divisi di sebaran
        $data['hitung_drama'] = $this->db->query("SELECT * FROM `data_ca` WHERE `div_drama`='1'")->num_rows();
        $data['hitung_tari'] = $this->db->query("SELECT * FROM `data_ca` WHERE `div_tari`='1'")->num_rows();
        $data['hitung_rupa'] = $this->db->query("SELECT * FROM `data_ca` WHERE `div_rupa`='1'")->num_rows();
        $data['hitung_sinema'] = $this->db->query("SELECT * FROM `data_ca` WHERE `div_sinema`='1'")->num_rows();


        // hitung di tiap divisi divisi di sebaran


        // hitung jumlah ca yang terdaftar di divisi-divisi

        $this->load->view('templates/header_sidebar');
        $this->load->view('partial/dashboard', $data);
        $this->load->view('templates/footer');
        // $this->load->view('test_login');


        // $this->load->view('welcome_message');
    }
}
