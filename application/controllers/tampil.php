<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampil extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('');
        $this->load->helper('url');
    }

	public function index()
	{
        /////PAGINATION/////////
        $this->load->library('pagination');
        $data['products'] = $this->mymodel->getAll('produk');
        $data2 = $this->db->get('produk');
        /////////PAGINATION////////////
        $config['base_url'] = 'http://localhost/index.php/tampil/index/';
        $config['total_rows'] = $data2->num_rows();
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
        //////END OF PAGINATION/////////////

        $this->load->view('header_umum');
        $this->load->view('slider');
        $this->load->view('v_section', $data);
        $this->load->view('footer');
	}
    public function keVhomekat_umum($ktgr){
        /////PAGINATION/////////
        $this->load->library('pagination');
        $data['products'] = $this->mymodel->getProd($ktgr);
        //$this->db->where('kategori','pria');
        $data2 = $this->db->get_where('produk', array('kategori' => $ktgr));
        /////////PAGINATION////////////
        $config['base_url'] = 'http://localhost/index.php/tampil/index/';
        $config['total_rows'] = $data2->num_rows();
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
        //////END OF PAGINATION/////////////

        $this->load->view('header_umum');
        $this->load->view('slider');
        $this->load->view('v_section', $data);
        $this->load->view('footer');
    }
    public function keVhomekat_admin($ktgr){
        /////PAGINATION/////////
        $this->load->library('pagination');
        $data['products'] = $this->mymodel->getProd($ktgr);
        //$this->db->where('kategori','pria');
        $data2 = $this->db->get_where('produk', array('kategori' => $ktgr));
        /////////PAGINATION////////////
        $config['base_url'] = 'http://localhost/index.php/tampil/index/';
        $config['total_rows'] = $data2->num_rows();
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
        //////END OF PAGINATION/////////////

        $this->load->view('header_admin');
        $this->load->view('slider');
        $this->load->view('v_section_admin', $data);
        $this->load->view('footer');
    }
    public function keVhomekat_pel($ktgr){
        /////PAGINATION/////////
        $this->load->library('pagination');
        $data['products'] = $this->mymodel->getProd($ktgr);
        //$this->db->where('kategori','pria');
        $data2 = $this->db->get_where('produk', array('kategori' => $ktgr));
        /////////PAGINATION////////////
        $config['base_url'] = 'http://localhost/index.php/tampil/index/';
        $config['total_rows'] = $data2->num_rows();
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
        //////END OF PAGINATION/////////////

        $this->load->view('header_pelanggan');
        $this->load->view('slider');
        $this->load->view('v_section', $data);
        $this->load->view('footer');
    }
	public function login(){
        $this->load->view('vlogin');
    }
    public function keCart(){
        $this->load->view('cart');
    }

    //ADMIN
    public function keVhomeAdm(){

         /////PAGINATION/////////
        $this->load->library('pagination');
        $data['products'] = $this->mymodel->getAll('produk');
        //$data['products']['gambar'] = 
        $data2 = $this->db->get('produk');
        /////////PAGINATION////////////
        $config['base_url'] = 'http://localhost/index.php/tampil/index/';
        $config['total_rows'] = $data2->num_rows();
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
        //////END OF PAGINATION/////////////

        $this->load->view('header_admin');
        $this->load->view('slider');
        $this->load->view('v_section_admin', $data);
        $this->load->view('footer');
    }
    public function keInputProduct(){ 
        $this->load->view('header_admin');
        $this->load->view('v_section_admin_menu');
        $this->load->view('v_section_admin_inputPro');
        $this->load->view('footer');
    }

    public function do_addproduct(){//insert produk 
        $target = "upload/".basename($_FILES['uploadimage']['name']);

        $kode_produk= $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $kategori = $_POST['kategori'];
        $harga_produk = $_POST['harga_produk'];
        $gambar = $_FILES['uploadimage']['name'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];
        $data_insert = array(
            'kode_produk' => $kode_produk,
            'nama_produk' => $nama_produk,
            'kategori' => $kategori,
            'harga_produk' => $harga_produk,
            'gambar' => $gambar,
            'deskripsi' => $deskripsi,
            'stok' => $stok
        );

        $res = $this->mymodel->masukkan('produk', $data_insert);

        if($res>=1 && move_uploaded_file($_FILES['uploadimage']['tmp_name'] , $target)){
            header("Location: http://localhost/busanakoe/index.php/tampil/keInputProduct");
            exit();
        }else{
            echo "<h2>Tambah produk gagal</h2>";
        }
    }

    public function do_delproduct($kode_produk){
        $where = array('kode_produk' => $kode_produk);
        $this->mymodel->hapusProduk($where, 'produk');
        echo "string";
        redirect(site_url('tampil/keDataProduct')); //ganti

    }

    public function kePemesanan(){
        $this->load->view('header_admin');
        $this->load->view('v_section_admin_menu');
        $this->load->view('v_section_admin_pemesanan');
        $this->load->view('footer');
    }
     public function keDataProduct(){

        /////PAGINATION/////////
        $this->load->library('pagination');
        $data['products'] = $this->mymodel->getAll('produk');
        $data2 = $this->db->get('produk');
        $config['base_url'] = 'http://localhost/index.php/tampil/index/';
        $config['total_rows'] = $data2->num_rows();
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
        //////END OF PAGINATION/////////////

        $this->load->view('header_admin');
        //$this->load->view('slider');
        $this->load->view('v_section_admin_menu');
        $this->load->view('v_section_admin_dataPro', $data);
        $this->load->view('footer');
    }
    public function keDataPelanggan(){
        /////PAGINATION/////////
        $this->load->library('pagination');
        $where = array('level' => 'user' );
        $data['products'] = $this->mymodel->getWhere('pengguna', $where);
        //$data['products']['gambar'] = 
        $data2 = $this->db->get('pengguna');
        /////////PAGINATION////////////
        $config['base_url'] = 'http://localhost/index.php/tampil/index/';
        $config['total_rows'] = $data2->num_rows();
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
        //////END OF PAGINATION/////////////

        $this->load->view('header_admin');
        //$this->load->view('slider');
        $this->load->view('v_section_admin_menu');
        $this->load->view('v_section_admin_dataPel', $data);
        $this->load->view('footer');
    }
    public function keFormUpdate($kode){
        $prod = $this->mymodel->getProd_kode("where kode_produk = '$kode'");
        $data = array(
            "kode_produk" => $prod['0']['kode_produk'], 
            "nama_produk" => $prod['0']['nama_produk'],
            "kategori" => $prod['0']['kategori'],
            "harga_produk" => $prod['0']['harga_produk'],
            "gambar" => $prod['0']['gambar'],
            "deskripsi" => $prod['0']['deskripsi'],
            "stok" => $prod['0']['stok']
        );
        $this->load->view('header_admin');
        $this->load->view('v_section_admin_menu');
        $this->load->view('v_section_admin_updateForm', $data);
        $this->load->view('footer');
    }

    public function do_updateproduct(){
        $target = "upload/".basename($_FILES['uploadimage']['name']);

        $kode_produk= $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $kategori = $_POST['kategori'];
        $harga_produk = $_POST['harga_produk'];
        $gambar = $_FILES['uploadimage']['name'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];
        $data_update = array(
            'nama_produk' => $nama_produk,
            'kategori' => $kategori,
            'harga_produk' => $harga_produk,
            'gambar' => $gambar,
            'deskripsi' => $deskripsi,
            'stok' => $stok
        );
        $where = array('kode_produk' => $kode_produk );
        $res = $this->mymodel->ubah('produk', $data_update, $where);

        if($res>=1 && move_uploaded_file($_FILES['uploadimage']['tmp_name'] , $target)){
            header("Location: http://localhost/busanakoe/index.php/tampil/keDataProduct");
            exit();
        }else{
            echo "<h2>Update produk gagal</h2>";
        }
    }

    //TAMPILAN PELANGGAN
    public function keVhomePel(){
         /////PAGINATION/////////
        $this->load->library('pagination');
        $data['products'] = $this->mymodel->getAll('produk');
        //$data['products']['gambar'] = 
        $data2 = $this->db->get('produk');
        /////////PAGINATION////////////
        $config['base_url'] = 'http://localhost/index.php/tampil/index/';
        $config['total_rows'] = $data2->num_rows();
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
        //////END OF PAGINATION/////////////

        $this->load->view('header_pelanggan');
        $this->load->view('slider');
        $this->load->view('v_section', $data);
        $this->load->view('footer');
    }
    
}
