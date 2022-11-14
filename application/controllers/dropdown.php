<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdown extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('akademik');
    }

    public function index()
    {
        $data['fakultas'] =  $this->akademik->get_fakultas();
        $this->load->view('dropdown', $data);
        // echo json_decode($data['fakultas']);
    }

    public function get_prodi()
    {
        $id = $this->input->post('id');
        $data = $this->akademik->get_prodi($id);
        echo json_encode($data);
    }

    public function cek()
    {

        $this->form_validation->set_rules('fakultas');
        $this->form_validation->set_rules('prodi');
        if ($this->form_validation->run() != false) {
            $fak = $this->input->post('fakultas');
            $pd = $this->input->post('prodi');

            echo $fak;
            echo $pd;
        }
    }
}
