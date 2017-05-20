<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moderator extends CI_Controller {
   
    
        public function __construct()
	{
		parent::__construct();
               
	}
        public function index(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
        $data['isi']='Moderator/Isi';
        $this->load->view('Moderator/Template_Moderator',$data);
        }

        
        // ***************************** ARTIKEL *************************** //

        public function Daftar_Artikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
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
        
        $pagination['base_url'] 	= base_url().'index.php/Moderator/Daftar_Artikel/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
	$data['isi']='Moderator/Daftar_Artikel';
        $this->load->view('Moderator/Template_Moderator',$data);
	}
        
        public function DaftarArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_judul_artikel');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_Artikel();
	} 

        public function TambahArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
        //-------------------------- Validasi dan Input ke Database --------------------------//
        $this->form_validation->set_rules('judul', 'Judul Artikel', 'trim|required');
        $this->form_validation->set_rules('isiartikel', 'Isi Artikel', 'trim|required');
        $this->form_validation->set_rules('datepicker', 'Tanggal', 'trim|required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        if ($this->form_validation->run() == FALSE)
        {
            $data['KategoriArtikel'] = $this->Admin_Model->SemuaKategoriArtikel();
            $data['isi']='Moderator/Tambah_Artikel';
            $this->load->view('Moderator/Template_Moderator',$data); 
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
            redirect('Moderator/Daftar_Artikel');
        } 
        }
        
        public function UbahArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
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
            $data['isi']='Moderator/Ubah_Artikel';
            $this->load->view('Moderator/Template_Moderator',$data); 
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
            redirect('Moderator/Daftar_Artikel');
        } 
        }
        
        public function StatusArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
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
        redirect('Moderator/Daftar_Artikel');
        } 
        
        
        public function Hapus_Artikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
        $id = $this->uri->segment(3);
        $this->Admin_Model->Hapus_Artikel($id);
        //---------kembalikan ke halaman Daftar Artikel-------------------//
        redirect('Moderator/Daftar_Artikel');
        }
        
        
        // ***************************** KATEGORI ARTIKEL *************************** //
        
        public function Daftar_KategoriArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
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
        $idpengguna = $this->session->userdata('id_pengguna');  
        $offset = $this->uri->segment($segment);
        $tot = $this->Admin_Model->SemuaKategoriArtikelbyNama($data['judul_kategori_artikel'],$idpengguna);
        $data['DaftarKategoriArtikel']   = $this->Admin_Model->CariKategoriArtikel($limit, $offset,$data['judul_kategori_artikel'],$idpengguna);
        
        $pagination['base_url'] 	= base_url().'index.php/Moderator/Daftar_KategoriArtikel/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
	$data['isi']='Moderator/Daftar_Kategori_Artikel';
        $this->load->view('Moderator/Template_Moderator',$data);
	}
        
        public function DaftarKategoriArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_judul_kategori_artikel');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_KategoriArtikel();
	} 

        public function TambahKategoriArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
        //-------------------------- Validasi dan Input ke Database --------------------------//
        $this->form_validation->set_rules('kategoriartikel', 'Kategori Artikel', 'trim|required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        if ($this->form_validation->run() == FALSE)
        {
            $data['isi']='Moderator/Tambah_Kategori_Artikel';
            $this->load->view('Moderator/Template_Moderator',$data);
            }else{
            $idpengguna = $this->session->userdata('id_pengguna');    
            $data = array(
                'nama_kategori_artikel' =>$this->input->post('kategoriartikel'),
                'status_kategori_artikel' =>$this->input->post('status'),   
                'id_pengguna' =>$idpengguna
                    );
            $this->Admin_Model->TambahKategoriArtikel($data);
        //-------------------------- Kembali Ke Halaman DaftarKategoriArtikel --------------------------//
            redirect('Moderator/Daftar_KategoriArtikel');
        } 
        }
        
        public function UbahKategoriArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
        //-------------------------- Validasi dan Update ke Database --------------------------//
        $this->form_validation->set_rules('kategoriartikel', 'Kategori Artikel', 'trim|required');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        
        $id = $this->uri->segment(3);
        if ($this->form_validation->run() == FALSE)
        {   
            $data['KategoriArtikel'] = $this->Admin_Model->KategoriArtikel_by_id($id);
            $data['isi']='Moderator/Ubah_Kategori_Artikel';
            $this->load->view('Moderator/Template_Moderator',$data); 
            }else{
            $idpengguna = $this->session->userdata('id_pengguna');    
            $data = array(
                'nama_kategori_artikel' =>$this->input->post('kategoriartikel'),
                'status_kategori_artikel' =>$this->input->post('status'),   
                'id_pengguna' =>$idpengguna
                    );
            $this->Admin_Model->UbahKategoriArtikel($data,$id);
        //-------------------------- Kembali Ke Halaman DaftarKategoriArtikel --------------------------//
            redirect('Moderator/Daftar_KategoriArtikel');
        } 
        }
        
        public function StatusKategoriArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
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
            redirect('Moderator/Daftar_KategoriArtikel');
        }
        
        public function HapusKategoriArtikel(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
        $id = $this->uri->segment(3);
        $this->Admin_Model->HapusKategoriArtikel($id);
        //---------kembalikan ke halaman Daftar Artikel-------------------//
        redirect('Moderator/Daftar_KategoriArtikel');
        }
        
        public function Daftar_Pesan(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
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
        
        $pagination['base_url'] 	= base_url().'index.php/Moderator/Daftar_Pesan/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
	$data['isi']='Moderator/Daftar_Pesan';
        $this->load->view('Moderator/Template_Moderator',$data);
	}
        
        public function DaftarPesan(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_isi');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_Pesan();
	} 
        
        public function HapusPesan(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
        $id = $this->uri->segment(3);
        $this->Admin_Model->HapusPesan($id);
        //---------kembalikan ke halaman Daftar Artikel-------------------//
        redirect('Moderator/Daftar_Pesan');
        }
        // ***************************** PENGGUNA *************************** //
        
        public function Daftar_Pengguna(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
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
        $tot = $this->Admin_Model->SemuaPenggunabyNamaM2($data['nama_pengguna']);
        $data['DaftarPengguna']   = $this->Admin_Model->CariPenggunaM2($limit, $offset,$data['nama_pengguna']);
        
        $pagination['base_url'] 	= base_url().'index.php/Moderator/Daftar_Pengguna/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
	$data['isi']='Moderator/Daftar_Pengguna';
        $this->load->view('Moderator/Template_Moderator',$data);
	}
        
        public function DaftarPengguna(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_nama_pengguna');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_Pengguna();
	} 
        
        public function Daftar_Pengguna2(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
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
        
        $pagination['base_url'] 	= base_url().'index.php/Moderator/Daftar_Pengguna2/page/';
	$pagination['total_rows'] 	= $tot->num_rows();
        $pagination['per_page'] 	= $limit;
	$pagination['uri_segment']      = $segment;
	$pagination['num_links'] 	= 2;
	$this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
	$data['isi']='Moderator/DaftarPengguna2';
        $this->load->view('Moderator/Template_Moderator',$data);
	}
        
        public function DaftarPengguna2(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_nama');
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_Pengguna2();
	} 
        
        public function Profil_Pengguna(){
        $this->auth->restrict_admin();
        $this->auth->cek_menum();
        $id = $this->session->userdata('id_pengguna');    
        $data['Pengguna'] = $this->Admin_Model->SemuaPenggunabyId($id);    
        $data['isi']='Moderator/Profil_Pengguna';
        $this->load->view('Moderator/Template_Moderator',$data);
	}
        
        public function UbahProfil_Pribadi_Moderator(){
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
            $data['isi']='Moderator/Ubah_Akun_Moderator';
            $this->load->view('Moderator/Template_Moderator',$data);
            }else{
                $data = array(
                    'nama_depan_pengguna' =>$this->input->post('namadepan'),
                    'nama_belakang_pengguna' =>$this->input->post('namabelakang'),
                    'email_pengguna' =>$this->input->post('email'),
                    );
        $this->Admin_Model->UbahPengguna($data,$id);
        //-------------------------- Kembali Ke Halaman DaftarPengguna --------------------------//
        redirect('Moderator');
        } 
        }
        
        public function Ubah_Password_Moderator(){
        $this->auth->restrict_admin();      
        //-------------------------- Validasi dan Input ke Database --------------------------//
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required');
        $this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'trim|required|matches[password_baru]');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        $id = $this->session->userdata('id_pengguna');
        
        if ($this->form_validation->run() == FALSE)
        {   
            $data['Pengguna'] = $this->Admin_Model->SemuaPenggunabyId($id);
            $data['isi']='Moderator/Ubah_Password_Moderator';
            $this->load->view('Moderator/Template_Moderator',$data); 
            }else{
        
             $data = array(
            'password_pengguna' =>md5($this->input->post('password_baru')),
              );
        
          $this->Admin_Model->UbahPengguna($data,$id);
        //-------------------------- Kembali Ke Halaman Daftar Materi --------------------------//
          redirect('Moderator');
        } 
        }
        
        
        public function HapusPengguna(){
        $this->auth->restrict_admin();      
        $id = $this->uri->segment(3);
        // Mengambil data nama_fileasli //
        $data= $this->Admin_Model->SemuaPenggunabyId($id)->row();
        // Mengahpus data d dalam folder download //
        //unlink('Foto/besar/'.$data->foto_besar);
        //unlink('Foto/sedang/'.$data->foto_sedang);
        //unlink('Foto/kecil/'.$data->foto_kecil);
        
        $this->Admin_Model->HapusPengguna($id);
        //---------kembalikan ke halaman Daftar Kategori-------------------//
        redirect('Moderator/DaftarPengguna');
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
        redirect('Moderator/DaftarPengguna');
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
        redirect('Moderator/DaftarPengguna2');
        } 
    
        // ***************************** LOGIN *************************** //
        public function FormLoginAdmin(){
        if($this->auth->is_logged_in() == false)
        {  
        $this->load->view('Moderator/Login_Admin');
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
          $this->load->view('Moderator/Login_Admin',$data);
      }
      else
      {
         $email = $this->input->post('email');
         $password = $this->input->post('password');
         $success = $this->auth->do_login($email,$password);
         if($success)
         {
            if ($this->session->userdata('id_level')== 2){
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
            $this->load->view('Moderator/Login_Admin',$data);
           
                }
            }
        }
        else
        {
        redirect('Moderator/Template_Moderator');
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
	redirect('Admin');
      }
}