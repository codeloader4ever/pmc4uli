<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tbl_subbigloss extends CI_Model {

    public function __construct() {
        parent::__construct();
      
    }
    
    
    //************************** ARTIKEL ********************************//
        
    function export(){
        $query = $this->db->query("select tbl_subbigloss.id_subbigloss,tbl_subbigloss.id_bigloss,tbl_bigloss.name biglossname,tbl_bigloss.description biglossdesc,
		tbl_subbigloss.name subbiglossname,tbl_subbigloss.description subbiglossdesc from tbl_subbigloss left join tbl_bigloss on tbl_bigloss.id_bigloss=tbl_subbigloss.id_bigloss");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}