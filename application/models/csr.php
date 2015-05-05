<?php

class CSR extends CI_Model
{
	public function submitCSR($id_request, $filecsr)
	{
		$data = array(
			'id_request' => $id_request,
			'csr' => $filecsr
		);
		$this->db->insert('csr', $data);
	}
	
	public function getCSR($id_request)
	{
		$this->db->select('csr');
		$this->db->from('csr');
		$this->db->where('id_request = "'.$id_request.'"');
		$data = $this->db->get();
		return $data->result();
	}
}

/* End of file csr.php */