<?php

use PhpParser\Node\Expr\Isset_;

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        // cek session login
        // jika ketahuan gak login akan redirect ke halaman auth

        $this->load->model('M_data');
        // load security
        $this->load->helper('security');
    }


    public function index()
    {
        $data['title']  = "Login - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";
        // jika ada data session tapi maksa masuk halaman auth maka lempar aja ke halaman yang ada hak aksesnya
        if ($this->session->userdata('level') == "WTO_ADMIN") {
            is_login('dashboard');
        } elseif ($this->session->userdata('level') == "WTO_VIEW") {
            is_login('dashboard');
        } elseif ($this->session->userdata('level') == "CALON_ANGGOTA") {
            is_login('form_pendaftaran');
        }


        is_login('dashboard');

        $this->load->view('Auth/header', $data);
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
                    'foto_profil' => $data->pengguna_foto,

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
                    'foto_profil' => $data->foto_diri,

                );
                $this->session->set_userdata($data_session);
                // alihkan ke dashboard pengguna

                // echo "berhasil Login";
                redirect(base_url() . 'form_pendaftaran');

                // redirect(base_url() . 'auth?alert=gagal');
            } else {

                redirect(base_url() . 'auth?alert=gagal');
            }
        } else {
            redirect(base_url() . 'auth?alert=gagal');
            // $this->load->view('Auth/header');
            // $this->load->view('Auth/index');
            // $this->load->view('Auth/footer');
        }
    }
    public function registration()
    {
        // fungsi recaptcha google
        // $captcha['head_captcha'] = $this->recaptcha->getWidget();
        // $captcha['form_captcha'] = $this->recaptcha->getScriptTag();

        // var_dump($captcha['head_captcha']);
        // var_dump($captcha['form_captcha']);

        // jika ada data session tapi maksa masuk halaman auth maka lempar aja ke halaman yang ada hak aksesnya
        if ($this->session->userdata('level') == "WTO_ADMIN") {
            is_login('dashboard');
        } elseif ($this->session->userdata('level') == "WTO_VIEW") {
            is_login('dashboard');
        } elseif ($this->session->userdata('level') == "CALON_ANGGOTA") {
            is_login('form_pendaftaran');
        }

        $data['title']  = "Register - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";
        $this->load->view('Auth/header', $data);
        $this->load->view('Auth/register');
        $this->load->view('Auth/footer');
    }


    public function register_aksi()
    {
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required|is_unique[data_ca.pengguna_email]');
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required|is_unique[data_ca.pengguna_username]|min_length[6]');
        $this->form_validation->set_rules('password', 'Password Pengguna', 'required|min_length[8]',);
        $this->form_validation->set_rules('ulang_password', 'Konfirmasi Password', 'required|matches[password]',);
        // validasi recaptcha
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        // validasi recaptcha


        if (
            $this->form_validation->run() != false  &&
            isset($response['success']) &&
            $response['success']
        ) {

            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $data = array(
                'pengguna_nama' => $nama,
                'pengguna_email' => $email,
                'pengguna_username' => $username,
                'pengguna_password' => $password,
                'pengguna_level' => 'CALON_ANGGOTA',
                'foto_diri' => 'null_foto.jpg',
                'pengguna_status' => '1'
            );
            // var_dump($recaptcha);
            // var_dump($response);
            // var_dump($data);
            $data = $this->security->xss_clean($data);

            $this->M_data->insert_data($data, 'data_ca');

            redirect(base_url() . 'auth?alert=registersuccess');
        } else {


            // $this->load->view('Auth/header');
            // $this->load->view('Auth/register');
            // $this->load->view('Auth/footer');
            redirect('Auth/registration');
            // $this->load->view('auth/registration');
        }
    }


    public function logout()
    {

        $this->session->sess_destroy();
        redirect(base_url('Auth'));
    }
}
