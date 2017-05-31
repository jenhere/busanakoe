<?php 
//session_start(); //we need to start session in order to access it through CI
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends CI_Controller {
	public function construct(){
		parent::__construct(); 
		$this->load->library('cart');
		// Load form helper library 
		$this->load->helper('form'); 
		// Load form validation library 
		$this->load->library('form_validation'); 
		// Load session library 
		$this->load->library('session'); 
		// Load database 
		$this->load->model('login_database');
	}

	public function index(){
		$this->load->view('Vlogin');
	}

	public function do_signup(){

		$nama= $_POST['nama'];
		$no_hp = $_POST['no_hp'];
		$email = $_POST['email'];
		$sandi = $_POST['sandi'];
		$ensandi = sha1(md5($sandi));
		$data_insert = array(
			'nama' => $nama,
			'no_hp' => $no_hp,
			'email' => $email,
			'sandi' => $ensandi,//sandi sudah di enkrip
 			'level' => "user"
			);
		$res = $this->Mymodel->masukkan('pengguna', $data_insert);
		if($res>=1){
			//$data['message_display'] = 'Registrasi Sukses !';
			redirect('Sign');
			exit();
		}else{
			//$data['message_display'] = 'Registrasi Gagal !';
			redirect('Sign');
		}
	}

	public function do_signin(){
		$email = $_POST['email'];
		$sandi = $_POST['sandi'];
		$ensandi = sha1(md5($sandi));

		$res = $this->Mymodel->getPengguna($email);
		$res = get_object_vars($res);
		$cek = $this->Mymodel->login($email, $ensandi);
		$tes = count($cek);

		if($tes>0){
			$data = array(
				'nama' => $res['nama'],
				'no_hp' => $res['no_hp'],
				'email' => $res['email'],
				'sandi' => $res['sandi'],
				'level' => $res['level']
			);
			$level = $data['level'];

			$this->session->set_userdata($data);

			if($level == 'user'){
				redirect('Tampil/keVhomePel/');
			}elseif ($level == 'admin') {
				redirect('Tampil/keVhomeAdm');
			}
		}else{
			$this->session->set_flashdata('error', 'maaf, username atau password ada yang salah!');
			redirect('Sign');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('Vlogin');
	}
}