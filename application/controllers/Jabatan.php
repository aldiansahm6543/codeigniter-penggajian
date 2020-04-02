<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jabatan_model', 'jabatan');
        
    }
    

    public function index()
    {
        $data['title'] = 'Data jabatan';
		$data['judul'] = 'Data jabatan';
        $data['page'] = 'jabatan/index';
        $data['kode'] = $this->jabatan->kode();
		view('templates/content', $data);
    }

    public function fetch()
    {
        if ($this->input->is_ajax_request()) {
            $posts = $this->jabatan->get();
            echo json_encode($posts);
        }
    }

    public function tambah() {
        $kode_jabatan = $this->input->post('kode_jabatan');
        $jabatan = $this->input->post('jabatan');
        $standar_gaji = $this->input->post('standar_gaji');
        $keterangan = $this->input->post('keterangan');
        if ($kode_jabatan == '') {
            $result['pesan'] = "kode_jabatan harus diisi !";
        } elseif ($jabatan == '') {
            $result['pesan'] = "jabatan harus diisi !";
        } elseif ($standar_gaji == '') {
            $result['pesan'] = "standar gaji harus diisi !";
        } elseif ($keterangan == '') {
            $result['pesan'] = "keterangan harus diisi !";
        }  else {
            $result['pesan'] = "";

            $data = [
                'kode_jabatan'    => $kode_jabatan,
                'jabatan' => $jabatan,
                'standar_gaji'   => $standar_gaji,
                'keterangan'   => $keterangan,
            ];
            $jabatan = $this->jabatan->tambah_data($data, 'jabatan');
        }
        echo json_encode($result);
    }

    public function hapus() {
        $kode_jabatan = $this->input->post('kode_jabatan');
        $where = [
            'kode_jabatan' => $kode_jabatan,
        ];
        $jabatan = $this->jabatan->hapus_data($where, 'jabatan');
        echo json_encode($jabatan);
    }

    public function edit() {
        $kode_jabatan = $this->input->post('kode_jabatan');
        $where = [
            'kode_jabatan' => $kode_jabatan,
        ];
        $datajabatan = $this->jabatan->edit_data($where, 'jabatan')->result();
        echo json_encode($datajabatan);
    }

    public function update() {
        $kode_jabatan = $this->input->post('kode_jabatan_edit');
        $jabatan = $this->input->post('jabatan_edit');
        $standar_gaji = $this->input->post('standar_gaji_edit');
        $keterangan = $this->input->post('keterangan_edit');
        if ($kode_jabatan == '') {
            $result['pesan'] = "kode_jabatan harus diisi !";
        } elseif ($jabatan == '') {
            $result['pesan'] = "jabatan harus diisi !";
        } elseif ($standar_gaji == '') {
            $result['pesan'] = "standar gaji harus diisi !";
        } elseif ($keterangan == '') {
            $result['pesan'] = "keterangan harus diisi !";
        } else {
            $result['pesan'] = "";

            $where = [
                'kode_jabatan' => $kode_jabatan,
            ];

            $data = [
                'kode_jabatan'    => $kode_jabatan,
                'jabatan' => $jabatan,
                'standar_gaji'   => $standar_gaji,
                'keterangan'   => $keterangan,
            ];

            $datajabatan = $this->jabatan->update_data($where, $data, 'jabatan');
        }

        echo json_encode($result);
    }

}

/* End of file Jabatan.php */
