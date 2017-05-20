<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Export_tbl_problem_category extends CI_Controller {
    function __construct(){
        parent::__construct();
        //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model('tbl_problem_category'); // memanggil model mread
    }
    public function export(){
        $ambildata = $this->tbl_problem_category->export();
         
        if(count($ambildata)>0){
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("SAMSUL ARIFIN") //creator
                    ->setTitle("Programmer - Regional Planning and Monitoring, XL AXIATA");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('MC Number'); //sheet title
             
            $objget->getStyle("A1:B1")->applyFromArray(
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
            $cols = array("A","B");
             
            $val = array("ID Problem Category","Problem Category Name");
             
            for ($a=0;$a<2; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                
				
             
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
				$objset->setCellValue("A".$baris, $frow->id_problem_category);
                $objset->setCellValue("B".$baris, $frow->name); 
				
				
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