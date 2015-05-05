<?php
	
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			redirect('home');
		}
		else if($this->session->userdata('privilage') == 'user')
		{
			redirect('user');
		}
	}

	function index()
	{
		$this->load->view('admin/menu');
	}
}

/* End of file admin.php */