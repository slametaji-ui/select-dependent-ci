<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Create extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Example_model', 'example');
	}

	public function ket_butir_kegiatan()
	{
		$this->form_validation->set_rules('subunsur', 'Sub Unsur', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'id_sub' => $this->input->post('subunsur'),
				'id_unsur' => $this->input->post('unsur'),
				'nama' => $this->input->post('butir_kegiatan'),
			);

			$this->db->insert('tbl_butir_kegiatan', $data);
			$this->session->set_flashdata('sukses', "Keterangan Butir Kegiatan berhasil ditambahkan.");
			redirect('/');
		} else {
			$this->session->set_flashdata('error', "Keterangan Butir Kegiatan gagal ditambahkan.");
			redirect('/');
		}
	}
}

/* End of file Create.php and path \application\controllers\Create.php */
