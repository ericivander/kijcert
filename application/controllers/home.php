<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{	
	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('menu');
	}
	
	public function user_signup()
	{
		$this->load->view('user_signup');
	}
	
	public function user_login()
	{
		$this->load->view('user_login');
	}
	
	public function admin_login()
	{
		$this->load->view('admin_login');
	}

	public function error()
	{
		$this->load->view('not-found-404');
	}
}
?>