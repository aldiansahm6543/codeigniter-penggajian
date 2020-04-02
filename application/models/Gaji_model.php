<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_model extends CI_Model {

    public function get()
    {
        $this->db->join('karyawan', 'gaji.nip = karyawan.nip');
        $this->db->join('jabatan', 'karyawan.kode_jabatan = jabatan.kode_jabatan');
        $query = $this->db->get('gaji');
        if (count($query->result()) > 0) {
            return $query->result();
        }   
    }
    public function insert($data) {
        $this->db->insert('gaji', $data);
    }

    public function delete($where) {
        $this->db->where($where);
        $this->db->delete('gaji');
    }

    public function getKaryawan($nip)
    {
        $this->db->join('jabatan', 'karyawan.kode_jabatan = jabatan.kode_jabatan');
        $this->db->join('aturan_gaji', 'jabatan.kode_jabatan = aturan_gaji.kode_jabatan');
        $this->db->where('karyawan.nip', $nip);
        $query = $this->db->get('karyawan');
        if (count($query->result()) > 0) {
            return $query->row();
        }   
    }
    public function kode(){
        $this->db->select('RIGHT(gaji.kode_penggajian,2) as kode', FALSE);
        $this->db->order_by('kode_penggajian','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('gaji');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
             //cek kode jika telah tersedia    
             $data = $query->row();      
             $kode = intval($data->kode) + 1; 
        }
        else{      
             $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
        $kodetampil = "P".$batas;  //format kode
        return $kodetampil;  
  }

    public function cariKaryawan()
    {
        $keyword = $this->input->post('cari', true);
        $this->db->join('jabatan', 'karyawan.kode_jabatan = jabatan.kode_jabatan');
        $this->db->like('karyawan.kode_jabatan', $keyword );
        $query = $this->db->get('karyawan');
        return $query->result();
    }

    public function searchTanggal()
    {
        $keyword = $this->input->post('cari', true);
        $this->db->join('karyawan', 'gaji.nip = karyawan.nip');
        $this->db->join('jabatan', 'karyawan.kode_jabatan = jabatan.kode_jabatan');
        $this->db->like('gaji.tanggal_penerimaan', $keyword );
        $query = $this->db->get('gaji');
        return $query->result();
    }

}

/* End of file gaji_model.php */
