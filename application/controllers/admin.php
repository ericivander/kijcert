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
	
	function request()
	{
		$this->load->model('request');
		$data['request'] = $this->request->getRequest();
		$this->load->view('admin/menu');
		$this->load->view('admin/request', $data);
	}
	
	function generateCSR()
	{
		$this->load->model('request');
		$request = $this->request->getRequest();
	}
	
	function generateCA()
	{
		
	}
	
	function acceptRequest($id_request)
	{
		$this->generateCSR();
		$this->generateCA();
		$this->load->model('request');
		$this->request->acceptRequest($id_request);
		$this->request();
	}
}

/* End of file admin.php */