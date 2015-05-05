<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
	}

    public function index() {
    	//kalo mau bikin warning pake tulisan, ntar di viewnya tinggal parsing $pesan
    	$data['pesan'] = "";
        $this->load->view('login',$data);

        //kalo gapake warning tulisan
        //$this->load->view('login');
    }

    public function error() {
    	//kalo mau bikin warning pake tulisan
    	$data['pesan'] = "Username dan/atau password salah";
        $this->load->view('login',$data);
    }

    public function submit()
    {
        $this->load->model('akun');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->akun->login($username,$password))
        {
			redirect('home','refresh'); //redirect ke controller admin, sesuaikan aja nama controllernya
		}
		else
        {
			//kalo mau bikin warning pake tulisan, ntar di viewnya tinggal parsing $pesan
			redirect('login/error');

			//kalo gapake warning tulisan
			//redirect('login','refresh');
		}
    }

}

