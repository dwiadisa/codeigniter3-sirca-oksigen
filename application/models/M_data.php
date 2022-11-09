<?php
class M_data extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    // fungsi ini digunakan untuk mengecek data user yang bernilai sama 
    function cek_data($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    // fungsi untuk mengupdate atau mengubah data di database
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // fungsi ambil data
    function get_data($table)
    {
        return $this->db->get($table);
    }
    // fungsi insert data
    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    // fungsi update data 
    function delete_data($where, $table)
    {
        $this->db->delete($table, $where);
    }
    // fungsi untuk mengedit data
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    // AKHIR FUNGSI CRUD

    function relasi_prodi()
    {
        return $this->db->query("SELECT * FROM data_prodi, data_fakultas 
        WHERE id_fakultas=fakultas
        order by fakultas DESC")->result();
    }

    function update_prodi()
    {
    }
    function data_akun_ca()
    {
        return $this->db->query("SELECT * FROM pengguna
        WHERE pengguna_level LIKE 'CALON_ANGGOTA'")->result();
    }

    // baca data diri ca
    function data_diri_ca($table, $where)
    {
        //    melakukan pengecekan id apakah udah terdaftar atau belum
        return $this->db->get_where($table, $where);
    }

    // model digunakan untuk mengisi data di tabel data ca ketika pengguna ID kosong

    // function cek_id_ca_formulir($id)
    // {
    //     if (!isset($id['data_ca']['id_pengguna']))
    //         $data['data_ca']['id_pengguna'] = NULL;
    //     return $this->db->insert('data_ca', $data);
    // }
}

//  saring antara akun ca dan admin
