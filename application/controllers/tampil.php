<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampil extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('');
        $this->load->helper('url');
        $this->load->helper('email');
        $this->load->library('cart');
    }

    ///TAMPILAN HOME UMUM///
	public function index()
	{
<<<<<<< HEAD
   
        $data['products'] = $this->Mymodel->getAll('produk');
        $this->load->view('Header_umum');
        $this->load->view('Slider');
        $this->load->view('V_section',$data);
        $this->load->view('Footer');
=======

        $data['products'] = $this->mymodel->getAll('produk');
        

        $this->load->view('header_umum');
        $this->load->view('slider');
        $this->load->view('v_section', $data);
        $this->load->view('footer');
>>>>>>> 2e2bfc26d90ecd6eef268156e11a49fdc42a1dbb
	}
    
    ///TAMPILAN HOME UMUM KATEGORI///
    public function keVhomekat_umum($ktgr){
        $data['products'] = $this->Mymodel->getProd($ktgr);
        $this->load->view('Header_umum');
        $this->load->view('Slider');
        $this->load->view('V_section', $data);
        $this->load->view('Footer');
    }

    ///TAMPILAN HOME PELANGGANKATEGORI///
    public function keVhomekat_pel($ktgr){
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            header("Location: http://localhost/tampil/index.php/login");
        }else{
        $data['products'] = $this->Mymodel->getProd($ktgr);
        $this->load->view('Header_pelanggan');
        $this->load->view('Slider');
        $this->load->view('V_section', $data);
        $this->load->view('Footer');
        }
    }

    ///TAMPILAN HOME CART///
    public function keCart(){
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            header("Location: http://localhost/busanakoe/index.php/Sign/");
        }else{
            $this->load->view('Cart');
        }
    }

    ///MENAMBAHKAN KE CART///
    public function add_to_cart($kode_produk){
        $product = $this->Mymodel->find($kode_produk);
        $data = array(
                       'id'      => $product->kode_produk,
                       'name'    => $product->nama_produk,
                       'qty'     => 1,
                       'price'   => $product->harga_produk
                    );
        $this->cart->insert($data);
        redirect(base_url());
    } 

    ///MENGHILANGKAN  CART///
    public function clear_cart(){
        $this->cart->destroy();
        redirect(site_url()."/Tampil/keCart");
    }

    ///MENGHAPUS CART///
    public function clear_cart_id($id){
        $this->cart->remove($id);
        redirect(site_url()."/Tampil/keCart");
    }

    ///TAMPILAN HOME ADMIN/// 
    public function keVhomeAdm(){
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            header("Location: http://localhost/sign/index.php/login");
        }else{
        $data['products'] = $this->Mymodel->getAll('produk');
        $this->load->view('Header_admin');
        $this->load->view('Slider');
        $this->load->view('V_section_admin', $data);
        $this->load->view('Footer');
        }
    }

     ///TAMPILAN HOME ADMIN KATEGORI///    
    public function keVhomekat_admin($ktgr){
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            header("Location: http://localhost/tampil/index.php/login");
        }
      
        $data['products'] = $this->Mymodel->getProd($ktgr);
        $this->load->view('Header_admin');
        $this->load->view('Slider');
        $this->load->view('V_section_admin', $data);
        $this->load->view('Footer');
    }

    ///TAMPILAN FORM INPUT PRODUK///  
    public function keInputProduct(){ 
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            header("Location: http://localhost/Tampil/index.php/login");
        }
        $this->load->view('Header_admin');
        $this->load->view('V_section_admin_menu');
        $this->load->view('V_section_admin_inputPro');
        $this->load->view('Footer');
    }

    ///MEMASUKKAN PRODUK///  
    public function do_addproduct(){

        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            header("Location: http://localhost/Tampil/index.php/login");
        }
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

        $res = $this->Mymodel->masukkan('produk', $data_insert);

        if($res>=1 && move_uploaded_file($_FILES['uploadimage']['tmp_name'] , $target)){
            header("Location: http://localhost/busanakoe/index.php/Tampil/keInputProduct");
            exit();
        }else{
            echo "<h2>Tambah produk gagal</h2>";
        }
    }

    ///MEMASUKKAN PRODUK///
    public function do_delproduct($kode_produk){
        $where = array('kode_produk' => $kode_produk);
        $this->Mymodel->hapus($where, 'produk');
        echo "string";
        redirect(site_url('Tampil/keDataProduct')); //ganti

    }

    public function kePemesanan(){
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            header("Location: http://localhost/Tampil/index.php/login");
        }
        $this->load->view('Header_admin');
        $this->load->view('V_section_admin_menu');
        $this->load->view('V_section_admin_pemesanan');
        $this->load->view('Footer');
    }
     public function keDataProduct(){
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            header("Location: http://localhost/Tampil/index.php/login");
        }
        $data['products'] = $this->Mymodel->getAll('produk');

        $this->load->view('Header_admin');
        $this->load->view('V_section_admin_menu');
        $this->load->view('V_section_admin_dataPro', $data);
        $this->load->view('Footer');
    }

    public function keDataPelanggan(){
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            header("Location: http://localhost/tampil/index.php/login");
        }else{

        $this->load->library('pagination');
        $where = array('level' => 'user' );
        $data['products'] = $this->Mymodel->getWhere('pengguna', $where);
        $data2 = $this->db->get('pengguna');
        $config['base_url'] = 'http://localhost/index.php/Tampil/index/';
        $config['total_rows'] = $data2->num_rows();
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();


        $this->load->view('header_admin');
        $this->load->view('v_section_admin_menu');
        $this->load->view('v_section_admin_dataPel', $data);
        $this->load->view('footer');
        }
    }
    public function do_delpel($email){

        $where = array('email' => $email);
        $this->mymodel->hapus($where, 'pelanggan');
        echo "string";
        redirect(site_url('tampil/keDataPelanggan'));

    }

    public function keFormUpdate($kode){
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            header("Location: http://localhost/tampil/index.php/login");
        }
        $prod = $this->Mymodel->getProd_kode("where kode_produk = '$kode'");
        $data = array(
            "kode_produk" => $prod['0']['kode_produk'], 
            "nama_produk" => $prod['0']['nama_produk'],
            "kategori" => $prod['0']['kategori'],
            "harga_produk" => $prod['0']['harga_produk'],
            "gambar" => $prod['0']['gambar'],
            "deskripsi" => $prod['0']['deskripsi'],
            "stok" => $prod['0']['stok']
        );
        $this->load->view('Header_admin');
        $this->load->view('V_section_admin_menu');
        $this->load->view('V_section_admin_updateForm', $data);
        $this->load->view('Footer');
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
        $res = $this->Mymodel->ubah('produk', $data_update, $where);

        if($res>=1 && move_uploaded_file($_FILES['uploadimage']['tmp_name'] , $target)){
            header("Location: http://localhost/busanakoe/index.php/Tampil/keDataProduct");
            exit();
        }else{
            echo "<h2>Update produk gagal</h2>";
        }
    }

    //TAMPILAN PELANGGAN
    public function keVhomePel(){
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            header("Location: http://localhost/tampil/index.php/login");
        }else{
            $data['products'] = $this->Mymodel->getAll('produk');
            $this->load->view('Header_pelanggan');
            $this->load->view('Slider');
            $this->load->view('V_section', $data);
            $this->load->view('Footer');
        }
    }
    public function keContactUs(){
        $this->load->view('ContactForm');
        $this->load->view('Footer');
        }
    
    
}
