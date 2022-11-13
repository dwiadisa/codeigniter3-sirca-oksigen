<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->view('templates/header_sidebar');
        $this->load->view('partial/Setting/setting');
        $this->load->view('templates/footer');
    }
    public function simpan_setting()
    {
    }
}

/* End of file Settings.php and path \application\controllers\Settings.php */
