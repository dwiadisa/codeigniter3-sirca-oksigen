<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses_terblokir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function blokir_404()
    {

        $this->load->view('halaman_error/404');
    }
    public function blokir_403()
    {
        $this->load->view('halaman_error/403');
    }
}

/* End of file Akses_terblokir.php and path \application\controllers\Akses_terblokir.php */
