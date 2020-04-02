<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan_gaji extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aturan_model', 'aturan');
        $this->load->model('Jabatan_model', 'jabatan');
    }
    public function index()
    {
        $data['title'] = 'Data aturan gaji';
		$data['judul'] = 'Data aturan gaji';
        $data['page'] = 'aturan/index';
        $data['aturan'] = $this->aturan->get();
		view('templates/content', $data);
    }
    public function tambah()
    {
        $this->rules();
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data aturan gaji';
            $data['judul'] = 'Tambah Data';
            $data['page'] = 'aturan/tambah';
            $data['jabatan'] = $this->jabatan->get();
		    view('templates/content', $data);
        } else {
            $data = [
                'kode_jabatan' => $this->input->post('kode_jabatan'),
                'masa_kerja_jabatan' => $this->input->post('masa_kerja'),
                'insentif' => $this->input->post('insentif'),
                'bonus' => $this->input->post('bonus')
            ];
            $this->aturan->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data berhasil ditambahkan!
							</div>');
					redirect('aturan_gaji');
        }
        
    }

    public function edit($id)
    {
        $this->rules();
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data aturan gaji';
            $data['judul'] = 'Ubah Data';
            $data['page'] = 'aturan/ubah';
            $data['aturan'] = $this->aturan->single(['id' => $id]);
            $data['jabatan'] = $this->jabatan->get();
		    view('templates/content', $data);
        } else {
            $data = [
                'kode_jabatan' => $this->input->post('kode_jabatan'),
                'masa_kerja_jabatan' => $this->input->post('masa_kerja'),
                'insentif' => $this->input->post('insentif'),
                'bonus' => $this->input->post('bonus')
            ];
            $where = [
                'id' => $this->input->post('id')
            ];
            $this->aturan->update($where, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data berhasil diubah!
							</div>');
			redirect('aturan_gaji');
        }
        
    }
    public function hapus($id)
    {
        $where = [
            'id' => $id            
        ];
        $this->aturan->delete($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Data berhasil dihapus!
							</div>');
		redirect('aturan_gaji');
    }
    public function rules()
    {
        $this->form_validation->set_rules('insentif', 'insentif', 'required|numeric');
        $this->form_validation->set_rules('bonus', 'bonus', 'required|numeric');
        $this->form_validation->set_rules('kode_jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('masa_kerja', 'masa kerja', 'required|numeric');
    }

}

/* End of file Aturan_gaji.php */
