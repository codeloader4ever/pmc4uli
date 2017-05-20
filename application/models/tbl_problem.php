<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tbl_problem extends CI_Model {

    public function __construct() {
        parent::__construct();
      
    }
    
    
    //************************** ARTIKEL ********************************//
        
    function export(){
        $query = $this->db->query("select tbl_problem.id_problem,tbl_problem.name problemname, tbl_problem.description problemdesc,tbl_problem.id_pamco, tbl_pamco.code, tbl_pamco.name pamconame,
	tbl_pamco.id_mc,tbl_mc.name mcname from tbl_problem left join tbl_pamco on tbl_pamco.id_pamco=tbl_problem.id_pamco left join tbl_mc on tbl_mc.id_mc=tbl_pamco.id_mc");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}