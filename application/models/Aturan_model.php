<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan_model extends CI_Model {

    public function get()
    {
        $this->db->join('jabatan', 'aturan_gaji.kode_jabatan = jabatan.kode_jabatan');
        $query = $this->db->get('aturan_gaji');
        if (count($query->result()) > 0) {
            return $query->result();
        }   
    }
    public function insert($data) {
        $this->db->insert('aturan_gaji', $data);
    }

    public function delete($where) {
        $this->db->where($where);
        $this->db->delete('aturan_gaji');
    }

    public function single($where) {
        $this->db->join('jabatan', 'aturan_gaji.kode_jabatan = jabatan.kode_jabatan');
        return $this->db->get_where('aturan_gaji', $where)->row();
    }

    public function update($where, $data) {
        $this->db->where($where);
        $this->db->update('aturan_gaji', $data);
    }

}

/* End of file aturan_model.php */
