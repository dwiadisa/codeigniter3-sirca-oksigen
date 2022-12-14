<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // cek session login
        // jika ketahuan gak login akan redirect ke halaman auth
        if (!is_login()) redirect('auth?alert=belum_login');
        $this->load->model('m_data');
        // $this->load->model('selector_akademik');
    }

    public function index()
    {
        $data["title"] = "About - Sistem Informasi Pendaftaran Calon Anggota UKM Teater Oksigen";
        $this->load->view('templates/header_sidebar', $data);
        $this->load->view('partial/about');
        $this->load->view('templates/footer');
    }
}
