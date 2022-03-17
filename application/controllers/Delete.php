<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delete extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function ket_butir_kegiatan($id)
	{
		if ($id == "") {
			$this->session->set_flashdata('error', "Data gagal dihapus.");
			redirect('/');
		} else {
			$this->db->where('id', $id);
			$this->db->delete('tbl_butir_kegiatan');
			$this->session->set_flashdata('sukses', "Data berhasil dihapus.");
			redirect('/');
		}
	}
}

/* End of file Delete.php and path \application\controllers\Delete.php */
