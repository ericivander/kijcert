<?php

class Request extends CI_Model
{
	public function submitRequest($data)
	{
		$this->db->insert('request', $data);
	}
	
	public function getRequest()
	{
		$this->db->from('request');
		$data = $this->db->get();
		return $data->result();
	}
	
	public function getRequestByUsername($username)
	{
		$this->db->from('request');
		$this->db->where('username = "'.$username.'"');
		$data = $this->db->get();
		return $data->result();
	}
	
	public function acceptRequest($id_request)
	{
		$status = true;
		$this->db->update('request', array('status' => $status), array('id_request' => $id_request));
	}
}

/* End of file request.php */