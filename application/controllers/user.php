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
	
	function request()
	{
		$this->load->model('country');
		$data['country'] = $this->country->getCountryList();
		$this->load->view('user/menu');
		$this->load->view('user/request', $data);
	}
	
	function generateSN()
	{
		//generateSN
	}
	
	function submitRequest()
	{
		$common_name = $this->input->post('common_name');
		$organization_name = $this->input->post('organization_name');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$postal_code = $this->input->post('postal_code');
		$id_country = $this->input->post('id_country');
		$username = $this->input->post('username');
		$status = false;
		
		//$serial_number = $this->generateSN();
		$serial_number = 'FF';
		
		$data = array(
			'serial_number' => $serial_number,
			'common_name' => $common_name,
			'organization_name' => $organization_name,
			'address' => $address,
			'city' => $city,
			'postal_code' => $postal_code,
			'status' => $status,
			'username' => $username,
			'id_country' => $id_country,
		);
		
		$this->load->model('request');
		$this->request->submitRequest($data);
		
		$this->index();
		//echo "Certificate for " . $common_name . ", requested by " . $username;
	}
	
	function download()
	{
		$this->load->model('request');
		$data['request'] = $this->request->getRequestByUsername($this->session->userdata('username'));
		$this->load->view('user/menu');
		$this->load->view('user/download', $data);
	}
	
	function downloadCertificate($id_request)
	{
		//download .cert
	}
}

/* End of file user.php */