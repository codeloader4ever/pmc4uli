<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Auth library
 *
 */
class Auth{
	var $CI = NULL;
	function __construct()
	{
		// get CI's object
		$this->CI =& get_instance();
	}
	// untuk validasi login
	function pendaftaran($email,$password)
	{
		// cek di database, ada ga?
		$this->CI->db->from('pengguna');
		$this->CI->db->where('email_pengguna',$email);
                // $this->CI->db->where('status_pengguna !=', 1);
               //$this->CI->db->where('password_user',$password);
		$this->CI->db->where('password_pengguna=MD5("'.$password.'")','',false);
		$result = $this->CI->db->get();
		if($result->num_rows() == 0) 
		{
			// username dan password tsb tidak ada 
			return false;
                }
		else	
		{
			// ada, maka ambil informasi dari database
			$userdata = $result->row();
			$session_data = array(
				'id_pengguna'	=> $userdata->id_pengguna,
//				'nama_pengguna'	=> $userdata->nama_pengguna,
                                'id_level'	=> $userdata->id_level,
                                );
			// buat session
			$this->CI->session->set_userdata($session_data);
			return true;
		}
	}


	function do_login($username,$password)
	{
		// cek di database, ada ga?
		$this->CI->db->from('tbl_admin');
		$this->CI->db->where('id_admin',$username);
                //$this->CI->db->where('status_pengguna !=', 1);
               //$this->CI->db->where('password_user',$password);
		$this->CI->db->where('pwd',$password);
		$result = $this->CI->db->get();
		if($result->num_rows() == 0) 
		{
			// username dan password tsb tidak ada 
			return false;
                }
		else	
		{
			// ada, maka ambil informasi dari database
			$userdata = $result->row();
			$session_data = array(
				'id_admin'	=> $userdata->id_admin,
			    'name'	=> $userdata->name,
                               'Level'	=> $userdata->Level,
                                );
			// buat session
			$this->CI->session->set_userdata($session_data);
			return true;
		}
	}

	// untuk mengecek apakah user sudah login/belum
	function is_logged_in()
	{
		if($this->CI->session->userdata('id_admin') == '')
		{
			return false;
		}
		return true;
	}
	// untuk validasi di setiap halaman yang mengharuskan authentikasi
	function restrict()
	{   
           if($this->is_logged_in() == false)
		{
                   	redirect('Utama/FormLogin');
		}
        }
        
        
        function restrict_admin()
	{
		if($this->is_logged_in() == false)
		{
                   	redirect('Admin/FormLoginAdmin');
					
		}
	}
        
	function cek_menu()
	{
		$status_user = $this->CI->session->userdata('Level');
		if($status_user==2)
		{
			//die("Maaf, Anda tidak berhak untuk mengakses halaman ini.");
                     redirect('Utama');
		}elseif($status_user==3){
                    redirect('Moderator');
                }
	}
        function cek_menum()
	{
		$status_user = $this->CI->session->userdata('Level');
		if($status_user==2)
		{
			//die("Maaf, Anda tidak berhak untuk mengakses halaman ini.");
                     redirect('Utama');
		}elseif($status_user==1){
                    redirect('Admin/FormLoginAdmin');
                }
	}
	// untuk logout
	function do_logout()
	{
		$this->CI->session->sess_destroy();	
	}
}