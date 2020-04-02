<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model', 'karyawan');
        $this->load->model('Jabatan_model', 'jabatan');
    }
    public function index()
    {
        $this->load->model('Aturan_model', 'aturan');
        $data['title'] = 'Data Karyawan';
		$data['judul'] = 'Data Karyawan';
        $data['page'] = 'karyawan/index';
        $data['karyawan'] = $this->karyawan->get();
		view('templates/content', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules('nip', 'Nip', 'required|is_unique[karyawan.nip]');
        $this->rules();
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Karyawan';
            $data['judul'] = 'Tambah Data';
            $data['page'] = 'karyawan/tambah';
            $data['jabatan'] = $this->jabatan->get();
		    view('templates/content', $data);
        } else {
            $data = [
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'telp' => $this->input->post('telp'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'kode_jabatan' => $this->input->post('kode_jabatan'),
                'masa_kerja' => $this->input->post('masa_kerja'),
            ];
            $this->karyawan->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data berhasil ditambahkan!
							</div>');
					redirect('karyawan');
        }
        
    }

    public function edit($id)
    {
        $this->rules();
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Karyawan';
            $data['judul'] = 'Ubah Data';
            $data['page'] = 'karyawan/ubah';
            $data['karyawan'] = $this->karyawan->single(['nip' => $id]);
            $data['jenis_kelamin'] = ['laki-laki' , 'perempuan'];
            $data['jabatan'] = $this->jabatan->get();
		    view('templates/content', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'telp' => $this->input->post('telp'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'kode_jabatan' => $this->input->post('kode_jabatan'),
                'masa_kerja' => $this->input->post('masa_kerja'),
            ];
            $where = [
                'nip' => $this->input->post('nip')
            ];
            $this->karyawan->update($where, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data berhasil diubah!
							</div>');
			redirect('karyawan');
        }
        
    }
    public function hapus($id)
    {
        $where = [
            'nip' => $id            
        ];
        $this->karyawan->delete($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Data berhasil dihapus!
							</div>');
		redirect('karyawan');
    }
    public function rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required|numeric');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('kode_jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('masa_kerja', 'masa kerja', 'required');
    }

}

/* End of file Karyawan.php */
