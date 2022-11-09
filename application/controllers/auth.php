<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        // cek session login
        // jika ketahuan gak login akan redirect ke halaman auth

        $this->load->model('M_data');
    }


    public function index()
    {


        is_login('dashboard');
        // $data = ['title'];
        $this->load->view('Auth/header');
        $this->load->view('Auth/index');
        $this->load->view('Auth/footer');
    }

    public function login_aksi()
    {
        // validasi form yag diinput user saat login
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {
            //  menangkap data username dan password dari halaman login
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $where = array(
                'pengguna_username' => $username,
                'pengguna_password' => md5($password),
                'pengguna_status' => 1
            );
            $this->load->model('m_data');
            // cek kesesuaian yang berada di tabel database
            $cek_admin = $this->m_data->cek_login('pengguna', $where)->num_rows();
            $cek_ca = $this->m_data->cek_login('data_ca', $where)->num_rows();
            // cek jika benar ada
            if ($cek_admin > 0) {
                // ambil data pengguna yang melakukan login
                $data =  $this->m_data->cek_login('pengguna', $where)->row();

                // buat session yang berhasil login

                $data_session = array(
                    'id' => $data->id_pengguna,
                    'username' => $data->pengguna_username,
                    'nama' => $data->pengguna_nama,
                    'level' => $data->pengguna_level,
                    'email' => $data->pengguna_email,
                    'status' => 'telah_login',

                );
                $this->session->set_userdata($data_session);
                // alihkan ke dashboard pengguna

                // echo "berhasil Login";
                redirect(base_url() . 'dashboard');
                // jika di tabel pengguna admin tidak tersedia di tabel tersebut maka dialihkan dan diautentifikasi ke data CA
            } elseif ($cek_ca > 0) {
                // ambil data pengguna yang melakukan login
                $data =  $this->m_data->cek_login('data_ca', $where)->row();

                // buat session yang berhasil login

                $data_session = array(
                    'id' => $data->id_ca,
                    'username' => $data->pengguna_username,
                    'nama' => $data->pengguna_nama,
                    'level' => $data->pengguna_level,
                    'email' => $data->pengguna_email,
                    'status' => 'telah_login',

                );
                $this->session->set_userdata($data_session);
                // alihkan ke dashboard pengguna

                // echo "berhasil Login";
                redirect(base_url() . 'dashboard');

                // redirect(base_url() . 'auth?alert=gagal');
            } else {

                redirect(base_url() . 'auth?alert=gagal');
            }
        } else {
            $this->load->view('Auth/header');
            $this->load->view('Auth/index');
            $this->load->view('Auth/footer');
        }
    }
    public function registration()
    {
        $this->load->view('Auth/header');
        $this->load->view('Auth/register');
        $this->load->view('Auth/footer');
    }


    public function register_aksi(){

        
    }


    public function logout()
    {

        $this->session->sess_destroy();
        redirect(base_url('Auth'));
    }
}
