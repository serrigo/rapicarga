<?php
class Email extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index() {

		$this->load->helper('form');
		$this->load->view('email_view');
	}

	public function send_mail() {
		$from_email = "rapicarga.mail@gmail.com";
		$to_email = $this->input->post('email');
		
		$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'rapicarga.mail@gmail.com',
				'smtp_pass' => 'rapicargawebmail',
				'mailtype'  => 'html',
				'charset'   => 'iso-8859-1'
				);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
	
		 
		$this->email->from($from_email, 'Rapicarga Web Mail');
		$this->email->to($to_email);
		$this->email->subject('Prueba de envio de email');
		$this->email->message('Uso de clase email en codeigniter');
		 
		//Send mail
		if($this->email->send())
			$this->session->set_flashdata("email_sent","Email sent successfully.");
		else
			$this->session->set_flashdata("email_sent","Error in sending Email.");
		$this->load->view('email_view');
	}
}
?>