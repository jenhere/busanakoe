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
	public function index(){
        $data['products'] = $this->Mymodel->getAll('produk');
        $this->load->view('Header_umum');
        $this->load->view('Slider');
        $this->load->view('V_section',$data);
        $this->load->view('Footer');
	}
    
    ///TAMPILAN HOME UMUM KATEGORI///
    public function keVhomekat_umum($ktgr){
        $data['products'] = $this->Mymodel->getProd($ktgr);
        $this->load->view('Header_umum');
        $this->load->view('Slider');
        $this->load->view('V_section', $data);
        $this->load->view('Footer');
    }


    ///TAMPILAN HOME CART///
    public function keCart(){
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            redirect(site_url()."/Sign/");
        }else{
            $this->load->view('Cart');
        }
    }
    public function keRincianOrder($no_invoice){
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            redirect(site_url()."/Sign/");
        }

        $data['tagihan'] = $this->Mymodel->getInvoice($no_invoice);
        $this->load->view('RincianOrder', $data );
    }

    public function keKonfirmasi(){
        $this->load->view('KonfirmasiPembayaran');
    }

    public function do_konfirmasi(){

        $no_invoice = $_POST['no_invoice'];
        $email = $this->session->userdata('email');
        $nama = $_POST['nama']; 
        $bank = $_POST['bank'];
        $rekening = $_POST['rekening'];

         $data_insert = array(
            'no_invoice' => $no_invoice,
            'email' => $email,
            'nama' => $nama,
            'bank' => $bank,
            'rekening' => $rekening
            );
        $res = $this->Mymodel->masukkan('konfirmasi', $data_insert);
        if($res>=1){
            redirect(site_url()."/Tampil/keRincianOrder/".$no_invoice);
            exit();
        }else{
            echo "<h2>Order gagal</h2>";
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

    /////////PESAN//////////
    public function do_order(){
        $all = $this->Mymodel->getAll('invoice');
        $total_row = $this->Mymodel->getNumRow('invoice');

        $no_invoice = $total_row + 1;
         $nama = $_POST['nama'];
         $email = $this->session->userdata('email');
         $no_telp = $_POST['no_telp'];
         $alamat = $_POST['alamat'];
         $metode = $_POST['metode'];
         $total = $_POST['total'];
         $status = 'unpaid';

         $data_insert = array(
            'no_invoice' => $no_invoice,
            'email' => $email,
            'nama' => $nama,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'metode' => $metode,
            'total' => $total,
            'status' => $status
            );
        $res = $this->Mymodel->masukkan('invoice', $data_insert);
        if($res>=1){
            redirect(site_url()."/Tampil/keRincianOrder/".$no_invoice);
            exit();
        }else{
            echo "<h2>Order gagal</h2>";
        }
    }

    public function do_confirm($no_invoice){
        $res = $this->Mymodel->ubah_status($no_invoice);
        if($res>=1){
            redirect(site_url()."/Tampil/kePemesanan/");
            exit();
        }else{
            echo "<h2>confirm gagal</h2>";
        }
    }

    ///TAMPILAN HOME ADMIN/// 
    public function keVhomeAdm(){
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            redirect(site_url()."/Sign/");
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
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            redirect(site_url()."/Sign/");
        }
      
        $data['products'] = $this->Mymodel->getProd($ktgr);
        $this->load->view('Header_admin');
        $this->load->view('Slider');
        $this->load->view('V_section_admin', $data);
        $this->load->view('Footer');
    }

    ///TAMPILAN FORM INPUT PRODUK///  
    public function keInputProduct(){ 
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            redirect(site_url()."/Sign/");
        }
        $this->load->view('Header_admin');
        $this->load->view('V_section_admin_menu');
        $this->load->view('V_section_admin_inputPro');
        $this->load->view('Footer');
    }

    ///MEMASUKKAN PRODUK///  
    public function do_addproduct(){

        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            redirect(site_url()."/Sign/");
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
            redirect(site_url()."/Tampil/keInputProduct");
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
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            redirect(site_url()."/Sign/");
        }

        $data['orders'] = $this->Mymodel->getAll('invoice');

        $this->load->view('Header_admin');
        $this->load->view('V_section_admin_menu');
        $this->load->view('V_section_admin_pemesanan', $data);
        $this->load->view('Footer');
    }
     public function keDataProduct(){
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            redirect(site_url()."/Sign/");
        }
        $data['products'] = $this->Mymodel->getAll('produk');

        $this->load->view('Header_admin');
        $this->load->view('V_section_admin_menu');
        $this->load->view('V_section_admin_dataPro', $data);
        $this->load->view('Footer');
    }

    public function keDataPelanggan(){
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            redirect(site_url()."/Sign/");
        }else{       
        $data['products'] = $this->Mymodel->getAll('pengguna');
        $this->load->view('Header_admin');
        $this->load->view('V_section_admin_menu');
        $this->load->view('V_section_admin_dataPel', $data);
        $this->load->view('Footer');
        }
    }
    /*public function do_delpel($email){
        $where = array('email' => $email);
        $this->Mymodel->hapus($email, 'pelanggan');
        echo "string";
        redirect(site_url('tampil/keDataPelanggan'));

    }*/

    public function keFormUpdate($kode){
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            redirect(site_url()."/Sign/");
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
            redirect(site_url()."/Tampil/keDataProduct");
            exit();
        }else{
            echo "<h2>Update produk gagal</h2>";
        }
    }

    //TAMPILAN PELANGGAN
    public function keVhomePel(){
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error', 'Maaf, anda belum login');
            redirect(site_url()."/Sign/");
        }else{
            $data['products'] = $this->Mymodel->getAll('produk');
            $this->load->view('Header_umum');
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
