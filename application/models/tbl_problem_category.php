<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tbl_problem_category extends CI_Model {

    public function __construct() {
        parent::__construct();
      
    }
    
    
    //************************** ARTIKEL ********************************//
        
    function export(){
        $query = $this->db->query("select * from tbl_problem_category");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}