<?php
class Cv_m extends CI_Model
{
	var $account_login;
	public function __construct()
	{
		parent::__construct();
		$this->account_login=$this->session->acc_log1;
	}
	public function index($id="")
	{
		if($id=="")
		{
			$query=$this->db->query("SELECT c.cat_id,cat_name,COUNT(p.cat_id) AS count,cat_name_kh
																FROM tbl_post_cv p
																RIGHT JOIN tbl_category c ON p.cat_id=c.cat_id
																AND post_cv_status='Published' GROUP BY cat_name ORDER BY cat_name");
		 	if($query->num_rows()>0){return $query->result();}
		}
	}
	public function sub_category($id="")
	{
		$search=$this->input->post("txtSearch");
		$year_exp=$this->input->post("ddlYearExp");
		if($id=="")
		{
			if(($search!="" OR $search!=NULL) AND ($year_exp!="" OR $year_exp!=NULL) AND $year_exp!='unlimited')
			{
				$query=$this->db->query("SELECT post_cv_id,rate_det_type,photo,name,position FROM tbl_post_cv AS pcv INNER JOIN tbl_account AS acc ON pcv.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pcv.priority=rd.rate_det_id WHERE cv_status='1' AND post_cv_status='Published' AND (rate_det_type LIKE '%$search%' OR name LIKE '%$search%' OR position LIKE '%$search%') AND (year_exp='{$year_exp}') ORDER BY rate_det_type ASC, post_cv_id DESC");
				if($query->num_rows()>0){return $query->result();}
			}
			elseif(($search!="" OR $search!=NULL) AND ($year_exp=="" OR $year_exp==NULL))
			{
				$query=$this->db->query("SELECT post_cv_id,rate_det_type,photo,name,position FROM tbl_post_cv AS pcv INNER JOIN tbl_account AS acc ON pcv.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pcv.priority=rd.rate_det_id WHERE cv_status='1' AND post_cv_status='Published' AND (rate_det_type LIKE '%$search%' OR name LIKE '%$search%' OR position LIKE '%$search%') ORDER BY rate_det_type ASC, rate_det_type ASC, post_cv_id DESC");
				if($query->num_rows()>0){return $query->result();}
			}
			elseif(($search=="" OR $search==NULL) AND ($year_exp!="" OR $year_exp!=NULL))
			{
				if($year_exp!="unlimited"){
						$query=$this->db->query("SELECT post_cv_id,rate_det_type,photo,name,position FROM tbl_post_cv AS pcv INNER JOIN tbl_account AS acc ON pcv.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pcv.priority=rd.rate_det_id WHERE year_exp='{$year_exp}' AND cv_status='1' AND post_cv_status='Published' ORDER BY rate_det_type ASC, rate_det_type ASC, post_cv_id DESC");
				}else {
						$query=$this->db->query("SELECT post_cv_id,rate_det_type,photo,name,position FROM tbl_post_cv AS pcv INNER JOIN tbl_account AS acc ON pcv.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pcv.priority=rd.rate_det_id WHERE cv_status='1' AND post_cv_status='Published' ORDER BY rate_det_type ASC, rate_det_type ASC, post_cv_id DESC");
				}
				if($query->num_rows()>0){return $query->result();}
			}elseif(($search!="" OR $search!=NULL) AND ($year_exp!="" OR $year_exp!=NULL) AND $year_exp=='unlimited'){
				$query=$this->db->query("SELECT post_cv_id,rate_det_type,photo,name,position FROM tbl_post_cv AS pcv INNER JOIN tbl_account AS acc ON pcv.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pcv.priority=rd.rate_det_id WHERE cv_status='1' AND post_cv_status='Published' AND (rate_det_type LIKE '%$search%' OR name LIKE '%$search%' OR position LIKE '%$search%') ORDER BY rate_det_type ASC, post_cv_id DESC");
				if($query->num_rows()>0){return $query->result();}
			}
			else
			{
				$query=$this->db->query("SELECT post_cv_id,rate_det_type,photo,name,position FROM tbl_post_cv AS pcv INNER JOIN tbl_account AS acc ON pcv.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pcv.priority=rd.rate_det_id WHERE cv_status='1' AND post_cv_status='Published' ORDER BY rate_det_type ASC, pcv.date_update DESC");
				if($query->num_rows()>0){return $query->result();} //do when not search
			}
		}
		else
		{
			if(is_numeric($id))
			{
				$query=$this->db->query("SELECT post_cv_id,rate_det_type,photo,name,position FROM tbl_post_cv AS pcv INNER JOIN tbl_account AS acc ON pcv.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pcv.priority=rd.rate_det_id WHERE cat_id='{$id}' AND cv_status='1' AND post_cv_status='Published' ORDER BY rate_det_type ASC, post_cv_id DESC");
				if($query->num_rows()>0){return $query->result();}
			}
			else
			{
				$found = strpos($id,"%");
				if($found!==false){
					$id = $_SESSION["position"];
				}
				$query=$this->db->query("SELECT post_cv_id,rate_det_type,photo,name,position FROM tbl_post_cv AS pcv INNER JOIN tbl_account AS acc ON pcv.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pcv.priority=rd.rate_det_id WHERE cv_status='1' AND post_cv_status='Published' AND (rate_det_type LIKE '%$id%' OR name LIKE '%$id%' OR position LIKE '%$id%') ORDER BY rate_det_type ASC, post_cv_id DESC");
				if($query->num_rows()>0){return $query->result();}
			}
		}
	}

	public function count_premium()
	{
		$query=$this->db->query("SELECT COUNT('rate_det_type') AS premium FROM tbl_post_job AS pj INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE acc_id='{$this->account_login}' AND rate_det_type='Premium' AND post_job_status='Pending' ");
		if($query->num_rows()>0){return $query->row();}
	}
	public function count_standard()
	{
		$query=$this->db->query("SELECT COUNT('rate_det_type') AS standard FROM tbl_post_job AS pj INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE acc_id='{$this->account_login}' AND rate_det_type='Standard' AND post_job_status='Pending'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function check_published()
	{
		$query=$this->db->query("SELECT post_cv_status FROM tbl_post_cv WHERE cv_code='{$this->input->post("txtCvID")}' AND (post_cv_status='Published' OR post_cv_status='Pending' OR post_cv_status='Submited')");
		if($query->num_rows()>0){return TRUE;}
		else{return FALSE;}
	}
	public function check_standard()
	{
		$query=$this->db->query("SELECT rate_det_type FROM tbl_rate_detail WHERE rate_det_id='{$this->input->post("ddlPriority")}' AND rate_det_type='Standard'");
		if($query->num_rows()>0){return TRUE;}
	}
	public function check_hour()
	{
		$query=$this->db->query("SELECT hour FROM tbl_cv_paid_search WHERE acc_id='$this->account_login' AND cps_status='Published'");
		if($query->num_rows()>0){return $query->row();}
		else{return FALSE;}
	}
	public function cv_detail($id="")
	{
		$query=$this->db->query("SELECT cv.*,photo,cat_name,acc_company,position,acc_desc FROM tbl_post_cv AS cv  INNER JOIN tbl_category AS cat ON cv.cat_id=cat.cat_id INNER JOIN tbl_account AS acc ON cv.acc_id=acc.acc_id WHERE post_cv_id='{$id}'");
			if($query->num_rows()>0){return $query->row();}
	}/*===-----cv detauil===----*/
	public function preview_priority($rate_det_id="")
	{
		$query=$this->db->query("SELECT rate_det_type,duration,price FROM tbl_rate_detail WHERE rate_det_id='$rate_det_id'");
			if($query->num_rows()>0){return $query->row();}
	}
	public function update_countdown()
	{
		$this->db->query("UPDATE tbl_cv_paid_search SET cps_status='Expired',cps_action='Renew' WHERE acc_id='$this->account_login'");
	}
	public function cv_setup()
	{
		$query=$this->db->query("SELECT rate_det_id,CONCAT(rate_det_type,' ',duration,'days') AS cv_setup2 FROM tbl_rate_detail AS rd INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id WHERE (rate_det_type='Premium' OR rate_det_type='Standard') AND rate_type='cv' ORDER BY rate_det_type ASC, duration ASC");
		if($query->num_rows()>0){return $query->result();}
	}
	public function cv_code($id="")
	{
		if($id=="")
		{
			$query=$this->db->query("SELECT max(cv_code) AS cv_code FROM tbl_post_cv");
			if($query->num_rows()>0){return $query->row();}
			else{return "KJCV-000001";}
		}
		else
		{
			$query=$this->db->query("SELECT cv_code FROM tbl_post_cv WHERE cv_code='{$id}'");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function account()
	{
		$query=$this->db->query("SELECT acc_name,acc_company,acc_email,acc_phone,acc_addr,acc_photo FROM tbl_account WHERE acc_id={$this->account_login}");
		if($query->num_rows()>0){return $query->row();}
	}
	public function pCV_location($loc_id)
	{
		$query=$this->db->query("SELECT loc_idname FROM tbl_location WHERE loc_id='$loc_id' ");
			if($query->num_rows()>0){return $query->row();}
	}
	public function pCV_category($cat_id)
	{
		$query=$this->db->query("SELECT cat_name FROM tbl_category WHERE cat_id='$cat_id'");
			if($query->num_rows()>0){return $query->row();}
	}
	public function VAT()
	{
		$query=$this->db->query("SELECT key_code FROM tbl_sysdata WHERE key_type='VAT' ORDER BY key_id DESC");
		if($query->num_rows()>0){return $query->row();}
	}
	public function category()
	{
		$query=$this->db->query("SELECT cat_id,cat_name FROM tbl_category WHERE cat_type='cv'");
		if($query->num_rows()>0){return $query->result();}
	}
	public function billing_info()
	{
		$query=$this->db->query("SELECT post_cv_id,cv_code,rate_det_type,duration,price FROM tbl_post_cv AS pcv INNER JOIN tbl_rate_detail AS rd ON pcv.priority=rd.rate_det_id WHERE acc_id='{$this->account_login}' AND post_cv_status='Submited' ORDER BY cv_code");
		if($query->num_rows()>0){return $query->result();}
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
		$data=array('post_cv_status'=>'Pending');
		$this->db->where('post_cv_id',$id);
		$query=$this->db->update('tbl_post_cv',$data);
		if($query==TRUE){return TRUE;}
	}
	public function add($status="")
	{
		$year_exp = $this->input->post("txtExperience");

		$dob = $this->generateDate($this->input->post("txtDOB"));
		$data= array(
						"cv_code" =>$this->input->post("txtCvID"),
						"acc_id"	=>$this->account_login,
						"priority" => $this->input->post("ddlPriority"),
						"position" =>$this->input->post("txtPosition"),
						"salary" => $this->input->post("ddlExpSalary"),
						"cat_id" => $this->input->post("ddlCategory"),
						"year_exp"=>$this->input->post("ddlYearExp"),
						"name"=>$this->input->post("txtName"),
						"photo"=>$this->input->post("txtImgName"),
						"phone"=>$this->input->post("txtPhone"),
						"tel2"	=>	$this->input->post("txtPhone2"),
						"addr"=>$this->input->post("txtAddr"),
						"email"=>$this->input->post("txtEmail"),
						"fb" =>$this->input->post("txtFacebook"),
						"twitter" =>$this->input->post("txtTwitter"),
						"G1" => $this->input->post("txtG+1"),
						"linkedIn"	=>	$this->input->post("txtLinkedIn"),
						"dob" => $dob,
						"pob" => $this->input->post("txtPOB"),
						"gender" =>$this->input->post("ddlGender"),
						"marital_status" => $this->input->post("ddlMaritalSta"),
						"nationality" => $this->input->post("txtNationality"),
						"work_exp" => $year_exp,
						"edu" =>$this->input->post("txtEducation"),
						"lang" => $this->input->post("txtLanguage"),
						"computer" => $this->input->post("txtComputer"),
						"other_skill" => $this->input->post("txtOtherSkill"),
						"short_course" => $this->input->post("txtShortCouseTr"),
						"ref" => $this->input->post("txtReference"),
						"hobby" => $this->input->post("txtHobby"),
						"about_me" => $this->input->post("txtAboutMe"),
						"post_cv_status" =>$status,
						"cv_status"=>$this->input->post("cv_status")
					);
		$query=$this->db->insert("tbl_post_cv",$data);
		if($query==TRUE){return TRUE;}
	}
	public function get_saved($id="")
	{
		if($id!="")
		{

			$query=$this->db->query("SELECT pcv.*,cat.cat_id FROM tbl_post_cv AS pcv INNER JOIN tbl_category AS cat ON pcv.cat_id=cat.cat_id WHERE cv_code='{$id}'");
			if($query->num_rows()>0){return $query->row();}
			else{return FALSE;}
		}
		else//uniqe cv
		{
			$query=$this->db->query("SELECT pcv.*,cat.cat_id FROM tbl_post_cv AS pcv INNER JOIN tbl_category AS cat ON pcv.cat_id=cat.cat_id WHERE acc_id='{$this->account_login}'");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function edit($status="")
	{
		if(!empty($this->input->post('txtImgName')))
		{

			$row=$this->get_saved($this->input->post("txtCvID"));
			$dob = $this->generateDate($this->input->post("txtDOB"));
			//unlink("assets/uploads/".$row->photo);
			$data= array(
						"cv_code" =>$this->input->post("txtCvID"),
						"acc_id"	=>$this->account_login,
						"priority" => $this->input->post("ddlPriority"),
						"position" =>$this->input->post("txtPosition"),
						"salary" => $this->input->post("ddlExpSalary"),
						"cat_id" => $this->input->post("ddlCategory"),
						"year_exp"=>$this->input->post("ddlYearExp"),
						"name"=>$this->input->post("txtName"),
						"photo"=>$this->input->post('txtImgName'),
						"phone"=>$this->input->post("txtPhone"),
						"tel2"	=>	$this->input->post("txtPhone2"),
						"addr"=>$this->input->post("txtAddr"),
						"email"=>$this->input->post("txtEmail"),
						"fb" =>$this->input->post("txtFacebook"),
						"twitter" =>$this->input->post("txtTwitter"),
						"G1" => $this->input->post("txtG+1"),
						"linkedIn"	=>	$this->input->post("txtLinkedIn"),
						"dob" => $dob,
						"pob" => $this->input->post("txtPOB"),
						"gender" =>$this->input->post("ddlGender"),
						"marital_status" => $this->input->post("ddlMaritalSta"),
						"nationality" => $this->input->post("txtNationality"),
						"work_exp" => $this->input->post("txtExperience"),
						"edu" =>$this->input->post("txtEducation"),
						"lang" => $this->input->post("txtLanguage"),
						"computer" => $this->input->post("txtComputer"),
						"other_skill" => $this->input->post("txtOtherSkill"),
						"short_course" => $this->input->post("txtShortCouseTr"),
						"ref" => $this->input->post("txtReference"),
						"hobby" => $this->input->post("txtHobby"),
						"about_me" => $this->input->post("txtAboutMe"),
						"post_cv_status" =>$status,
						"cv_status"=>$this->input->post("cv_status"),
						"date_update"=>date("Y-m-d H:i:s"),
					);
		}
		else
		{
			$data= array(
						"cv_code" =>$this->input->post("txtCvID"),
						"acc_id"	=>$this->account_login,
						"priority" => $this->input->post("ddlPriority"),
						"position" =>$this->input->post("txtPosition"),
						"salary" => $this->input->post("ddlExpSalary"),
						"cat_id" => $this->input->post("ddlCategory"),
						"year_exp"=>$this->input->post("ddlYearExp"),
						"name"=>$this->input->post("txtName"),
						//"photo"=>$this->input->post('txtImgName'),
						"phone"=>$this->input->post("txtPhone"),
						"tel2"	=>	$this->input->post("txtPhone2"),
						"addr"=>$this->input->post("txtAddr"),
						"email"=>$this->input->post("txtEmail"),
						"fb" =>$this->input->post("txtFacebook"),
						"twitter" =>$this->input->post("txtTwitter"),
						"G1" => $this->input->post("txtG+1"),
						"linkedIn"	=>	$this->input->post("txtLinkedIn"),
						"dob" => $dob,
						"pob" => $this->input->post("txtPOB"),
						"gender" =>$this->input->post("ddlGender"),
						"marital_status" => $this->input->post("ddlMaritalSta"),
						"nationality" => $this->input->post("txtNationality"),
						"work_exp" => $this->input->post("txtExperience"),
						"edu" =>$this->input->post("txtEducation"),
						"lang" => $this->input->post("txtLanguage"),
						"computer" => $this->input->post("txtComputer"),
						"other_skill" => $this->input->post("txtOtherSkill"),
						"short_course" => $this->input->post("txtShortCouseTr"),
						"ref" => $this->input->post("txtReference"),
						"hobby" => $this->input->post("txtHobby"),
						"about_me" => $this->input->post("txtAboutMe"),
						"post_cv_status" =>$status,
						"cv_status"=>$this->input->post("cv_status"),
						"date_update"=>date("Y-m-d  H:i:s"),
					);
		}
		$this->db->where("cv_code",$this->input->post("txtCvID"));
		$query=$this->db->update("tbl_post_cv",$data);
		if($query==TRUE){return TRUE;}
	}
	public function generateDate($date)
	{
		$tmp =  $date;
		$d = substr($tmp,0,2);
		$m = substr($tmp,3,2);
		$y = substr($tmp,6,4);
		$tmp = $m."/".$d."/".$y;
		$date = date_create($tmp);
		$result = date_format($date,"Y-m-d");
		return $result;
	}
	public function edit_published()
	{
		$txtStatus = $this->input->post("txtStatus");
		$ddlPriority = $this->input->post("ddlPriority");
		$txtPriority = $this->input->post("txtPriority");
		$status = $txtPriority!=$ddlPriority?"Submited":$txtStatus;
		$dob = $this->generateDate($this->input->post("txtDOB"));

		if(!empty($this->input->post('txtImgName'))&&$this->input->post('txtImgName')!="")
		{

			$row=$this->get_saved($this->input->post("txtCvID"));
			// unlink("assets/uploads/".$row->photo);
			$work_exp = $this->input->post("txtExperience");

			$cv_status = $this->input->post("cv_status")!=null?$this->input->post("cv_status"):$row->cv_status;
			$data= array(
						//"cv_code" =>$this->input->post("txtCvID"),
						//"acc_id"	=>$this->account_login,
						"priority" => $this->input->post("ddlPriority"),
						"position" =>$this->input->post("txtPosition"),
						"salary" => $this->input->post("ddlExpSalary"),
						"cat_id" => $this->input->post("ddlCategory"),
						"year_exp"=>$this->input->post("ddlYearExp"),
						"name"=>$this->input->post("txtName"),
						"photo"=>$this->input->post('txtImgName'),
						"phone"=>$this->input->post("txtPhone"),
						"tel2"	=>	$this->input->post("txtPhone2"),
						"addr"=>$this->input->post("txtAddr"),
						"email"=>$this->input->post("txtEmail"),
						"fb" =>$this->input->post("txtFacebook"),
						"twitter" =>$this->input->post("txtTwitter"),
						"G1" => $this->input->post("txtG+1"),
						"linkedIn"	=>	$this->input->post("txtLinkedIn"),
						"dob" => $dob,
						"pob" => $this->input->post("txtPOB"),
						"gender" =>$this->input->post("ddlGender"),
						"marital_status" => $this->input->post("ddlMaritalSta"),
						"nationality" => $this->input->post("txtNationality"),
						"work_exp" => $work_exp,
						"edu" =>$this->input->post("txtEducation"),
						"lang" => $this->input->post("txtLanguage"),
						"computer" => $this->input->post("txtComputer"),
						"other_skill" => $this->input->post("txtOtherSkill"),
						"short_course" => $this->input->post("txtShortCouseTr"),
						"ref" => $this->input->post("txtReference"),
						"hobby" => $this->input->post("txtHobby"),
						"about_me" => $this->input->post("txtAboutMe"),
						//"post_cv_status" =>$status,
						"cv_status"=>$cv_status,
						"post_cv_status"	=>	$status,
						"date_update"=>date("Y-m-d H:i:s"),
					);
		}
		else
		{

			$data= array(
						//"cv_code" =>$this->input->post("txtCvID"),
						//"acc_id"	=>$this->account_login,
						"priority" => $this->input->post("ddlPriority"),
						"position" =>$this->input->post("txtPosition"),
						"salary" => $this->input->post("ddlExpSalary"),
						"cat_id" => $this->input->post("ddlCategory"),
						"year_exp"=>$this->input->post("ddlYearExp"),
						"name"=>$this->input->post("txtName"),
						//"photo"=>$this->input->post('txtImgName'),
						"phone"=>$this->input->post("txtPhone"),
						"tel2"	=>	$this->input->post("txtPhone2"),
						"addr"=>$this->input->post("txtAddr"),
						"email"=>$this->input->post("txtEmail"),
						"fb" =>$this->input->post("txtFacebook"),
						"twitter" =>$this->input->post("txtTwitter"),
						"G1" => $this->input->post("txtG+1"),
						"linkedIn"	=>	$this->input->post("txtLinkedIn"),
						"dob" => $dob,
						"pob" => $this->input->post("txtPOB"),
						"gender" =>$this->input->post("ddlGender"),
						"marital_status" => $this->input->post("ddlMaritalSta"),
						"nationality" => $this->input->post("txtNationality"),
						"work_exp" => $this->input->post("txtExperience"),
						"edu" =>$this->input->post("txtEducation"),
						"lang" => $this->input->post("txtLanguage"),
						"computer" => $this->input->post("txtComputer"),
						"other_skill" => $this->input->post("txtOtherSkill"),
						"short_course" => $this->input->post("txtShortCouseTr"),
						"ref" => $this->input->post("txtReference"),
						"hobby" => $this->input->post("txtHobby"),
						"about_me" => $this->input->post("txtAboutMe"),
						"post_cv_status" =>$status,
						"cv_status"=>$cv_status,
						"date_update"=>date("Y-m-d  H:i:s"),
					);
		}

		$this->db->where("cv_code",$this->input->post("txtCvID"));
		$query=$this->db->update("tbl_post_cv",$data);
		if($query==TRUE){return $query;}
	}
	public function delete($id)
	{
		$row=$this->get_saved($this->input->post("txtCvID"));
		unlink("assets/uploads/".$row->photo);
		$this->db->where("cv_code",$id);
		$query=$this->db->delete("tbl_post_cv");
		if($query==TRUE){return TRUE;}
	}

	public function check_payment_status($id) //ret_det_id
	{
		$query = $this->db->get_where("tbl_rate_detail",array("rate_det_id"=>$id));
		if($query->num_rows()>0)
		{
			$result = $query->row()->rate_det_type=="Standard"?false:true;
			return $result;
		}
	}
}
?>
