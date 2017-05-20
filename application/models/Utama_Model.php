<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utama_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
      
    }
    

    
    function UbahPengguna($data,$id)
    {
    $this->db->where('id_admin',$id);
    $this->db->update('tbl_admin',$data);
    }
       
    
    function SemuaPenggunabyId($id) {
    $this->db->where('id_admin',$id);
    return $this->db->get('tbl_admin');
    }

    

    function SemuaMCNumber($shift,$id_spv,$datepicker) {
    $id_spv=$this->session->userdata('id_admin');
    $this->db->select('tbl_biglossrecord.id_biglossrecord,tbl_bigloss.name biglossname,tbl_biglossrecord.id_subbigloss,tbl_subbigloss.name subbiglossname,tbl_biglossrecord.record_time,
        tbl_biglossrecord.duration,tbl_biglossrecord.description,tbl_biglossrecord.id_mcrecord,tbl_mcrecord.id_spv,tbl_mcrecord.approval,tbl_admin.name spvname,tbl_mcrecord.shift,
        tbl_mcrecord.date' );
    

    $this->db->from('tbl_biglossrecord');
    $this->db->join('tbl_subbigloss','tbl_biglossrecord.id_subbigloss=tbl_subbigloss.id_subbigloss','left');
    $this->db->join('tbl_bigloss','tbl_subbigloss.id_bigloss=tbl_bigloss.id_bigloss','left');
    $this->db->join('tbl_mcrecord','tbl_biglossrecord.id_mcrecord=tbl_mcrecord.id_mcrecord','left');
    $this->db->join('tbl_admin','tbl_mcrecord.id_spv=tbl_admin.id_admin','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
   
   
    return  $this->db->get();
    }
        
    function CariMCNUmber($limit,$offset,$shift,$id_spv,$datepicker) {
    $id_spv=$this->session->userdata('id_admin');
    $this->db->select('tbl_biglossrecord.id_biglossrecord,tbl_bigloss.name biglossname,tbl_biglossrecord.id_subbigloss,tbl_subbigloss.name subbiglossname,tbl_biglossrecord.record_time,
        tbl_biglossrecord.duration,tbl_biglossrecord.description,tbl_biglossrecord.id_mcrecord,tbl_mcrecord.id_spv,tbl_mcrecord.approval,tbl_admin.name spvname,tbl_mcrecord.shift,
       tbl_mcrecord.date' );
  
    $this->db->from('tbl_biglossrecord');
    $this->db->join('tbl_subbigloss','tbl_biglossrecord.id_subbigloss=tbl_subbigloss.id_subbigloss','left');
    $this->db->join('tbl_bigloss','tbl_subbigloss.id_bigloss=tbl_bigloss.id_bigloss','left');
    $this->db->join('tbl_mcrecord','tbl_biglossrecord.id_mcrecord=tbl_mcrecord.id_mcrecord','left');
    $this->db->join('tbl_admin','tbl_mcrecord.id_spv=tbl_admin.id_admin','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
    
   
 $this->db->limit($limit,$offset,$shift,$id_spv,$datepicker);
    return  $this->db->get();
    }


function CariMCNotConfirmed($limit,$offset,$shift,$id_spv,$datepicker) {
    $id_spv=$this->session->userdata('id_admin');
    $this->db->select('not_confirmed_problem.id_problem,not_confirmed_problem.id_mcrecord,not_confirmed_problem.record_time,not_confirmed_problem.duration,
        tbl_problem.name problemname');
  
    $this->db->from('not_confirmed_problem');
    $this->db->join('tbl_problem','not_confirmed_problem.id_problem=tbl_problem.id_problem','left');
    $this->db->join('tbl_mcrecord','not_confirmed_problem.id_mcrecord=tbl_mcrecord.id_mcrecord','left');
    $this->db->join('tbl_admin','tbl_mcrecord.id_spv=tbl_admin.id_admin','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
    
   
 $this->db->limit($limit,$offset,$shift,$id_spv,$datepicker);
    return  $this->db->get();
    }



function CariMCProblem1($limit,$offset,$shift,$id_spv,$datepicker) {
    $$id_spv=$this->session->userdata('id_admin');
    $this->db->select('tbl_problrmrecord.id_problrmrecord,tbl_problrmrecord.id_problem_category,tbl_problrmrecord.id_subproblem,tbl_problrmrecord.id_mcrecord,
        tbl_problrmrecord.record_time,tbl_problrmrecord.duration,tbl_problrmrecord.description,tbl_subproblem.name subproblemname,tbl_problem.name problemname,tbl_mcrecord.id_spv,tbl_admin.name spvname');
  
    $this->db->from('tbl_mcrecord');
    $this->db->join('tbl_problrmrecord','tbl_mcrecord.id_mcrecord=tbl_problrmrecord.id_mcrecord','left');
    $this->db->join('tbl_subproblem','tbl_problrmrecord.id_subproblem=tbl_subproblem.id_subproblem','left');
    $this->db->join('tbl_problem','tbl_subproblem.id_problem=tbl_problem.id_problem','left');
    $this->db->join('tbl_admin','tbl_mcrecord.id_spv=tbl_admin.id_admin','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
    $this->db->where('tbl_problrmrecord.id_problem_category',1);
    
   
 $this->db->limit($limit,$offset,$shift,$id_spv,$datepicker);
    return  $this->db->get();
    }



function CariMCProblem2($limit,$offset,$shift,$id_spv,$datepicker) {
    $$id_spv=$this->session->userdata('id_admin');
    $this->db->select('tbl_problrmrecord.id_problrmrecord,tbl_problrmrecord.id_problem_category,tbl_problrmrecord.id_subproblem,tbl_problrmrecord.id_mcrecord,
        tbl_problrmrecord.record_time,tbl_problrmrecord.duration,tbl_problrmrecord.description,tbl_subproblem.name subproblemname,tbl_problem.name problemname,tbl_mcrecord.id_spv,tbl_admin.name spvname');
  
    $this->db->from('tbl_mcrecord');
    $this->db->join('tbl_problrmrecord','tbl_mcrecord.id_mcrecord=tbl_problrmrecord.id_mcrecord','left');
    $this->db->join('tbl_subproblem','tbl_problrmrecord.id_subproblem=tbl_subproblem.id_subproblem','left');
    $this->db->join('tbl_problem','tbl_subproblem.id_problem=tbl_problem.id_problem','left'); 
    $this->db->join('tbl_admin','tbl_mcrecord.id_spv=tbl_admin.id_admin','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
    $this->db->where('tbl_problrmrecord.id_problem_category',2);
    
   
 $this->db->limit($limit,$offset,$shift,$id_spv,$datepicker);
    return  $this->db->get();
    }


function SemuaMCRecord($shift,$id_spv,$datepicker) {
    $id_spv=$this->session->userdata('id_admin');
    $this->db->select('tbl_mcrecord.id_mcrecord,tbl_mcrecord.id_product,tbl_mcrecord.id_mc_number,tbl_mcrecord.id_spv,tbl_mcrecord.id_opr1,tbl_mcrecord.id_opr2,
        tbl_mcrecord.id_opr3,tbl_mcrecord.id_opr4,tbl_mcrecord.str_day,tbl_mcrecord.shift,tbl_mcrecord.counter,tbl_mcrecord.date,tbl_admin.name spvname,tbl_product.item_code,tbl_product.name productname,tbl_product.n_fb,tbl_mc_number.id_mc,tbl_mc_number_initial,tbl_mc_number.speed,tbl_mc.name mcname');
    $this->db->from('tbl_mcrecord');
    $this->db->join('tbl_admin','tbl_mcrecord.id_spv=tbl_admin.id_admin','left');
    $this->db->join('tbl_product','tbl_mcrecord.id_product=tbl_product.id_product','left');
    $this->db->join('tbl_mc_number','tbl_mcrecord.id_mc_number=tbl_mc_number.id_mc_number','left');
    $this->db->join('tbl_mc','tbl_mc_number.id_mc=tbl_mc.id_mc','left');  
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);

 
return  $this->db->get();


   }


function CariMCRecord($limit,$offset,$shift,$id_spv,$datepicker) {
    $id_spv=$this->session->userdata('id_admin');

    $this->db->select('tbl_mcrecord.id_mcrecord,tbl_mcrecord.id_product,tbl_mcrecord.id_mc_number,tbl_mcrecord.id_spv,tbl_mcrecord.id_opr1,tbl_mcrecord.id_opr2,
        tbl_mcrecord.id_opr3,tbl_mcrecord.id_opr4,tbl_mcrecord.str_day,tbl_mcrecord.shift,tbl_mcrecord.counter,tbl_mcrecord.date,tbl_admin.name spvname,
        tbl_product.item_code,tbl_product.name productname,tbl_mc_number.id_mc,tbl_mc_number.mc_initial,tbl_mc_number.speed,tbl_mc.name mcname,tbl_product.n_fib,
        tbl_opr1.name opr1name, tbl_opr2.name opr2name, tbl_opr3.name opr3name, tbl_opr4.name opr4name');
    $this->db->from('tbl_mcrecord');
    $this->db->join('tbl_admin','tbl_mcrecord.id_spv=tbl_admin.id_admin','left');
    $this->db->join('tbl_product','tbl_mcrecord.id_product=tbl_product.id_product','left');
    $this->db->join('tbl_mc_number','tbl_mcrecord.id_mc_number=tbl_mc_number.id_mc_number','left');
    $this->db->join('tbl_mc','tbl_mc_number.id_mc=tbl_mc.id_mc','left');  
    $this->db->join('tbl_opr tbl_opr1','tbl_mcrecord.id_opr1=tbl_opr1.id_opr','left');
    $this->db->join('tbl_opr tbl_opr2','tbl_mcrecord.id_opr2=tbl_opr2.id_opr','left');
    $this->db->join('tbl_opr tbl_opr3','tbl_mcrecord.id_opr3=tbl_opr3.id_opr','left');
    $this->db->join('tbl_opr tbl_opr4','tbl_mcrecord.id_opr4=tbl_opr4.id_opr','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);

  $this->db->limit($limit,$offset,$shift,$id_spv,$datepicker);
    return  $this->db->get();

   }

function TotalMCRecord1($limit,$offset,$shift,$id_spv,$datepicker) {
    $id_spv=$this->session->userdata('id_admin');

    $this->db->select_sum('tbl_biglossrecord.duration'); 
    $this->db->from('tbl_mcrecord');
    $this->db->join('tbl_biglossrecord','tbl_mcrecord.id_mcrecord=tbl_biglossrecord.id_mcrecord','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);

  $this->db->limit($limit,$offset,$shift,$id_spv,$datepicker);
    return  $this->db->get();

   }


   function TotalMCRecord2($limit,$offset,$shift,$id_spv,$datepicker) {
    $id_spv=$this->session->userdata('id_admin');

    
    $this->db->select_sum('tbl_problrmrecord.duration');
    $this->db->from('tbl_mcrecord');
    $this->db->join('tbl_problrmrecord','tbl_mcrecord.id_mcrecord=tbl_problrmrecord.id_mcrecord','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);

  $this->db->limit($limit,$offset,$shift,$id_spv,$datepicker);
    return  $this->db->get();

   }



function Approval($data,$shift,$id_spv,$datepicker)
    {
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
    $this->db->update('tbl_mcrecord',$data);
    }


function Export_Bigloss_Record($shift,$id_spv,$datepicker){

    $this->db->select('tbl_biglossrecord.id_biglossrecord,tbl_bigloss.name biglossname,tbl_biglossrecord.id_subbigloss,tbl_subbigloss.name subbiglossname,tbl_biglossrecord.record_time,
        tbl_biglossrecord.duration,tbl_biglossrecord.description,tbl_biglossrecord.id_mcrecord,tbl_mcrecord.id_spv,tbl_mcrecord.approval,tbl_admin.name spvname,tbl_mcrecord.shift,
        tbl_mcrecord.date' );
    
    $this->db->from('tbl_biglossrecord');
    $this->db->join('tbl_subbigloss','tbl_biglossrecord.id_subbigloss=tbl_subbigloss.id_subbigloss','left');
    $this->db->join('tbl_bigloss','tbl_subbigloss.id_bigloss=tbl_bigloss.id_bigloss','left');
    $this->db->join('tbl_mcrecord','tbl_biglossrecord.id_mcrecord=tbl_mcrecord.id_mcrecord','left');
    $this->db->join('tbl_admin','tbl_mcrecord.id_spv=tbl_admin.id_admin','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
    
    $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    
     
    

function Export_MC_Record($shift,$id_spv,$datepicker){
    
    
     $this->db->select('tbl_mcrecord.id_mcrecord,tbl_mcrecord.id_product,tbl_mcrecord.id_mc_number,tbl_mcrecord.id_spv,tbl_mcrecord.id_opr1,tbl_mcrecord.id_opr2,
        tbl_mcrecord.id_opr3,tbl_mcrecord.id_opr4,tbl_mcrecord.str_day,tbl_mcrecord.shift,tbl_mcrecord.counter,tbl_mcrecord.date,tbl_admin.name spvname,
        tbl_product.item_code,tbl_product.name productname,tbl_mc_number.id_mc,tbl_mc_number.mc_initial,tbl_mc_number.speed,tbl_mc.name mcname,tbl_product.n_fib,
        tbl_opr1.name opr1name, tbl_opr2.name opr2name, tbl_opr3.name opr3name, tbl_opr4.name opr4name');
    $this->db->from('tbl_mcrecord');
    $this->db->join('tbl_admin','tbl_mcrecord.id_spv=tbl_admin.id_admin','left');
    $this->db->join('tbl_product','tbl_mcrecord.id_product=tbl_product.id_product','left');
    $this->db->join('tbl_mc_number','tbl_mcrecord.id_mc_number=tbl_mc_number.id_mc_number','left');
    $this->db->join('tbl_mc','tbl_mc_number.id_mc=tbl_mc.id_mc','left');  
    $this->db->join('tbl_opr tbl_opr1','tbl_mcrecord.id_opr1=tbl_opr1.id_opr','left');
    $this->db->join('tbl_opr tbl_opr2','tbl_mcrecord.id_opr2=tbl_opr2.id_opr','left');
    $this->db->join('tbl_opr tbl_opr3','tbl_mcrecord.id_opr3=tbl_opr3.id_opr','left');
    $this->db->join('tbl_opr tbl_opr4','tbl_mcrecord.id_opr4=tbl_opr4.id_opr','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
    $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }


function Export_Problem1($shift,$id_spv,$datepicker){
      
     $this->db->select('tbl_problrmrecord.id_problrmrecord,tbl_problrmrecord.id_problem_category,tbl_problrmrecord.id_subproblem,tbl_problrmrecord.id_mcrecord,
        tbl_problrmrecord.record_time,tbl_problrmrecord.duration,tbl_problrmrecord.description,tbl_subproblem.name subproblemname,tbl_problem.name problemname,tbl_mcrecord.id_spv,tbl_admin.name spvname');
  
    $this->db->from('tbl_mcrecord');
    $this->db->join('tbl_problrmrecord','tbl_mcrecord.id_mcrecord=tbl_problrmrecord.id_mcrecord','left');
    $this->db->join('tbl_subproblem','tbl_problrmrecord.id_subproblem=tbl_subproblem.id_subproblem','left');
    $this->db->join('tbl_problem','tbl_subproblem.id_problem=tbl_problem.id_problem','left');
    $this->db->join('tbl_admin','tbl_mcrecord.id_spv=tbl_admin.id_admin','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
    $this->db->where('tbl_problrmrecord.id_problem_category',1);
    $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

function Export_Problem2($shift,$id_spv,$datepicker){
      
     $this->db->select('tbl_problrmrecord.id_problrmrecord,tbl_problrmrecord.id_problem_category,tbl_problrmrecord.id_subproblem,tbl_problrmrecord.id_mcrecord,
        tbl_problrmrecord.record_time,tbl_problrmrecord.duration,tbl_problrmrecord.description,tbl_subproblem.name subproblemname,tbl_problem.name problemname,tbl_mcrecord.id_spv,tbl_admin.name spvname');
  
    $this->db->from('tbl_mcrecord');
    $this->db->join('tbl_problrmrecord','tbl_mcrecord.id_mcrecord=tbl_problrmrecord.id_mcrecord','left');
    $this->db->join('tbl_subproblem','tbl_problrmrecord.id_subproblem=tbl_subproblem.id_subproblem','left');
    $this->db->join('tbl_problem','tbl_subproblem.id_problem=tbl_problem.id_problem','left');
    $this->db->join('tbl_admin','tbl_mcrecord.id_spv=tbl_admin.id_admin','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
    $this->db->where('tbl_problrmrecord.id_problem_category',2);
    $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }


function Export_Total1($shift,$id_spv,$datepicker){
      
    $this->db->select_sum('tbl_biglossrecord.duration'); 
    $this->db->from('tbl_mcrecord');
    $this->db->join('tbl_biglossrecord','tbl_mcrecord.id_mcrecord=tbl_biglossrecord.id_mcrecord','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
    $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }


function Export_Total2($shift,$id_spv,$datepicker){
      
    $this->db->select_sum('tbl_problrmrecord.duration');
    $this->db->from('tbl_mcrecord');
    $this->db->join('tbl_problrmrecord','tbl_mcrecord.id_mcrecord=tbl_problrmrecord.id_mcrecord','left');
    $this->db->where('tbl_mcrecord.shift',$shift);
    $this->db->where('tbl_mcrecord.id_spv',$id_spv);
    $this->db->where('tbl_mcrecord.approval',0);
    $this->db->where('tbl_mcrecord.date',$datepicker);
    $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

}
