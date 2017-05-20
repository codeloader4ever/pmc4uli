<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utama extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
               
	}
	public function index()
        {
            
        $this->auth->restrict();    
        
        $data ['isi']='Isi';
        $this->load->view('Template_Utama', $data); 
        }
      

      
          public function Ubah_Password(){
        //$this->auth->restrict();      
        //-------------------------- Validasi dan Input ke Database --------------------------//
       // $this->form_validation->set_rules('password_lama', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('password_baru', 'New Password', 'trim|required');
        $this->form_validation->set_rules('konfirmasi_password_baru', 'Password Confirmation', 'trim|required|matches[password_baru]');
        $this->form_validation->set_error_delimiters('<h4 class="alert_warning">', '</h4>');
        $id = $this->session->userdata('id_admin');
        
        if ($this->form_validation->run() == FALSE)
        {   
            $data['Pengguna'] = $this->Admin_Model->SemuaPenggunabyId($id);
            $data['isi']='Ubah_Password';
            $this->load->view('Template_Utama',$data); 
            }else{
        
             $data = array(
            //'pwd' =>md5($this->input->post('password_baru')),
			'pwd' =>($this->input->post('password_baru'))
              );
        
          $this->Admin_Model->UbahPengguna($data,$id);
        //-------------------------- Kembali Ke Halaman Daftar Materi --------------------------//
          redirect('Utama');
        } 
        }
        
      

        // ////////////////////////////////////////////////////////////////////////////////////////////// //
        //                                              LOGIN                                             //
        // ////////////////////////////////////////////////////////////////////////////////////////////// //
        public function FormLogin(){
        if($this->auth->is_logged_in() == false)
        {  
        $this->load->view('Template_Login');
        }else{
        redirect('Utama');   
        }
        }
        
        public function Login()
        {
        if($this->auth->is_logged_in() == false)
        {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required');
        $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
 
        if ($this->form_validation->run() == FALSE)
        {
//          $data ['isi']='login';

          $this->load->view('Template_Login');
        }
        else
        {
        $username = $this->input->post('username');
        $password = $this->input->post('pwd');
        $success = $this->auth->do_login($username,$password);
        if($success)
        {
            if ($this->session->userdata('Level')== 1){
                if($this->auth->is_logged_in() == true)
                {
                 // jika dia memang sudah login, destroy session
               //$this->auth->do_logout();
                }
                redirect('Admin');
                }else {
                 // lemparkan ke halaman index user
                redirect('Utama');
                }
        }
        else
        {
           $data['login_info'] = "Maaf, username dan password salah!";
//            $data ['isi']='login';
           $this->load->view('Template_Login',$data);
           
               }
           }
        }
        else
        {
        redirect('Utama');
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
	redirect('Utama');
      }
      
      function tes()
      {

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
        
        
         $offset = $this->uri->segment($segment);
        $tot = $this->Utama_Model->SemuaMCNumber($data['shift'],$id_spv,$datepicker);
        $data['DaftarMCNumber']   = $this->Utama_Model->CariMCNumber($limit, $offset,$data['shift'],$id_spv,$datepicker);
        $data['DaftarMCProblem1']   = $this->Utama_Model->CariMCProblem1($limit, $offset,$data['shift'],$id_spv,$datepicker);
        $data['DaftarMCProblem2']   = $this->Utama_Model->CariMCProblem2($limit, $offset,$data['shift'],$id_spv,$datepicker);
        $data['DaftarMCRecord']   = $this->Utama_Model->CariMCRecord($limit, $offset,$data['shift'],$id_spv,$datepicker);
        $data['DaftarTotalMCRecord1']   = $this->Utama_Model->TotalMCRecord1($limit, $offset,$data['shift'],$id_spv,$datepicker);
        $data['DaftarTotalMCRecord2']   = $this->Utama_Model->TotalMCRecord2($limit, $offset,$data['shift'],$id_spv,$datepicker);
        $data['DaftarNotConfirmed']   = $this->Utama_Model->CariMCNotConfirmed($limit, $offset,$data['shift'],$id_spv,$datepicker);

        
        
        $pagination['base_url']   = base_url().'index.php/Utama/Daftar_MC_Number/page/';
        $pagination['total_rows']   = $tot->num_rows();
        $pagination['per_page']   = $limit;
        $pagination['uri_segment']      = $segment;
        $pagination['num_links']  = 2;
        $this->pagination->initialize($pagination);
        
        //-------------------------- View --------------------------//
        $data['isi']='Daftar_MC_Number';
        
        $this->load->view('Template_Utama',$data);

if(isset($_POST['submit'])) {
  $this->Approved();
}
      
if(isset($_POST['excel'])) {
  $this->export();
}

        
	}
        
        public function DaftarMCNumber(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
     	//-------------------------- Menghapus Session --------------------------//
        $this->session->unset_userdata('sess_shift');
         
     
        //-------------------------- Menggagil function  --------------------------//
        $this->Daftar_MC_Number();
	} 


public function Approved(){
        ///$this->auth->restrict_admin();
        ///$this->auth->cek_menu();
        //-------------------------- Validasi dan Input ke Database --------------------------/
        $shift = $this->input->post('shift');
        $id_spv = $this->session->userdata('id_admin'); 
        $datepicker = $this->input->post('datepicker');
        $datepicker = str_replace('/', '-',  $datepicker);
        $datepicker= date('Y-m-d', strtotime($datepicker));

       $data = array(
                'approval' =>$this->input->post('approval'),
                'approved_by' =>$this->session->userdata('id_admin'),
                'approved_date'=>date("Y-m-d H:i:s")
                
                    );
            $this->Utama_Model->approval($data,$shift,$id_spv,$datepicker);
        //-------------------------- Kembali Ke Halaman DaftarPengguna --------------------------//
            redirect('Utama/Daftar_MC_Number');
        
        }


public function export(){

        $shift = $this->input->post('shift');
        $id_spv = $this->session->userdata('id_admin'); 
        $datepicker = $this->input->post('datepicker');
        $datepicker = str_replace('/', '-',  $datepicker);
        $datepicker= date('Y-m-d', strtotime($datepicker));

        $ambildata = $this->Utama_Model->Export_Bigloss_Record($shift,$id_spv,$datepicker);
        $ambildata2 =$this->Utama_Model->Export_MC_Record($shift,$id_spv,$datepicker);
        $ambildata3 =$this->Utama_Model->Export_Problem1($shift,$id_spv,$datepicker);
        $ambildata4 =$this->Utama_Model->Export_Problem2($shift,$id_spv,$datepicker);
        $ambildata5 =$this->Utama_Model->Export_Total1($shift,$id_spv,$datepicker);
        $ambildata6 =$this->Utama_Model->Export_Total2($shift,$id_spv,$datepicker);


        if(count($ambildata)>0){
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("e-Pamco") //creator
                    ->setTitle("e-Pamco");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('MC Number'); //sheet title
             
            foreach ($ambildata2 as $frow){
            $objset->setCellValue("A2", "Machine Type");
            $objset->setCellValue("A3", "Item Code");
             $objset->setCellValue("A4", "Item Name");
             $objset->setCellValue("A6", "Bigloss Records");
               $objset->setCellValue("C2", "Machine No");
               $objset->setCellValue("C3", "Day");
               $objset->setCellValue("C4", "Date");
            $objset->setCellValue("B2", $frow->mcname);
            $objset->setCellValue("B3", $frow->item_code);
            $objset->setCellValue("B4", $frow->productname);
            $objset->setCellValue("D2", $frow->id_mc_number);
            $objset->setCellValue("D3", $frow->str_day);
            $objset->setCellValue("D4", date('d/m/Y', strtotime($frow->date)));


        }
            
            $objget->getStyle("A7:E7")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );
 
            //table header
            $cols = array("A","B","C","D","E");
             
            $val = array("Bigloss","Sub Bigloss","Record Time","Duration","Description");
             
            for ($a=0;$a<5; $a++) 
            {
                $objset->setCellValue($cols[$a].'7', $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'7')->applyFromArray($style);
            }
             
            $baris  = 8;
            foreach ($ambildata as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
               


                $objset->setCellValue("A".$baris, $frow->biglossname);
                $objset->setCellValue("B".$baris, $frow->subbiglossname); 
                $objset->setCellValue("C".$baris, $frow->record_time); 
                $objset->setCellValue("D".$baris, gmdate("H:i:s",$frow->duration)); 
                $objset->setCellValue("E".$baris, $frow->description); 
                //Set number value
                //$objPHPExcel->getActiveSheet()->getStyle('A1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++;

            

            }

            
           
                $lastrow = count($ambildata)+6+3;
                $nextrow=$lastrow+1;
                $objset->setCellValue("A".$lastrow, "Measurement & Adjustment");

         $objget->getStyle("A".$nextrow.":E".$nextrow)->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );
         
            
         $cols = array("A","B","C","D","E");
             
            $val = array("Problem","Sub Problem","Record Time","Duration","Description");
             
            for ($a=0;$a<5; $a++) 
            {
                $objset->setCellValue($cols[$a].$nextrow, $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].$nextrow)->applyFromArray($style);
            }


            $baris  = $nextrow+1;
            foreach ($ambildata3 as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
               


                $objset->setCellValue("A".$baris, $frow->problemname);
                $objset->setCellValue("B".$baris, $frow->subproblemname); 
                $objset->setCellValue("C".$baris, $frow->record_time); 
                $objset->setCellValue("D".$baris, gmdate("H:i:s",$frow->duration)); 
                $objset->setCellValue("E".$baris, $frow->description); 
                //Set number value
                //$objPHPExcel->getActiveSheet()->getStyle('A1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++;

            

            }



            $lastrow2 = count($ambildata)+6+3+count($ambildata3)+3;
                $nextrow2=$lastrow2+1;
                $objset->setCellValue("A".$lastrow2, "Breakdown & Equipment Failure Time ");

         $objget->getStyle("A".$nextrow2.":E".$nextrow2)->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );
         
            
         $cols = array("A","B","C","D","E");
             
            $val = array("Problem","Sub Problem","Record Time","Duration","Description");
             
            for ($a=0;$a<5; $a++) 
            {
                $objset->setCellValue($cols[$a].$nextrow2, $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].$nextrow2)->applyFromArray($style);
            }


            $baris  = $nextrow2+1;
            foreach ($ambildata4 as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
               

                $objset->setCellValue("A".$baris, $frow->problemname);
                $objset->setCellValue("B".$baris, $frow->subproblemname); 
                $objset->setCellValue("C".$baris, $frow->record_time); 
                $objset->setCellValue("D".$baris, gmdate("H:i:s",$frow->duration)); 
                $objset->setCellValue("E".$baris, $frow->description); 
                //Set number value
                //$objPHPExcel->getActiveSheet()->getStyle('A1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++;

}

                $lastrow3 = count($ambildata)+6+3+count($ambildata3)+3+count($ambildata4)+3;
                $nextrow3=$lastrow3+1;
                $nextnextrow=$lastrow3+2;
                $nextnextrow1=$lastrow3+3;
                $nextnextrow2=$lastrow3+4;

                foreach ($ambildata2 as $frow){

                $objset->setCellValue("A".$lastrow3, "Leader ");
                $objset->setCellValue("A".$nextrow3, "Operator1 ");
                $objset->setCellValue("A".$nextnextrow, "Operator2 ");
                $objset->setCellValue("B".$lastrow3, $frow->spvname);
                $objset->setCellValue("B".$nextrow3, $frow->opr1name);
                $objset->setCellValue("B".$nextnextrow, $frow->opr2name);
                $objset->setCellValue("C".$lastrow3, "Counter ");
                $objset->setCellValue("C".$nextrow3, "OEE");
                $objset->setCellValue("C".$nextnextrow, "Outer");
                $objset->setCellValue("C".$nextnextrow2, "MC Efficiency(%)");
                $objset->setCellValue("D".$lastrow3, $frow->counter);
                $objset->setCellValue("D".$nextrow3, $frow->counter/$frow->speed);
                $objset->setCellValue("D".$nextnextrow, $frow->counter/$frow->n_fib);
                $objset->setCellValue("D".$nextnextrow2, $frow->counter/(480*$frow->speed)*100);

            }

            foreach ($ambildata5 as $frow){
                $total1=$frow->duration;

            }

            foreach ($ambildata6 as $frow){
                $total2=$frow->duration;

            }

            $total=gmdate("H:i:s",($total1+$total2));

            $objset->setCellValue("C".$nextnextrow1, "Duration");
            $objset->setCellValue("D".$nextnextrow1, $total);
             
            $objPHPExcel->getActiveSheet()->setTitle('Data Export');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Data.xls");
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            //$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');     
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');          
            $objWriter->save('php://output');
        }else{
            redirect('Excel');
        }
    }



}
