<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model {

    public function get()
    {
        $query = $this->db->get('jabatan');
        if (count($query->result()) > 0) {
            return $query->result();
        }
        
    }

    public function tambah_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function hapus_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function kode(){
        $this->db->select('RIGHT(jabatan.kode_jabatan,2) as kode', FALSE);
        $this->db->order_by('kode_jabatan','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('jabatan');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
             //cek kode jika telah tersedia    
             $data = $query->row();      
             $kode = intval($data->kode) + 1; 
        }
        else{      
             $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
        $kodetampil = "J".$batas;  //format kode
        return $kodetampil;  
  }

}

/* End of file jabatan_model.php */
