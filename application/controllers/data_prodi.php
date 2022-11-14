<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_prodi extends CI_Controller
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
        $this->Access_block_model->admin();


        // load access block model untuk membatasi user
    }

    public function index()
    {
        $data['prodi'] = $this->m_data->relasi_prodi();
        $this->load->view('templates/header_sidebar');
        $this->load->view('partial/data_prodi/index', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_prodi()
    {
        $data['fakultas'] = $this->m_data->get_data('data_fakultas')->result();
        $this->load->view('templates/header_sidebar');
        $this->load->view('partial/data_prodi/tambah_prodi', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_prodi_aksi()
    {
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
        $this->form_validation->set_rules('fakultas', 'Nama Fakultas', 'required');
        if ($this->form_validation->run() != false) {
            $nama_prodi = $this->input->post('nama_prodi');
            $fakultas = $this->input->post('fakultas');
            $data = array(

                'nama_prodi' => $nama_prodi,
                'fakultas' => $fakultas
            );

            $this->m_data->insert_data($data, 'data_prodi');
            redirect(base_url() . 'data_prodi');
        } else {
            $data['fakultas'] = $this->m_data->get_data('data_fakultas')->result();
            $this->load->view('templates/header_sidebar');
            $this->load->view('partial/data_prodi/tambah_prodi', $data);
            $this->load->view('templates/footer');
        }
    }


    public function edit_prodi($id)
    {

        $where = array(
            'id_prodi' => $id
        );
        $data['prodi'] = $this->m_data->edit_data($where, 'data_prodi')->result();
        $data['fakultas'] = $this->m_data->get_data('data_fakultas')->result();
        $this->load->view('templates/header_sidebar');
        $this->load->view('partial/data_prodi/edit_prodi', $data);
        $this->load->view('templates/footer');
    }

    public function update_prodi()
    {

        $this->form_validation->set_rules('nama_prodi', 'Fakultas', 'required');
        $this->form_validation->set_rules('nama_fakultas', 'Fakultas', 'required');
        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id_prodi');
            $nama_prodi = $this->input->post('nama_prodi');
            $nama_fakultas = $this->input->post('nama_fakultas');

            $where = array(
                'id_prodi' => $id
            );

            $data = array(

                'fakultas' => $nama_fakultas,
                'nama_prodi' =>  $nama_prodi,

            );
            $this->m_data->update_data($where, $data, 'data_prodi');
            redirect(base_url() . 'data_prodi');
        } else {
            $id = $this->input->post('id_prodi');
            $where = array(
                'id_prodi' => $id,
            );
            $data['prodi'] = $this->m_data->edit_data($where, 'data_prodi')->result();
            $data['fakultas'] = $this->m_data->get_data('data_fakultas')->result();
            $this->load->view('templates/header_sidebar');
            $this->load->view('partial/data_prodi/edit_prodi', $data);
            $this->load->view('templates/footer');
        }
    }


    public function hapus_prodi($id)
    {
        $where = array(
            'id_prodi' => $id
        );
        $this->m_data->delete_data($where, 'data_prodi');
        redirect(base_url() . 'data_prodi');
    }
}
