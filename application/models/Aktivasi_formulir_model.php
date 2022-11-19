<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aktivasi_formulir_model extends CI_Model
{
    public function aktif()
    {


        $formulir = $this->db->query("SELECT * FROM `setting` WHERE `nama_setting`='form_aktif' and `value`= '1'");
        return $formulir;
    }

    public function edit_setting()
    {
        $this->db->query("UPDATE `setting` SET `value` = '0' WHERE `setting`.`id_setting` = 0;
        ");
    }
}


/* End of file Aktivasi_formulir_model.php and path \application\models\Aktivasi_formulir_model.php */
