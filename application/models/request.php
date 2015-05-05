<?php

class Request extends CI_Model
{
	public function submitData($data)
	{
		$this->db->insert('request', $data);
		$id = $this->db->insert_id();
		return $id;
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