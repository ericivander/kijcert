<?php

class Cert extends CI_Model
{
	public function submitCert($id_request, $filecert)
	{
		$data = array(
			'id_request' => $id_request,
			'cert' => $filecert
		);
		$this->db->insert('cert', $data);
	}
	
	public function getCert($id_request)
	{
		$this->db->select('cert');
		$this->db->from('cert');
		$this->db->where('id_request = "'.$id_request.'"');
		$data = $this->db->get();
		return $data->result();
	}
}

/* End of file cert.php */