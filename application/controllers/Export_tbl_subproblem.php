<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Export_tbl_subproblem extends CI_Controller {
    function __construct(){
        parent::__construct();
        //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model('tbl_subproblem'); // memanggil model mread
    }
    public function export(){
        $ambildata = $this->tbl_subproblem->export();
         
        if(count($ambildata)>0){
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("SAMSUL ARIFIN") //creator
                    ->setTitle("Programmer - Regional Planning and Monitoring, XL AXIATA");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('MC Number'); //sheet title
             
            $objget->getStyle("A1:K1")->applyFromArray(
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
            $cols = array("A","B","C","D","E","F","G","H","I","J","K");
             
            $val = array("ID Sub Problem","Sub Problem Name","Sub Problem Desc","ID Problem","Problem Name","Problem Desc","ID Pamco","Pamco Code","Pamco Name","Pamco Desc","ID MC","MC Name");
             
            for ($a=0;$a<11; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
             
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }
             
            $baris  = 2;
            foreach ($ambildata as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $frow->id_subproblem); //membaca data nama
                $objset->setCellValue("B".$baris, $frow->subproblemname); //membaca data alamat
                $objset->setCellValue("C".$baris, $frow->subproblemdesc);
				$objset->setCellValue("D".$baris, $frow->id_problem);
                $objset->setCellValue("E".$baris, $frow->problemname); 
				$objset->setCellValue("F".$baris, $frow->problemdesc); 
				$objset->setCellValue("G".$baris, $frow->id_pamco); 
				$objset->setCellValue("H".$baris, $frow->code); 
				$objset->setCellValue("I".$baris, $frow->pamconame); 
				$objset->setCellValue("J".$baris, $frow->id_mc); 
				$objset->setCellValue("K".$baris, $frow->mcname); 
				
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++;
            }
             
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