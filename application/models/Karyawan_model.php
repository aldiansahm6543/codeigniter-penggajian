<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model {

    public function get()
    {
        $this->db->join('jabatan', 'karyawan.kode_jabatan = jabatan.kode_jabatan');
        $query = $this->db->get('karyawan');
        if (count($query->result()) > 0) {
            return $query->result();
        }   
    }
    public function insert($data) {
        $this->db->insert('karyawan', $data);
    }

    public function delete($where) {
        $this->db->where($where);
        $this->db->delete('karyawan');
    }

    public function single($where) {
        $this->db->join('jabatan', 'karyawan.kode_jabatan = jabatan.kode_jabatan');
        return $this->db->get_where('karyawan', $where)->row();
    }

    public function update($where, $data) {
        $this->db->where($where);
        $this->db->update('karyawan', $data);
    }

}

/* End of file Karyawan_model.php */
