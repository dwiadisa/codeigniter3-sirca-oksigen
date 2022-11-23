<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Access_block_model');
        $this->Access_block_model->admin();
    }

    public function index()
    {

        $data['setting'] = $this->db->query("SELECT * FROM `setting` WHERE `nama_setting`='form_aktif'  LIMIT 1")->result();
        $data['title'] = "Setting Aplikasi - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";
        $this->load->view('templates/header_sidebar', $data);
        $this->load->view('partial/Setting/setting', $data);
        $this->load->view('templates/footer');
    }
    public function simpan_setting()
    {
        $simpan =  $this->input->post('setting');

        // query update setting

        $this->db->query("UPDATE `setting` SET `value` = '$simpan' WHERE `setting`.`id_setting` = 0;");
        redirect('Settings');

        // query update setting

        // var_dump($cek);
        // echo $cek;
    }
}

/* End of file Settings.php and path \application\controllers\Settings.php */
