<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Ekspor_tahun_model extends CI_Model
{
    public function ekspor_tahunan()
    {

        $query =  $this->db->query('SELECT DISTINCT `tahun_submit` FROM data_ca')->result();
        return $query;
    }
}


/* End of file Ekspor_tahun_model.php and path \application\models\Ekspor_tahun_model.php */
