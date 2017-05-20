<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tbl_mc_number extends CI_Model {

    public function __construct() {
        parent::__construct();
      
    }
    
    
    //************************** ARTIKEL ********************************//
        
    function export(){
        $query = $this->db->query("SELECT tbl_mc_number.id_mc_number,tbl_mc_number.id_mc,tbl_mc.name mcname,tbl_mc_number.mc_initial,tbl_mc_number.speed,tbl_spv.name resp from 
		tbl_mc_number left join tbl_mc on tbl_mc.id_mc=tbl_mc_number.id_mc left join tbl_spv on tbl_spv.id_spv=tbl_mc_number.resp");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}