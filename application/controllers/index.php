<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if(!$this->session->userdata('admin'))
		// {
		// 	redirect('login/index','refresh');
		// }
		$this->load->model('Mprovinsi');
		
	}


	public function index()
	{
		
		$data['provinsi'] =$this->Mprovinsi->tampil_provinsi();

		$this->load->view('header');
		$this->load->view('index', $data);
		$this->load->view('footer');

	}

	public function tambah()
	{
		$input = $this->input->post();
		if($input)
		{
			$this->Mprovinsi->simpan_provinsi($input);
			redirect('index');
		}		
		
		$this->load->view('header');
		$this->load->view('tambahprovinsi');
		$this->load->view('footer');

	}

	public function ubah($id)
	{

		$data["provinsi"] = $this->Mprovinsi->detail_provinsi($id);
		$input = $this->input->post();
		if($input)
		{
			$this->Mprovinsi->update_provinsi($input,$id);
			redirect('index');
		}
		$this->load->view('header');
		$this->load->view('editprovinsi',$data);
		$this->load->view('footer');
	}

	public function hapus($id)
	{
		$this->Mprovinsi->hapus_provinsi($id);
		redirect('index','refresh');
	}

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
