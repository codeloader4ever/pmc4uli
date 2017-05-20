<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
   
    
        public function __construct()
	{
		parent::__construct();
               
	}
        public function index(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
        $data['isi']='Admin/Isi';
        $this->load->view('Admin/Template_Admin',$data);
        }

        
        // ***************************** ARTIKEL *************************** //

        public function Daftar_Artikel(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Menyimpan session untuk pencarian --------------------------//
        if(isset($_POST['judul_artikel']))
	{
            $data['judul_artikel'] = $this->input->post('judul_artikel');
            $this->session->set_userdata('sess_judul_artikel', $data['judul_artikel']);
            } else {
            $data['judul_artikel'] = $this->session->userdata('sess_judul_artikel');
         }
            
	//-------------------------- Pagination --------------------------//
        $segment = 4;
        $limit = 5;
//        $idpengguna = $this->session->userdata('id_pengguna');  
        $offset = $this->uri->segment($segment);
        $idpengguna = $this->session->userdata('id_pengguna');
        $tot = $this->Admin_Model->SemuaArtikelbyJudul($data['judul_artikel'],$idpengguna);
        $data['DaftarArtikel']   = $this->Admin_Model->CariArtikel($limit, $offset,$data['judul_artikel'],$idpengguna);
        
        $pagination['base_url'] 	= base_url().'index.php/Admin/Daftar_Artikel/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
	$data['isi']='Admin/Daftar_Artikel';
        $this->load->view('Admin/Template_Admin',$data);
	}
        
        public function DaftarArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_judul_artikel');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_Artikel();
	} 

        public function TambahArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
        //-------------------------- Validasi dan Input ke Database --------------------------//
        $this->form_validation->set_rules('judul', 'Judul Artikel', 'trim|required');
        $this->form_validation->set_rules('isiartikel', 'Isi Artikel', 'trim|required');
        $this->form_validation->set_rules('datepicker', 'Tanggal', 'trim|required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        if ($this->form_validation->run() == FALSE)
        {
            $data['KategoriArtikel'] = $this->Admin_Model->SemuaKategoriArtikel();
            $data['isi']='Admin/Tambah_Artikel';
            $this->load->view('Admin/Template_Admin',$data); 
            }else{
            $idpengguna = $this->session->userdata('id_pengguna');
            $data = array(
                'id_pengguna' =>$idpengguna,
                'id_kategori_artikel' =>$this->input->post('KategoriArtikel'),
                'judul_artikel' =>$this->input->post('judul'),
                'isi_artikel' =>$this->input->post('isiartikel'),
                'tanggal_artikel' =>$this->input->post('datepicker'),
                'status_artikel' =>$this->input->post('status')
                    );
            $this->Admin_Model->TambahArtikel($data);
        //-------------------------- Kembali Ke Halaman Daftar Artikel --------------------------//
            redirect('Admin/Daftar_Artikel');
        } 
        }
        
        public function UbahArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
        //-------------------------- Validasi dan Update ke Database --------------------------//
        $this->form_validation->set_rules('judul', 'Judul Artikel', 'trim|required');
        $this->form_validation->set_rules('isiartikel', 'Isi Artikel', 'trim|required');
        $this->form_validation->set_rules('datepicker', 'Tanggal', 'trim|required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        $id = $this->uri->segment(3);
        if ($this->form_validation->run() == FALSE)
        {   
            $data['KategoriArtikel'] = $this->Admin_Model->SemuaKategoriArtikel();
            $data['Artikel'] = $this->Admin_Model->Artikel_by_id($id);
            $data['isi']='Admin/Ubah_Artikel';
            $this->load->view('Admin/Template_Admin',$data); 
            }else{
            $idpengguna = $this->session->userdata('id_pengguna');

            $data = array(
                'id_pengguna' =>$idpengguna,
                'id_kategori_artikel' =>$this->input->post('KategoriArtikel'),
                'judul_artikel' =>$this->input->post('judul'),
                'isi_artikel' =>$this->input->post('isiartikel'),
                'tanggal_artikel' =>$this->input->post('datepicker'),
                'status_artikel' =>$this->input->post('status')
                    );
            $this->Admin_Model->UbahArtikel($data,$id);
        //-------------------------- Kembali Ke Halaman Daftar Artikel --------------------------//
            redirect('Admin/Daftar_Artikel');
        } 
        }
        
        public function StatusArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
        //-------------------------- Mengambil data dari segment 3&4 --------------------------//
        $id = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        if($status==0){
        $data = array(
                'status_artikel' =>'1',
                );
        }else{
        $data = array(
                'status_artikel' =>'0',
                );
        }
        $this->Admin_Model->UbahArtikel($data,$id);
        //-------------------------- Kembali Ke Halaman Daftar Artikel --------------------------//
        redirect('Admin/Daftar_Artikel');
        } 
        
        
        public function Hapus_Artikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
        $id = $this->uri->segment(3);
        $this->Admin_Model->Hapus_Artikel($id);
        //---------kembalikan ke halaman Daftar Artikel-------------------//
        redirect('Admin/Daftar_Artikel');
        }
        
        
        // ***************************** KATEGORI ARTIKEL *************************** //
        
        public function Daftar_Product(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Menyimpan session untuk pencarian --------------------------//
        if(isset($_POST['judul_kategori_artikel']))
	{
            $data['judul_kategori_artikel'] = $this->input->post('judul_kategori_artikel');
            $this->session->set_userdata('sess_judul_kategori_artikel', $data['judul_kategori_artikel']);
        }else{
            $data['judul_kategori_artikel'] = $this->session->userdata('sess_judul_kategori_artikel');
        }
     
        //-------------------------- Pagination --------------------------//
        $segment = 4;
        $limit =  10;
        //$idpengguna = $this->session->userdata('id_pengguna');  
        $offset = $this->uri->segment($segment);
        $tot = $this->Admin_Model->SemuaKategoriArtikelbyNama($data['judul_kategori_artikel']);
        $data['DaftarProduct']   = $this->Admin_Model->CariKategoriArtikel($limit, $offset,$data['judul_kategori_artikel']);
        
        $pagination['base_url'] 	= base_url().'index.php/Admin/Daftar_Product/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
	$data['isi']='Admin/Daftar_Product';
        $this->load->view('Admin/Template_Admin',$data);
	}
        
        public function DaftarProduct(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_judul_kategori_artikel');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_Product();
	} 

        public function TambahProduct(){
        //$this->auth->restrict_admin();
       // $this->auth->cek_menu();
        //-------------------------- Validasi dan Input ke Database --------------------------//
        $this->form_validation->set_rules('id_product', 'ID', 'trim|required');
		$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
		$this->form_validation->set_rules('productname', 'Name', 'trim|required');
		$this->form_validation->set_rules('n_fib', 'N/FIB', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        if ($this->form_validation->run() == FALSE)
        {
            $data['isi']='Admin/Tambah_Product';
            $this->load->view('Admin/Template_Admin',$data);
            }else{
             $data = array(
                 'id_product' =>$this->input->post('id_product'),
				 'item_code' =>$this->input->post('item_code'),
                'name' =>$this->input->post('productname'),
                'n_fib' =>$this->input->post('n_fib'),
                'description' =>$this->input->post('description')
                   );
            $this->Admin_Model->TambahProduct($data);
        //-------------------------- Kembali Ke Halaman DaftarKategoriArtikel --------------------------//
            redirect('Admin/Daftar_Product');
        } 
        }
        
        public function UbahProduct(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Validasi dan Update ke Database --------------------------//
        $this->form_validation->set_rules('id_product', 'ID', 'trim|required');
		$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
		$this->form_validation->set_rules('productname', 'Name', 'trim|required');
		$this->form_validation->set_rules('n_fib', 'N/FIB', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        
        $id = $this->uri->segment(3);
        if ($this->form_validation->run() == FALSE)
        {   
            $data['KategoriArtikel'] = $this->Admin_Model->KategoriArtikel_by_id($id);
            $data['isi']='Admin/Ubah_Product';
            $this->load->view('Admin/Template_Admin',$data); 
            }else{ 
           $data = array(
                 'id_product' =>$this->input->post('id_product'),
				 'item_code' =>$this->input->post('item_code'),
                'name' =>$this->input->post('productname'),
                'n_fib' =>$this->input->post('n_fib'),
                'description' =>$this->input->post('description')
                   );
            $this->Admin_Model->UbahProduct($data,$id);
        //-------------------------- Kembali Ke Halaman DaftarKategoriArtikel --------------------------//
            redirect('Admin/Daftar_Product');
        } 
        }
        
        public function StatusKategoriArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
        //-------------------------- Mengambil data dari segment 3&4 --------------------------//
        $id = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        if($status==0){
        $data = array(
                'status_kategori_artikel' =>'1',
                );
        }else{
        $data = array(
                'status_kategori_artikel' =>'0',
                );
        }
            $this->Admin_Model->UbahKategoriArtikel($data,$id);
        //-------------------------- Kembali Ke Halaman DaftarKategoriArtikel --------------------------//
            redirect('Admin/Daftar_KategoriArtikel');
        }
        
        public function HapusProduct(){
       /// $this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        $id = $this->uri->segment(3);
        $this->Admin_Model->HapusProduct($id);
        //---------kembalikan ke halaman Daftar Artikel-------------------//
        redirect('Admin/Daftar_Product');
        }
        
        public function Daftar_Pesan(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
        //-------------------------- Menyimpan session untuk pencarian --------------------------//
        if(isset($_POST['isi']))
	{
            $data['isi'] = $this->input->post('isi');
            $this->session->set_userdata('sess_isi', $data['isi']);
            } else {
            $data['isi'] = $this->session->userdata('sess_isi');
         }
            
	//-------------------------- Pagination --------------------------//
        $segment = 4;
        $limit = 5;
        $offset = $this->uri->segment($segment);
        $data['DaftarPengguna']   = $this->Admin_Model->SemuaPengguna();
        $tot = $this->Admin_Model->SemuaPesan($data['isi']);
        $data['DaftarPesan']   = $this->Admin_Model->CariPesan($limit, $offset,$data['isi']);
        
        $pagination['base_url'] 	= base_url().'index.php/Admin/Daftar_Pesan/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
	$data['isi']='Admin/Daftar_Pesan';
        $this->load->view('Admin/Template_Admin',$data);
	}
        
        public function DaftarPesan(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_isi');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_Pesan();
	} 
        
        public function HapusPesan(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
        $id = $this->uri->segment(3);
        $this->Admin_Model->HapusPesan($id);
        //---------kembalikan ke halaman Daftar Artikel-------------------//
        redirect('Admin/Daftar_Pesan');
        }
        // ***************************** PENGGUNA *************************** //
        
        public function Daftar_Pengguna(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Menyimpan session untuk pencarian --------------------------//
        if(isset($_POST['nama_pengguna']))
	{
            $data['nama_pengguna'] = $this->input->post('nama_pengguna');
            $this->session->set_userdata('sess_nama_pengguna', $data['nama_pengguna']);
        }else{
            $data['nama_pengguna'] = $this->session->userdata('sess_nama_pengguna');
        }
     
        //-------------------------- Pagination --------------------------//
        $segment = 4;
        $limit =  5;
        $offset = $this->uri->segment($segment);
        $tot = $this->Admin_Model->SemuaPenggunabyNamaA2($data['nama_pengguna']);
        $data['DaftarPengguna']   = $this->Admin_Model->CariPenggunaA2($limit, $offset,$data['nama_pengguna']);
        
        $pagination['base_url'] 	= base_url().'index.php/admin/Daftar_Pengguna/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
		$data['isi']='Admin/Daftar_Pengguna';
        $this->load->view('Admin/Template_Admin',$data);
	}
        
        public function DaftarPengguna(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_nama_pengguna');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_Pengguna();
	} 
        
        public function Daftar_Pengguna2(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
        //-------------------------- Menyimpan session untuk pencarian --------------------------//
        if(isset($_POST['nama']))
	{
            $data['nama'] = $this->input->post('nama');
            $this->session->set_userdata('sess_nama', $data['nama']);
        }else{
            $data['nama'] = $this->session->userdata('sess_nama');
        }
     
        //-------------------------- Pagination --------------------------//
        $segment = 4;
        $limit =  10;
        $offset = $this->uri->segment($segment);
        $tot = $this->Admin_Model->SemuaPenggunabyNama($data['nama']);
        $data['DaftarPengguna']   = $this->AdminModel->CariPengguna($limit, $offset,$data['nama']);
        
        $pagination['base_url'] 	= base_url().'index.php/Admin/Daftar_Pengguna2/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
	$data['isi']='Admin/DaftarPengguna2';
        $this->load->view('Admin/Template_Admin',$data);
	}
        
        public function DaftarPengguna2(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_nama');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_Pengguna2();
	} 
        
        public function Profil_Pengguna(){
        $this->auth->restrict_admin();
        $this->auth->cek_menu();
        $id = $this->session->userdata('id_pengguna');    
        $data['Pengguna'] = $this->Admin_Model->SemuaPenggunabyId($id);    
        $data['isi']='Admin/Profil_Pengguna';
        $this->load->view('Admin/Template_Admin',$data);
	}
        
        public function TambahPengguna(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Validasi dan Input ke Database --------------------------//
        $this->form_validation->set_rules('id_admin', 'ID', 'trim|required');
        $this->form_validation->set_rules('username', 'Name', 'trim|required');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
		$this->form_validation->set_rules('Level', 'Level', 'trim|required');
        //$this->form_validation->set_rules('password_conf', 'Konfirmasi Password', 'trim|required|matches[password]');
        //$this->form_validation->set_rules('datepicker', 'Tanggal', 'trim|required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        if ($this->form_validation->run() == FALSE)
        {
            
            $data['isi']='Admin/Tambah_Pengguna';
            $this->load->view('Admin/Template_Admin',$data); 
            }else{
            $data = array(
                'id_admin' =>$this->input->post('id_admin'),
                'name' =>$this->input->post('username'),
                'pwd' =>$this->input->post('pwd'),
                'job_title' =>$this->input->post('job_title'),
				'Level' =>$this->input->post('Level')
                    );
            $this->Admin_Model->TambahPengguna($data);
        //-------------------------- Kembali Ke Halaman DaftarPengguna --------------------------//
            redirect('Admin/Daftar_Pengguna');
        } 
        }
        
        public function UbahPengguna(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Validasi dan Input ke Database --------------------------//
        $this->form_validation->set_rules('id_admin', 'ID Admin', 'trim|required');
        $this->form_validation->set_rules('username', 'Name', 'trim|required');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required|required');
		$this->form_validation->set_rules('job_title', 'Job Title', 'trim|required|required');
		$this->form_validation->set_rules('Level', 'Level', 'trim|required|required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        $id = $this->uri->segment(3);
        if ($this->form_validation->run() == FALSE)
        {   
            $data['Pengguna'] = $this->Admin_Model->SemuaPenggunabyId($id);
            $data['isi']='Admin/Ubah_Pengguna';
            $this->load->view('Admin/Template_Admin',$data); 
            }else{
            $data = array(
                'id_admin' =>$this->input->post('id_admin'),
                'name' =>$this->input->post('username'),
                'pwd' =>$this->input->post('pwd'),
                'job_title' =>$this->input->post('job_title'),
				'Level' =>$this->input->post('Level')
                
                    );
            $this->Admin_Model->UbahPengguna($data,$id);
        //-------------------------- Kembali Ke Halaman DaftarPengguna --------------------------//
            redirect('Admin/Daftar_Pengguna');
        } 
        }

        public function UbahProfil_Pribadi_Admin(){
        $this->auth->restrict_admin();
        //-------------------------- Validasi dan Input ke Database --------------------------//
        $this->form_validation->set_rules('namadepan', 'Nama Depan', 'trim|required');
        $this->form_validation->set_rules('namabelakang', 'Nama Belakang', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        $id = $this->session->userdata('id_pengguna');
        if ($this->form_validation->run() == FALSE)
        {
            $data['Pengguna'] = $this->Admin_Model->SemuaPenggunabyId($id);
            $data['Level']   = $this->Admin_Model->SemuaLevel();
            $data['isi']='Admin/Ubah_Akun_Admin';
            $this->load->view('Admin/Template_Admin',$data);
            }else{
                $data = array(
                    'nama_depan_pengguna' =>$this->input->post('namadepan'),
                    'nama_belakang_pengguna' =>$this->input->post('namabelakang'),
                    'email_pengguna' =>$this->input->post('email'),
                    );
        $this->Admin_Model->UbahPengguna($data,$id);
        //-------------------------- Kembali Ke Halaman DaftarPengguna --------------------------//
        redirect('Admin');
        } 
        }
        
        public function Ubah_Password_Admin(){
        $this->auth->restrict_admin();      
        //-------------------------- Validasi dan Input ke Database --------------------------//
        //$this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
        $this->form_validation->set_rules('password_baru', 'New Password', 'trim|required');
        $this->form_validation->set_rules('konfirmasi_password_baru', 'Password Confirmation', 'trim|required|matches[password_baru]');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        $id = $this->session->userdata('id_admin');
        
        if ($this->form_validation->run() == FALSE)
        {   
            $data['Pengguna'] = $this->Admin_Model->SemuaPenggunabyId($id);
            $data['isi']='Admin/Ubah_Password_Admin';
            $this->load->view('Admin/Template_Admin',$data); 
            }else{
        
             $data = array(
           // 'pwd' =>md5($this->input->post('password_baru')),
		    'pwd' =>($this->input->post('password_baru')),
              );
        
          $this->Admin_Model->UbahPengguna($data,$id);
        //-------------------------- Kembali Ke Halaman Daftar Materi --------------------------//
          redirect('Admin');
        } 
        }
        
        
        public function HapusPengguna(){
        ///$this->auth->restrict_admin();      
        $id = $this->uri->segment(3);
        // Mengambil data nama_fileasli //
        ///$data= $this->Admin_Model->SemuaPenggunabyId($id)->row();
        $this->Admin_Model->HapusPengguna($id);
        //---------kembalikan ke halaman Daftar Kategori-------------------//
        redirect('Admin/DaftarPengguna');
        }
        
        public function StatusPengguna(){
        //$this->auth->restrict_admin();      
        //-------------------------- Mengambil data dari segment 3&4 --------------------------//
        $id = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        if($status==0){
        $data = array(
                'status_pengguna' =>'1',
                );
        }else{
        $data = array(
                'status_pengguna' =>'0',
                );
        }
        $this->Admin_Model->UbahPengguna($data,$id);
        //-------------------------- Kembali Ke Halaman Daftar User --------------------------//
        redirect('Admin/DaftarPengguna');
        } 
        
        public function StatusPengguna2(){
        //$this->auth->restrict_admin();      
        //-------------------------- Mengambil data dari segment 3&4 --------------------------//
        $id = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        if($status==0){
        $data = array(
                'status_user' =>'1',
                );
        }else{
        $data = array(
                'status_user' =>'0',
                );
        }
        $this->Admin_Model->UbahPengguna($data,$id);
        //-------------------------- Kembali Ke Halaman Daftar User --------------------------//
        redirect('Admin/DaftarPengguna2');
        } 
    
        // ***************************** LOGIN *************************** //
        public function FormLoginAdmin(){
        if($this->auth->is_logged_in() == true)
        {  
        $data['isi']='Admin/Isi';
        $this->load->view('Admin/Template_Admin',$data);
        }else{
        redirect('Admin');   
        }
        }
        
        public function Login()
      {
        if($this->auth->is_logged_in() == false)
      {
      $this->form_validation->set_rules('email', 'Email', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
 
      if ($this->form_validation->run() == FALSE)
      {
//          $data ['isi']='login';
          $this->load->view('Admin/Login_Admin');
      }
      else
      {
         $email = $this->input->post('email');
         $password = $this->input->post('password');
         $success = $this->auth->do_login($email,$password);
         if($success)
         {
            if ($this->session->userdata('Level')== 2){
                 if($this->auth->is_logged_in() == true)
                 {
                 // jika dia memang sudah login, destroy session
                 $this->auth->do_logout();
                 }
                 redirect('Utama/FormLogin');
                 }else {
                 // lemparkan ke halaman index user
                 redirect('Admin');
                 }
         }
         else
         {
            $data['login_info'] = "Maaf, username dan password salah!";
//            $data ['isi']='login';
            $this->load->view('Admin/Login_Admin',$data);
           
                }
            }
        }
        else
        {
        redirect('Admin/Template_Admin');
        }
      }
      
      function Logout()
      {
        if($this->auth->is_logged_in() == true)
        {
		// jika dia memang sudah login, destroy session
		$this->auth->do_logout();
	}
	// larikan ke halaman utama
	redirect('Utama/FormLogin');
      }
	  
	  
	   public function Daftar_MC_Number1(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Menyimpan session untuk pencarian --------------------------//
        if(isset($_POST['judul_kategori_artikel']))
	{
            $data['judul_kategori_artikel'] = $this->input->post('judul_kategori_artikel');
            $this->session->set_userdata('sess_judul_kategori_artikel', $data['judul_kategori_artikel']);
        }else{
            $data['judul_kategori_artikel'] = $this->session->userdata('sess_judul_kategori_artikel');
        }
     
        //-------------------------- Pagination --------------------------//
        $segment = 4;
        $limit =  10;
        //$idpengguna = $this->session->userdata('id_pengguna');  
        $offset = $this->uri->segment($segment);
        $tot = $this->Admin_Model->SemuaMCNumber($data['judul_kategori_artikel']);
        $data['DaftarMCNumber']   = $this->Admin_Model->CariMCNumber($limit, $offset,$data['judul_kategori_artikel']);
        
        $pagination['base_url'] 	= base_url().'index.php/Admin/Daftar_MC_Number/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
	$data['isi']='Admin/Daftar_MC_Number';
        $this->load->view('Admin/Template_Admin',$data);
	}
        
        public function DaftarMCNumber1(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_judul_kategori_artikel');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_MC_Number();
	} 
	  
	
	
	
	
	
	public function Daftar_Operator(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Menyimpan session untuk pencarian --------------------------//
        if(isset($_POST['judul_kategori_artikel']))
	{
            $data['judul_kategori_artikel'] = $this->input->post('judul_kategori_artikel');
            $this->session->set_userdata('sess_judul_kategori_artikel', $data['judul_kategori_artikel']);
        }else{
            $data['judul_kategori_artikel'] = $this->session->userdata('sess_judul_kategori_artikel');
        }
     
        //-------------------------- Pagination --------------------------//
        $segment = 4;
        $limit =  10;
        //$idpengguna = $this->session->userdata('id_pengguna');  
        $offset = $this->uri->segment($segment);
        $tot = $this->Admin_Model->SemuaOperator($data['judul_kategori_artikel']);
        $data['DaftarOperator']   = $this->Admin_Model->CariOperator($limit, $offset,$data['judul_kategori_artikel']);
        
        $pagination['base_url'] 	= base_url().'index.php/Admin/Daftar_Operator/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
	$data['isi']='Admin/Daftar_Operator';
        $this->load->view('Admin/Template_Admin',$data);
	}
        
        public function DaftarOperator(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_judul_kategori_artikel');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_Operator();
	}   

public function TambahOperator(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Validasi dan Input ke Database --------------------------//
        $this->form_validation->set_rules('id_opr', 'ID', 'trim|required');
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('username', 'Name', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
        //$this->form_validation->set_rules('password_conf', 'Konfirmasi Password', 'trim|required|matches[password]');
        //$this->form_validation->set_rules('datepicker', 'Tanggal', 'trim|required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        if ($this->form_validation->run() == FALSE)
        {
            
            $data['isi']='Admin/Tambah_Operator';
            $this->load->view('Admin/Template_Admin',$data); 
            }else{
            $data = array(
                'id_opr' =>$this->input->post('id_opr'),
				'nip' =>$this->input->post('nip'),
                'name' =>$this->input->post('username'),              
                'job_title' =>$this->input->post('job_title')
                    );
            $this->Admin_Model->TambahOperator($data);
        //-------------------------- Kembali Ke Halaman DaftarPengguna --------------------------//
            redirect('Admin/Daftar_Operator');
        } 
        }
        
        public function UbahOperator(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Validasi dan Input ke Database --------------------------//
        $this->form_validation->set_rules('id_opr', 'ID', 'trim|required');
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|required');
        $this->form_validation->set_rules('username', 'Name', 'trim|required');
		$this->form_validation->set_rules('job_title', 'Job Title', 'trim|required|required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        $id = $this->uri->segment(3);
        if ($this->form_validation->run() == FALSE)
        {   
            $data['Operator'] = $this->Admin_Model->SemuaOperatorbyId($id);
            $data['isi']='Admin/Ubah_Operator';
            $this->load->view('Admin/Template_Admin',$data); 
            }else{
            $data = array(
                'id_opr' =>$this->input->post('id_opr'),
				'nip' =>$this->input->post('nip'),
                'name' =>$this->input->post('username'),
                'job_title' =>$this->input->post('job_title')
                
                    );
            $this->Admin_Model->UbahOperator($data,$id);
        //-------------------------- Kembali Ke Halaman DaftarPengguna --------------------------//
            redirect('Admin/Daftar_Operator');
        } 
        }
		
		 public function HapusOperator(){
       /// $this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        $id = $this->uri->segment(3);
        $this->Admin_Model->HapusOperator($id);
        //---------kembalikan ke halaman Daftar Artikel-------------------//
        redirect('Admin/Daftar_Operator');
        }
	 public function DaftarMachine(){    
	$this->data['DaftarMachine'] = $this->DaftarMachine->get();
	$this->load->view('Daftar_MC_Number', $this->data);
 }


 public function Daftar_MC_Number(){
        //$this->auth->restrict();
        ///$this->auth->cek_menu();
        //-------------------------- Menyimpan session untuk pencarian --------------------------//
        if(isset($_POST['shift']))
    {
            $data['shift'] = $this->input->post('shift');
            
            $this->session->set_userdata('sess_shift', $data['shift']);
            
        }else{
            $data['shift'] = $this->session->userdata('sess_shift');
            
        }
     
        //-------------------------- Pagination --------------------------//
        $segment = 4;
        $limit =  10;
        $shift = $this->input->post('shift');
        $id_spv = $this->session->userdata('id_admin'); 
        $datepicker = $this->input->post('datepicker');
        $datepicker = str_replace('/', '-',  $datepicker);
        $datepicker= date('Y-m-d', strtotime($datepicker));

        $datepicker1 = $this->input->post('datepicker1');
        $datepicker1= str_replace('/', '-',  $datepicker1);
        $datepicker1= date('Y-m-d', strtotime($datepicker1));
        
        
        $offset = $this->uri->segment($segment);
        $tot = $this->Admin_Model->SemuaMCNumber($data['shift'],$datepicker,$datepicker1);
        $data['DaftarMCNumber']   = $this->Admin_Model->CariMCNumber($limit, $offset,$data['shift'],$datepicker,$datepicker1);
        //$data['DaftarMCProblem1']   = $this->Admin_Model->CariMCProblem1($limit, $offset,$data['shift'],$id_spv,$datepicker);
       // $data['DaftarMCProblem2']   = $this->Admin_Model->CariMCProblem2($limit, $offset,$data['shift'],$id_spv,$datepicker);
       $data['DaftarMCRecord']   = $this->Admin_Model->CariMCRecord($limit, $offset,$data['shift'],$id_spv,$datepicker,$datepicker1);
       // $data['DaftarTotalMCRecord1']   = $this->Admin_Model->TotalMCRecord1($limit, $offset,$data['shift'],$id_spv,$datepicker);
       // $data['DaftarTotalMCRecord2']   = $this->Admin_Model->TotalMCRecord2($limit, $offset,$data['shift'],$id_spv,$datepicker);
        
        
        $pagination['base_url']   = base_url().'index.php/Admin/Daftar_MC_Number/page/';
        $pagination['total_rows']   = $tot->num_rows();
        $pagination['per_page']   = $limit;
        $pagination['uri_segment']      = $segment;
        $pagination['num_links']  = 2;
        $this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
        $data['isi']='Admin/Daftar_MC_Number';
        
        $this->load->view('Admin/Template_Admin',$data);


        
    }
        
        public function DaftarMCNumber(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_shift');
         
     
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_MC_Number();
    } 



	  
}