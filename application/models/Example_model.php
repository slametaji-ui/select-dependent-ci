<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Example_model extends CI_Model
{
	function get_unsur()
	{
		$query = $this->db->query("SELECT * FROM tbl_unsur")->result();
		return $query;
	}

	function get_subunsur()
	{
		$query = $this->db->query("SELECT a.*,b.nama as unsur FROM tbl_sub_unsur as a JOIN tbl_unsur as b ON id_unsur = b.id")->result();
		return $query;
	}

	function get_sub_unsur($unsur_id)
	{
		$query = $this->db->get_where('tbl_sub_unsur', array('id_unsur' => $unsur_id));
		return $query;
	}

	function get_ket_butir()
	{
		$query = $this->db->query("SELECT a.*,b.nama as sub_unsur,c.nama as unsur FROM tbl_butir_kegiatan as a JOIN tbl_sub_unsur as b ON id_sub = b.id JOIN tbl_unsur as c ON a.id_unsur = c.id")->result();
		return $query;
	}

	function get_butir_kegiatan($sub_id)
	{
		$query = $this->db->get_where('tbl_butir_kegiatan', array('id_sub' => $sub_id));
		return $query;
	}

}


/* End of file Example_model.php and path \application\models\Example_model.php */
