<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {
    function login($email,$sandi){ //login
        $this->db->where('email',$email);
        $this->db->where('sandi',$sandi);
        return $this->db->get('pengguna')->row();
    }

    public function masukkan($namatbl, $data){ //bikin akun
        $res = $this->db->insert($namatbl, $data);
        return $res;
    }
    public function ubah($namatbl, $data, $where){
        $res = $this->db->update($namatbl, $data, $where);
        return $res;
    }
    public function getProd($kategori){
    	$data = $this->db->query('select * from produk where kategori="'.$kategori.'"');
		return $data->result();
    }
    public function getProd_kode($kode=""){
        $prod = $this->db->query('select * from produk '.$kode);
        return $prod->result_array();
    }
    public function getAll($tabel){

    	$hasil = $this->db->get($tabel);

    	if($hasil->num_rows() > 0){
    		return $hasil->result();
    	} else{
    		return array();
    	}
    }
    public function hapusProduk($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
        }

    public function getPengguna($where){
        $this->db->where('email', $where);
        return $this->db->get('pengguna')->row();
    }
}