<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Skill_m extends CI_Model
{
  var $account_login;
    public function __construct()
    {
      parent::__construct();
      $this->account_login=$this->session->acc_log1;
    }    
    public function get_category($id="")
    {    
      if($id=="")
        {     
          $query=$this->db->query("SELECT cat.cat_id,cat_name,cat_name_kh,COUNT(post_skill_id) AS count FROM tbl_post_skill AS sk INNER JOIN tbl_category AS cat ON sk.cat_id=cat.cat_id WHERE cat_type='sk' AND post_skill_status='Published' GROUP BY cat.cat_id ORDER BY cat_name");
          if($query->num_rows()>0){return $query->result();}
           else{ return FALSE;}      
        }                    
    }
    public function location($id="")
    {
      if($id=="")
      {
        $this->db->select("loc_id,loc_name");
        $query = $this->db->get("tbl_location");
        if($query->num_rows()>0)
        {
          return $query->result();
        }else {
          return array();
        }  
      }
      else
      {
         $this->db->where("loc_id",$id);
         $this->db->select("loc_name");
        $query = $this->db->get("tbl_location");
        if($query->num_rows()>0)
        {
          return $query->row();
        }else {
          return array();
        } 
      }
        
    }
    public function get_subCategory($id="")
    {
      $search=$this->input->post("txtSearch");
      $location=$this->input->post("ddlLocation");
      if($id=="")
      {
        if(($search!="" OR $search!=NULL) AND ($location!="" OR $location!=NULL))
  			{
  				$query=$this->db->query("SELECT skd.skill_det_id,rate_det_type,skill_det_name,NAME,loc_name FROM tbl_post_skill AS ps INNER JOIN tbl_account AS acc ON ps.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON ps.priority=rd.rate_det_id INNER JOIN tbl_post_skill_detail AS skd ON ps.post_skill_id= skd.post_skill_id inner JOIN tbl_location AS l ON ps.loc_id=l.loc_id WHERE (rate_det_type LIKE '%$search%' OR skill_det_name LIKE '%$search%' OR name LIKE '%$search%' OR loc_name) AND post_skill_status='Published' ORDER BY rate_det_type ASC, ps.post_skill_id DESC");
  				if($query->num_rows()>0){return $query->result();}
  			}
  			elseif(($search!="" OR $search!=NULL) AND ($location=="" OR $location==NULL))
  			{
  				$query=$this->db->query("SELECT skd.skill_det_id,rate_det_type,skill_det_name,NAME,loc_name FROM tbl_post_skill AS ps INNER JOIN tbl_account AS acc ON ps.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON ps.priority=rd.rate_det_id Inner JOIN tbl_post_skill_detail AS skd ON ps.post_skill_id= skd.post_skill_id inner JOIN tbl_location AS l ON ps.loc_id=l.loc_id WHERE (rate_det_type LIKE '%$search%' OR skill_det_name LIKE '%$search%' OR name LIKE '%$search%') AND post_skill_status='Published' ORDER BY rate_det_type ASC, ps.post_skill_id DESC");
  				if($query->num_rows()>0){return $query->result();}
  			}
  			elseif(($search=="" OR $search==NULL) AND ($location!="" OR $location!=NULL))
  			{
  				$query=$this->db->query("SELECT skd.skill_det_id,rate_det_type,skill_det_name,NAME,loc_name FROM tbl_post_skill AS ps INNER JOIN tbl_rate_detail AS rd ON ps.priority=rd.rate_det_id Inner JOIN tbl_post_skill_detail AS skd ON ps.post_skill_id= skd.post_skill_id inner JOIN tbl_location AS l ON ps.loc_id=l.loc_id WHERE loc_name='$location' AND post_skill_status='Published' ORDER BY rate_det_type ASC, ps.post_skill_id DESC");
  				if($query->num_rows()>0){return $query->result();}         
  			}
        else
        {
            $query=$this->db->query("SELECT skd.skill_det_id,rate_det_type,skill_det_name,NAME,loc_name FROM tbl_post_skill AS ps INNER JOIN tbl_rate_detail AS rd ON ps.priority=rd.rate_det_id Inner JOIN tbl_post_skill_detail AS skd ON ps.post_skill_id= skd.post_skill_id inner JOIN tbl_location AS l ON ps.loc_id=l.loc_id WHERE post_skill_status='Published' ORDER BY rate_det_type ASC, ps.post_skill_id DESC");
            if($query->num_rows()>0){return $query->result();}          
        }
    }
    else
    {
      if(is_numeric($id))
      {
          $query=$this->db->query("SELECT skd.skill_det_id,rate_det_type,skill_det_name,NAME,loc_name FROM tbl_post_skill AS ps INNER JOIN tbl_rate_detail AS rd ON ps.priority=rd.rate_det_id Inner JOIN tbl_post_skill_detail AS skd ON ps.post_skill_id= skd.post_skill_id inner JOIN tbl_location AS l ON ps.loc_id=l.loc_id WHERE cat_id='$id' AND post_skill_status='Published' AND skd.skill_det_id='$id' ORDER BY rate_det_type ASC,ps.post_skill_id DESC");
        if($query->num_rows()>0){return $query->result();}
      }      
      else
      {
        $id1=str_replace('%20',' ',$id);
        $query=$this->db->query("SELECT skd.skill_det_id,rate_det_type,skill_det_name,NAME,loc_name FROM tbl_post_skill AS ps INNER JOIN tbl_account AS acc ON ps.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON ps.priority=rd.rate_det_id Inner JOIN tbl_post_skill_detail AS skd ON ps.post_skill_id= skd.post_skill_id inner JOIN tbl_location AS l ON ps.loc_id=l.loc_id WHERE (rate_det_type LIKE '%$id1%' OR skill_det_name LIKE '%$id1%' OR name LIKE '%$id1%' OR loc_name LIKE '%$id1%') AND post_skill_status='Published' ORDER BY rate_det_type ASC, ps.post_skill_id DESC");
          if($query->num_rows()>0){return $query->result();}
      }
    }
}
    public function skill_detail($id="")
    {
      $query=$this->db->query("SELECT skd.skill_det_id,skd.skill_det_name,googleMap,sk.img,sk.about_me,website,whatApp,sk.line,sk.email,sk.phone,sk.addr,sk.name,service_provider,employee
        FROM tbl_post_skill AS sk INNER JOIN tbl_post_skill_detail AS skd ON sk.post_skill_id=skd.post_skill_id WHERE skd.skill_det_id='$id'");
      if($query->num_rows()>0){return $query->row();}
      else{return FALSE;}
    }     
    public function skill_code()
    {
      $max_skill = $this->db->query("SELECT IFNULL(MAX(skill_code),0) AS skill_code FROM tbl_post_skill");
      if($max_skill->num_rows()>0&&$max_skill->row()->skill_code=="0")
      {
        return "KJSK-000001";
      }else {
        $code = $max_skill->row()->skill_code;
        $tmp = intval(substr($code,5,strlen($code)-5))+1;
        $tmp = str_pad($tmp,6,"0",STR_PAD_LEFT);
        return "KJSK-".$tmp;
      }
    }
    public function add_billing_info($id)
  {
    /*date_default_timezone_set('Asia/Phnom_Penh');
    $date=date('Y-m-d H:i:s');
    $data=array('acc_id' => $this->account_login,'type'=>'cv','VAT'=>$this->input->post('VAT'),'pay_date'=>$date,'pay_by'=>'wing');
    $query=$this->db->insert('tbl_payment',$data);
    if($query==TRUE)
    {
      $query=$this->db->query("SELECT pay_id FROM tbl_payment WHERE pay_date='{$date}'");
      $row=$query->row();//pay_id
      //insert process payment transaction
      $data=array("pay_id" =>$row->pay_id,"total"=>$this->input->post("grand_total"));      
      $this->db->insert('tbl_payment_transaction',$data);
      $row1=$this->billing_info();//payment_detail      
      foreach($row1 as $rows1)
      {
        $data=array(
              'pay_id' =>$row->pay_id,
              'post_code'=>$rows1->cv_code,
              'price'=>$rows1->price,
              'duration'=>$rows1->duration,                           
              'priority'=>$rows1->rate_det_type
              );
        $query=$this->db->insert('tbl_payment_detail',$data);
        if($query==TRUE)
        {
          $data=array('post_cv_status'=>$status);
          $this->db->where('cv_code',$rows1->cv_code);
          $query=$this->db->update('tbl_post_cv',$data);          
        }
      }

    }*/
    $data=array('post_skill_status'=>'Pending');
    $this->db->where('post_skill_id',$id);
    $query=$this->db->update('tbl_post_skill',$data);
    if($query==TRUE){return TRUE;}      
  }    

    public function skill_setup($id="")
    {
      if($id=="")
      {
        $query=$this->db->query("SELECT rate_det_id,rate_det_type,duration FROM tbl_rate_detail AS rd INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id WHERE (rate_det_type='Premium' OR rate_det_type='Standard') AND rate_type='skill' ORDER BY rate_det_type");
        if($query->num_rows()>0){return $query->result();}
      }
      else
      {
        $query=$this->db->query("SELECT rate_det_type,duration FROM tbl_rate_detail WHERE rate_det_id='$id'");
        if($query->num_rows()>0){return $query->row();}
      }      
    }
    public function category($id="")
    {
      if($id=="")
      {
        $this->db->where("cat_type","sk");
        $query = $this->db->get("tbl_category");
        if($query->num_rows()>0)
        {
          return $query->result();
        }else {
          return array();
        }
      }
      else
      {
        $this->db->where("cat_id",$id);
        $query = $this->db->get("tbl_category");
        if($query->num_rows()>0)
        {
          return $query->row();
        }else {
          return array();
        }
      }
      
    }

    public function account()
  	{
  		$query=$this->db->query("SELECT acc_name,acc_company,acc_email,acc_phone,acc_addr,acc_photo FROM tbl_account WHERE acc_id={$this->account_login}");
  		if($query->num_rows()>0){return $query->row();}
  	}
    public function post_history()
    {   
      $query=$this->db->query("SELECT post_skill_id,skill_code,duration,price,rate_det_type,sk.date_crea,sk.post_skill_status FROM tbl_post_skill AS sk INNER JOIN tbl_rate_detail AS rd ON sk.priority=rd.rate_det_id WHERE sk.acc_id='{$this->account_login}'");
      if($query->num_rows()>0){return $query->result();}
      else{return FALSE;}
    }
    public function delete($id="")
    {
      $row=$this->get_saved($id);      
      unlink("assets/uploads/".$row->img);
      $query=$this->db->query("DELETE FROM tbl_post_skill WHERE post_skill_id='$id'");
      if($query==TRUE)
      {
        $query=$this->db->query("DELETE FROM tbl_post_skill_detail WHERE post_skill_id='$id'");
        if($query==TRUE){return TRUE;}
      }
    }
    public function check_standard()
    {
       $query=$this->db->query("SELECT rate_det_type FROM tbl_rate_detail WHERE rate_det_id='{$this->input->post("ddlPriority")}'");
        if($query->num_rows()>0){return $query->row();}
    }
    public function insertSkill($jsonData = array(),$status="")
    {
      $chk = $this->input->post("chkbox");
      $skillCode = "";
      if(!empty($chk))
      {
      $e = array_search("e",$chk)!==false?1:0;
      $sp = array_search("s",$chk)!==false?1:0;
      $data = array(
                    "acc_id"  =>  $this->account_login,
                    "skill_code"  => $this->input->post("txtSkillID"),
                    "priority"  =>  $this->input->post("ddlPriority"),
                    "cat_id"  =>  $this->input->post("ddlCategory"),
                    "loc_id"  =>  $this->input->post("ddlLocation"),
                    "post_skill_status" =>  $status,
                    "service_provider"  =>  $sp,
                    "employee"  =>  $e,
                    "name"  =>  $this->input->post("txtName"),
                    "addr"  =>  $this->input->post("txtAddress"),
                    "phone" =>  $this->input->post("txtTel"),
                    "email" =>  $this->input->post("txtEmail"),
                    "line"  =>  $this->input->post("txtLine"),
                    "whatApp" =>  $this->input->post("txtWhatsapp"),
                    "website" =>  $this->input->post("txtWebsite"),
                    "about_me" => $this->input->post("txtAboutMe"),
                    "img" =>  $this->input->post("txtImgName"),
                    "googleMap" =>  $this->input->post("txtGoogle")
      );
      $this->db->insert("tbl_post_skill",$data);

      $query = $this->db->get_where("tbl_post_skill",array("skill_code"=>$this->input->post("txtSkillID")));
      if($query->num_rows()>0)
      {
        $skillID = $query->row()->post_skill_id;
      }

      foreach ($jsonData as $key => $value) {
        $data = array(
                      "post_skill_id" =>  $skillID,
                      "skill_det_name"  =>  $value
        );
        $this->db->insert("tbl_post_skill_detail",$data);
      }

    }else
    {
      echo "Please check whether you are a Service Provider or an Employee";
    }

  }
  public function skill_name()
  {
    $query=$this->db->query("SELECT skill_det_name FROM tbl_post_skill_detail AS skd 
      INNER JOIN tbl_post_skill AS sk ON skd.post_skill_id=sk.post_skill_id WHERE sk.acc_id='$this->account_login'");
    if($query->num_rows()>0){return $query->result();}
    else{return FALSE;}
  }
 public function get_saved($id="")
 {
  if($id=="")
  {
      $query=$this->db->query("SELECT post_skill_id,skill_code,priority,cat_id,loc_id,post_skill_status,service_provider,employee,name,addr,phone,email,sk.line,whatApp,website,about_me,img,googleMap
      FROM tbl_post_skill AS sk WHERE acc_id='{$this->account_login}'");
    if($query->num_rows()>0){return $query->row();}
    else{return FALSE;}
  }
  else
  {
    $query=$this->db->query("SELECT img FROM tbl_post_skill WHERE post_skill_id='$id'");
    if($query->num_rows()>0){return $query->row();}
  }
 }
  public function get_skill($acc_id)
  {
    $query = $this->db->get_where("tbl_post_skill",array("acc_id"=>$acc_id,"post_skill_status"=>"0"));
    if ($query->num_rows()>0) {
      return $query->result();
    }else {
      return array();
    }
  }
  public function billing_info()
  {
   $query=$this->db->query("SELECT post_skill_id,skill_code,rate_det_type,duration,price FROM tbl_post_skill AS sk 
    INNER JOIN tbl_rate_detail AS rd ON sk.priority=rd.rate_det_id WHERE acc_id='{$this->account_login}' AND rate_det_type='Premium'");
  if($query->num_rows()>0){return $query->result();}
  else{return FALSE;}    
  }
}
?>
