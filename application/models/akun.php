<?php

class Akun extends CI_Model
{
	//admin
	public function userLogin($username, $password)
	{
		//select * from akun where username = $username and password = $password
		$result = $this->db->get_where('user_account',
			array
			(
				'username' => $username,
				'password' => $password
			)
		);
		
		if ($result->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function adminLogin($username, $password)
	{
		//select * from akun where username = $username and password = $password
		$result = $this->db->get_where('admin_account',
			array
			(
				'username' => $username,
				'password' => $password
			)
		);
		
		if ($result->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
}

/* End of file akun.php */