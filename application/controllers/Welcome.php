<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Example_model', 'example');
	}

	public function index()
	{
		$data['title'] = "Example";
		$data['subunsur'] = $this->example->get_subunsur();
		$data['unsur'] = $this->example->get_unsur();
		$data['ket_butir'] = $this->example->get_ket_butir();
		$this->load->view('data_list', $data);
	}

	function get_sub_unsur()
	{
		$subunsur_id = $this->input->post('id', TRUE);
		$data = $this->example->get_sub_unsur($subunsur_id)->result();
		echo json_encode($data);
	}

	function get_butir_kegiatan()
	{
		$butir_kegiatan_id = $this->input->post('id', TRUE);
		$data = $this->example->get_butir_kegiatan($butir_kegiatan_id)->result();
		echo json_encode($data);
	}
}
