<?php
class Email extends CI_Controller {
	function __construct(){
	        parent::__construct();
	    }
	function index(){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'nisrina12154@gmail.com',
			'smtp_pass' => '081217489448risaok',
			);
		$this->load->library('email', $config);
		$this->email->to('nisrina12154@gmail.com');
		$this->email->from('nisrina12154@gmail.com','Admin');
		$this->email->subject('Email Test');
		$this->email->message('Isi email ditulis disini');
		$this->email->set_newline("\r\n");
;


	}

}