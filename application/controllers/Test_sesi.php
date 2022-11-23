<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_sesi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->view('test_login');
    }
}

/* End of file Test_sesi.php and path \application\controllers\Test_sesi.php */
