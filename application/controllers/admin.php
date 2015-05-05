<?php

include(APPPATH.'/third_party/phpseclib/Crypt/RSA.php');
include(APPPATH.'/third_party/phpseclib/File/X509.php');

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
	
	function generateCA($id_request)
	{
		// create private key for CA cert
		$CAPrivKey = new Crypt_RSA();
		extract($CAPrivKey->createKey());
		$CAPrivKey->loadKey($privatekey);

		$pubKey = new Crypt_RSA();
		$pubKey->loadKey($publickey);
		$pubKey->setPublicKey();
		
		// create a self-signed cert that'll serve as the CA
		$subject = new File_X509();
		$subject->setDNProp('id-at-organizationName', 'KIJ_E9 Surabaya KIJ_E9');
		$subject->setPublicKey($pubKey);

		$issuer = new File_X509();
		$issuer->setPrivateKey($CAPrivKey);
		$issuer->setDN($CASubject = $subject->getDN());

		$x509 = new File_X509();
		$x509->makeCA();

		$result = $x509->sign($issuer, $subject);

		$this->load->model('csr');
		$datacsr = $this->csr->getCSR($id_request);
		
		foreach($datacsr as $temp)
			$csr = $temp->csr;
		
		$subject = new File_X509();
		$subject->loadCSR($csr);
		
		$issuer = new File_X509();
		$issuer->setPrivateKey($CAPrivKey);
		$issuer->setDN($CASubject);

		$x509 = new File_X509();
		$result = $x509->sign($issuer, $subject);
		$fileca = $x509->saveX509($result);
		
		$this->load->model('cert');
		$this->cert->submitCert($id_request, $fileca);
	}
	
	function acceptRequest($id_request)
	{
		$this->generateCA($id_request);
		$this->load->model('request');
		$this->request->acceptRequest($id_request);
		$this->request();
	}
}

/* End of file admin.php */
