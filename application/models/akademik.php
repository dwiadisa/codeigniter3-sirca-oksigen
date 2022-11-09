<?php
class akademik extends CI_Model
{
    function get_fakultas()
    {

        $hasil = $this->db->query("SELECT * FROM data_fakultas");
        return $hasil;
    }


    function get_prodi($id)
    {

        $hasil = $this->db->query("SELECT * FROM data_prodi WHERE fakultas='$id'");
        return $hasil->result();
    }
}
