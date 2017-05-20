<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tbl_mc_record extends CI_Model {

    public function __construct() {
        parent::__construct();
      
    }
    
    
    //************************** ARTIKEL ********************************//
        
    function export($shift,$id_spv,$datepicker){
    
    
     $sql = "select tbl_biglossrecord.id_biglossrecord,tbl_bigloss.name biglossname,tbl_biglossrecord.id_subbigloss,tbl_subbigloss.name subbiglossname,tbl_biglossrecord.record_time,
        tbl_biglossrecord.duration,tbl_biglossrecord.description,tbl_biglossrecord.id_mcrecord,tbl_mcrecord.id_spv,tbl_mcrecord.approval,tbl_admin.name spvname,tbl_mcrecord.shift,
        tbl_mcrecord.date from tbl_biglossrecord left join tbl_subbigloss on tbl_biglossrecord.id_subbigloss=tbl_subbigloss.id_subbigloss left join tbl_bigloss on tbl_subbigloss.id_bigloss=tbl_bigloss.id_bigloss left join tbl_mcrecord on tbl_biglossrecord.id_mcrecord=tbl_mcrecord.id_mcrecord left join tbl_admin on tbl_mcrecord.id_spv=tbl_admin.id_admin
        where tbl_mcrecord.approval=0 and tbl_mcrecord.id_spv='".$id_spv."' and tbl_mcrecord.shift='". $shift."' tbl_mcrecord.Date='".$datepicker."'";

$query = $this->db->query($sql);

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}