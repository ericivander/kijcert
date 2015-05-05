<?php
	
class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			redirect('home');
		}
		else if($this->session->userdata('privilage') == 'admin')
		{
			redirect('admin');
		}
	}

	function index()
	{
		$this->load->view('user/menu');
	}
}

/* End of file user.php */