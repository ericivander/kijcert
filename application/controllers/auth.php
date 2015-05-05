<?php
	
class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if($this->session->userdata('login') == TRUE)
		{
			if($this->session->userdata('privilage') == 'admin') redirect('admin');
			else if($this->session->userdata('privilage') == 'user') redirect('user');
		}
		else
		{
			$this->load->view('home');
		}
	}
	
	function adminLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
			
		$this->load->model('akun');
			
		$auth = $this->akun->loginAdmin($username, $password);
			
		if($auth)
		{
			$data = array('username' => $username, 'login' => TRUE, 'privilage' => 'admin');
			$this->session->set_userdata($data);
		}
		redirect('admin');
	}
	
	function userLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
			
		$this->load->model('akun');
			
		$auth = $this->akun->loginUser($username, $password);
			
		if($auth)
		{
			$data = array('username' => $username, 'login' => TRUE, 'privilage' => 'user');
			$this->session->set_userdata($data);
		}
		redirect('user');
	}
	
	function doLogout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}

/* End of file auth.php */