<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_fakultas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // cek session login
        // jika ketahuan gak login akan redirect ke halaman auth
        if (!is_login()) redirect('auth?alert=belum_login');
        $this->load->model('m_data');
        // load access block model untuk membatasi user

        $this->load->model('Access_block_model');
        $this->Access_block_model->admin();


        // load access block model untuk membatasi user
    }

    public function index()
    {
        $data['fakultas'] = $this->m_data->get_data('data_fakultas')->result();
        $this->load->view('templates/header_sidebar');
        $this->load->view('partial/data_fakultas/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_fakultas()
    {
        $this->load->view('templates/header_sidebar');
        $this->load->view('partial/data_fakultas/tambah_fakultas');
        $this->load->view('templates/footer');
    }

    public function tambah_fakultas_aksi()
    {
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');
        if ($this->form_validation->run() != false) {
            $nama_fakultas = $this->input->post('nama_fakultas');
            $data = array(
                'nama_fakultas' => $nama_fakultas

            );
            $this->m_data->insert_data($data, 'data_fakultas');
            redirect(base_url() . 'data_fakultas');
        } else {
            redirect(base_url() . 'data_fakultas/tambah_fakultas');
        }
    }

    public function hapus_fakultas($id)
    {


        $where = array(
            'id_fakultas' => $id
        );
        $this->m_data->delete_data($where, 'data_fakultas');
        redirect(base_url() . 'data_fakultas');
    }
    public function edit_fakultas($id)
    {

        $where = array(
            'id_fakultas' => $id
        );
        $data["fakultas"] = $this->m_data->edit_data($where, 'data_fakultas')->result();
        $this->load->view('templates/header_sidebar');
        $this->load->view('partial/data_fakultas/edit_fakultas', $data);
        $this->load->view('templates/footer');
    }

    public function update_fakultas()
    {
        $this->form_validation->set_rules('nama_fakultas', 'Fakultas', 'required');
        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id_fakultas');
            $nama_fakultas = $this->input->post('nama_fakultas');

            $where = array(
                'id_fakultas' => $id
            );

            $data = array(

                'nama_fakultas' => $nama_fakultas,

            );
            $this->m_data->update_data($where, $data, 'data_fakultas');
            redirect(base_url() . 'data_fakultas');
        } else {
            $id = $this->input->post('id_fakultas');
            $where = array(
                'id_fakultas' => $id
            );
            $data['fakultas'] = $this->m_data->edit_data($where, 'data_fakultas')->result();
            $this->load->view('templates/header_sidebar');
            $this->load->view('partial/data_fakultas/edit_fakultas', $data);
            $this->load->view('templates/footer');
        }
    }
}
