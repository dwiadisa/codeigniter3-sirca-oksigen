<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_user extends CI_Controller
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

        $data['title']  = "Data User - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";
        $this->load->model('m_data');
        $data['pengguna'] = $this->m_data->get_data('pengguna')->result();
        // var_dump($data);
        $this->load->view('templates/header_sidebar', $data);
        $this->load->view('partial/data_user/index', $data);
        $this->load->view('templates/footer');
        // $this->load->view('welcome_message');
    }

    public function tambah_user()
    {
        $data['title']  = "Tambah User - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";
        $this->load->view('templates/header_sidebar', $data);
        $this->load->view('partial/data_user/tambah_user');
        $this->load->view('templates/footer');
    }
    public function tambah_user_aksi()

    {
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required|is_unique[pengguna.pengguna_email]');
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required|is_unique[pengguna.pengguna_username]');
        $this->form_validation->set_rules('password', 'Password Pengguna', 'required|min_length[8]');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');
        if ($this->form_validation->run() != false) {

            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $level = $this->input->post('level');
            $status = $this->input->post('status');
            $data = array(
                'pengguna_nama' => $nama,
                'pengguna_email' => $email,
                'pengguna_username' => $username,
                'pengguna_password' => $password,
                'pengguna_level' => $level,
                'pengguna_status' => $status,
                'pengguna_foto' => "null_foto.jpg",
            );
            $this->m_data->insert_data($data, 'pengguna');

            redirect(base_url() . 'data_user');
        } else {
            $this->load->view('templates/header_sidebar');
            $this->load->view('partial/data_user/tambah_user');
            $this->load->view('templates/footer');
        }
    }
    public function data_user_edit($id)
    {
        $data['title']  = "Edit User - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";
        $where = array(
            'id_pengguna' => $id
        );
        $data['pengguna'] = $this->m_data->edit_data($where, 'pengguna')->result();
        $this->load->view('templates/header_sidebar', $data);
        $this->load->view('partial/data_user/edit_user', $data);
        $this->load->view('templates/footer');
    }

    public function data_user_update()
    {

        // Wajib isi
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');
        if ($this->form_validation->run() != false) {
            // echo "data aman lanjutkan";
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $level = $this->input->post('level');
            $status = $this->input->post('status');
            //cek jika form password tidak diisi, maka jangan update kolum password, dan sebaliknya


            // fungsi upload foto user

            $file_name = $_FILES['foto_diri']['name'];
            $config['upload_path'] = './upload/foto_admin';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['overwrite']            = true;
            $config['max_size']             = 2048; // 1MB
            // $config['max_width']            = 1080;
            // $config['max_height']           = 1080;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_diri')) {

                $foto_diri = $this->input->post('hid_foto_diri');
                // var_dump($foto_diri);
                // $error = array('error' => $this->upload->display_errors());
                // echo  "<script>
                //     alert('Foto terlalu besar (lebih 2 mb)/format file bukan jpg atau png. untuk foto bisa ditambahkan nanti ');
                //     history.back();
                //     </script>";
                // var_dump($error);
                // die;
            } else {

                $foto_diri = ($this->upload->data('file_name'));
                // commingsoon unlink

                // die;
                // $foto_diri = $this->upload->data();
            }





            if ($this->input->post('password') == "") {
                $data = array(
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email,
                    'pengguna_username' => $username,
                    'pengguna_level' => $level,
                    'pengguna_status' => $status,
                    'pengguna_foto' => $foto_diri,
                );
            } else {
                $data = array(
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email,
                    'pengguna_username' => $username,
                    'pengguna_password' => $password,
                    'pengguna_level' => $level,
                    'pengguna_status' => $status,
                    'pengguna_foto' => $foto_diri,
                );
            }
            $where = array(
                'id_pengguna' => $id
            );
            $this->m_data->update_data($where, $data, 'pengguna');
            redirect(base_url() . 'data_user');
            // var_dump($data);
        } else {
            $id = $this->input->post('id');
            $where = array(
                'id_pengguna' => $id
            );
            $data['pengguna'] = $this->m_data->edit_data($where, 'pengguna')->result();
            $this->load->view('templates/header_sidebar');
            $this->load->view('partial/data_user/edit_user', $data);
            $this->load->view('templates/footer');
        }
    }







    public function data_user_hapus($id)
    {

        $where = array(
            'id_pengguna' => $id
        );
        $this->m_data->delete_data($where, 'pengguna');
        redirect(base_url() . 'data_user');
    }
}
