<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends CI_Controller {
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
 			'level' => "admin"
 		);

		$res = $this->mymodel->masukkan('pengguna', $data_insert);

		if($res>=1){
			header("Location: http://localhost/busanakoe/index.php/tampil/login");
			exit();
		}else{
			echo "<h2>Create User Gagal</h2>";
		}
	}

	public function do_signin(){
		$email = $_POST['email'];
		$sandi = $_POST['sandi'];
		$ensandi = sha1(md5($sandi));

		$data = $this->mymodel->getPengguna($email);
		$data = get_object_vars($data);
		$level = $data['level'];

		$cek = $this->mymodel->login($email, $ensandi);
		$tes = count($cek);

		if($tes>0 && $level == 'user'){
			redirect('tampil/keVhomePel/'.$data->nama);
		}elseif ($tes>0 && $level == 'admin') {
			redirect('tampil/keVhomeAdm');
		}else{
			redirect('tampil/login');
		}
	}
}