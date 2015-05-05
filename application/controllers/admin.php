<?php

include('File/X509.php');
include('Crypt/RSA.php');

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
		$CAPrivKey = new Crypt_RSA();
		$CAPubKey = new Crypt_RSA();
		$CAPrivKey->loadKey(" -----BEGIN RSA PRIVATE KEY-----
							MIICXgIBAAKBgQCwnFODWif8yabRl3mLxb3SXBhN+RvT1cw5ZSCCqtb6ARHdLWqz
							ugkAHJ+kZ83ql1dWwHxMeFeZ7EsmJEpeV1aA8UfKoVZ/ueCsL3SJjton/DQVBHpm
							CLs6niOjBJuQnopba1QjCIJd8M8jfK7VRHoHapZb1fDUjw61ObK/FH3PPwIDAQAB
							AoGBAKRMScTgkmKwlehVqlVFWBniYxnmrOSc+KhMU7o7hFJ/vEaugZ1BbC4Wcs1X
							ZFDhCfdCil/5dEVVdXO+PxEU3vr4R6Wi5JM5AVihJi594RI9oceHhO31+iMLN3Aw
							oTrORLQ372Ie9cnbJcPbY/Lt15JA4YeF0OtWWB+IbQmPDApBAkEA6IGixw75Rn6G
							2FkGj0xrLiaEyYRC3tYmOIrx/Dq/Ia+3Cs5fL5hpxKLHYXsAN2b6MLl0X6/I7iSE
							kFAofnDfwwJBAMJ0zlrB1uDwdznA6s/sQ2ChAghSDdInWeiXq2ObQL6YMBkGYLng
							NXhkzCmL+6x0f/jqNGOTTk+CIgN1QbeVttUCQQDHnZTtJfPqC/Mlh7lUCh3y72sN
							wBnRSzZhURlUnfM+rqeOBYQ/TrFv+vkGvh1/c0/VyUMaa8csffm6FLfPZoUVAkB5
							/L7LTpjXaeLRd0WXBFdMUhUtVRRYhtkvQZ6CEQ4vwtdBi6+4S4Afs9QkKC3NBRSW
							+Y29/dX9qNxfoPqGCcS1AkEArT/TiXrGGdS8GKk96QN245c1D/Qwl7qdL808fpVW
							VMLEGx4RP8YqHvBslMb4hQglxUkb33r0MlphHloPF9d7Ew==
							-----END RSA PRIVATE KEY-----
						");
		$CAPubKey->loadKey(" -----BEGIN PUBLIC KEY-----
							MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCwnFODWif8yabRl3mLxb3SXBhN
							+RvT1cw5ZSCCqtb6ARHdLWqzugkAHJ+kZ83ql1dWwHxMeFeZ7EsmJEpeV1aA8UfK
							oVZ/ueCsL3SJjton/DQVBHpmCLs6niOjBJuQnopba1QjCIJd8M8jfK7VRHoHapZb
							1fDUjw61ObK/FH3PPwIDAQAB
							-----END PUBLIC KEY-----
						");
		
		$this->load->model('csr');
		$csr = $this->csr->getCSR($id_request);

		$issuer = new File_X509();
		$issuer = new File_X509();
		$issuer->setPrivateKey($CAPrivKey);
		$ca=$issuer->loadX509("-----BEGIN CERTIFICATE-----
								MIICFTCCAYCgAwIBAgIBADALBgkqhkiG9w0BAQUwMzEPMA0GA1UECgwGS0lKIEU5
								MQ8wDQYDVQQDDAZLSUogRTkxDzANBgNVBAsMBktJSiBFOTAeFw0xNTA0MDUxMzQz
								NTlaFw0xNjA1MDUxMzQzNTlaMDMxDzANBgNVBAoMBktJSiBFOTEPMA0GA1UEAwwG
								S0lKIEU5MQ8wDQYDVQQLDAZLSUogRTkwgZ0wCwYJKoZIhvcNAQEBA4GNADCBiQKB
								gQCwnFODWif8yabRl3mLxb3SXBhN+RvT1cw5ZSCCqtb6ARHdLWqzugkAHJ+kZ83q
								l1dWwHxMeFeZ7EsmJEpeV1aA8UfKoVZ/ueCsL3SJjton/DQVBHpmCLs6niOjBJuQ
								nopba1QjCIJd8M8jfK7VRHoHapZb1fDUjw61ObK/FH3PPwIDAQABoz8wPTALBgNV
								HQ8EBAMCAQYwDwYDVR0TAQH/BAUwAwEB/zAdBgNVHQ4EFgQUlHfGEf7HuBToIE3N
								sHwy+aEYn2AwCwYJKoZIhvcNAQEFA4GBAKvQT7v4ggGqTyFedR+2L+RLfbbAYQUu
								PBHnPycC7sWGi4octRCCrf63jMm2egh3xB8lg79aZuqZcrPI5zOtv105jwnaTTY5
								QfvIJ6jnUPkqd5kWmOqH13y6P+lu3YC0Vr2kOewhZZkrMQbugluO+3YCCeVckGdH
								ACDST6grmiy8
								-----END CERTIFICATE-----
							");
		$subject = new File_X509();
		$subject->setPublicKey($CAPubKey);
		$subject->loadCSR($csr);
		$x509 = new File_X509();
		$x509->setStartDate('-1 month');
		$x509->setEndDate('+1 year');

		$result = $x509->sign($issuer, $subject);
		$fileca = $x509->saveX509($result);
			//echo $fileca;
			// $filecsr = $x509->saveCSR($csr);
		$myfile = fopen("ca".'.txt',"w") or die("Unable to open file!");
		fwrite($myfile, $fileca);
		fclose($myfile);


		$file = "ca".'.txt';

		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}
	
		
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
