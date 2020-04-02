<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gaji_model', 'gaji');
        $this->load->model('Jabatan_model', 'jabatan');
        $this->load->model('Karyawan_model', 'karyawan');
        
    }
    public function index()
    {
        $data['title'] = 'Data gaji';
		$data['judul'] = 'Penggajian';
        $data['page'] = 'gaji/index';
        if ($this->input->post('cari')) {
			$data['karyawan'] = $this->gaji->cariKaryawan();
		}
        $data['jabatan'] = $this->jabatan->get();
		view('templates/content', $data);
    }
    public function generate($nip)
    {
        $this->rules();
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data gaji';
            $data['judul'] = 'Penggajian';
            $data['page'] = 'gaji/tambah';
            $data['kode'] = $this->gaji->kode();
            $data['karyawan'] = $this->gaji->getKaryawan($nip);
		    view('templates/content', $data);
        } else {
            $data = [
                'kode_penggajian' => $this->input->post('kode_penggajian'),
                'nip' => $this->input->post('nip'),
                'nama_karyawan' => $this->input->post('nama_karyawan'),
                'tanggal_penerimaan' => date('Y-m-d'),
                'nominal' => $this->input->post('nominal')
            ];
            $this->gaji->insert($data);
            $this->session->set_flashdata('pesan', 'Generate sukses!');
					redirect('gaji');
        }
        
    }

    public function laporan()
    {
        $data['title'] = 'Data gaji';
        $data['judul'] = 'Penggajian';
        $data['page'] = 'gaji/laporan';
        if ($this->input->post('cari')) {
			$data['gaji'] = $this->gaji->searchTanggal();
		} else {
            $data['gaji'] = $this->gaji->get();
        }
        view('templates/content', $data);
    }

    public function cetak()
    {
        $data['gaji'] = $this->gaji->searchTanggal();
        $data['title'] = 'Data gaji';
        $data['judul'] = 'Penggajian';
        $this->load->view('templates/header', $data);
        $this->load->view('gaji/cetak', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $where = [
            'id' => $id            
        ];
        $this->gaji->delete($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Data berhasil dihapus!
							</div>');
		redirect('gaji');
    }
    public function rules()
    {
        $this->form_validation->set_rules('kode_penggajian', 'kode penggajian', 'required');
        $this->form_validation->set_rules('nip', 'nip', 'required|numeric');
        $this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
    }

}

/* End of file gaji.php */
