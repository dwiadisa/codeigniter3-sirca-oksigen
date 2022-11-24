<?php

use SebastianBergmann\Type\FalseType;

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

    public function backup_database()
    {
        $this->load->dbutil();
        // load dbase utility ci3

        $db_name = 'backup-db-.' . $this->db->database . '-on' . date("Y-m-d-H-i-s") . '.zip';


        $prefs = array(
            'format' => 'zip',
            'filename' => $db_name,
            'add_insert' => TRUE,
            'foreign_key_checks' => FALSE,

        );

        // siapkan backup untuk proses download file
        $backup =  $this->dbutil->backup($prefs);
        // set lokasi buat download file
        $save = 'pathtobkfolder/' . $db_name;

        // buat filenya
        $this->load->helper('file');
        write_file($save, $backup);

        // download filenya
        $this->load->helper('download');
        force_download($db_name, $backup);



        // echo "ini fitur backup database";
    }
    public function hapus_seluruh_data_ca()
    {
        // query untuk menghapus semua data calon anggota

        $this->db->query("DELETE FROM data_ca WHERE pengguna_level='CALON_ANGGOTA'");
        // kotak konfirmasi javascript untuk pemberitahuan bahawa data calon anggota telah dihapus.
        echo "
        
        <script>
        
        alert('Data Calon Anggota telah terhapus sepenuhnya.')
        history.back()
        
        </script>
        ";
    }
}

/* End of file Settings.php and path \application\controllers\Settings.php */
