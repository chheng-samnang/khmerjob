<?php
class Job_m extends CI_Model
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
			$query=$this->db->query("SELECT c.cat_id,cat_name,cat_name_kh,COUNT(post_job_id) AS count
																FROM tbl_post_job p
																RIGHT JOIN tbl_category c ON p.cat_id=c.cat_id
																WHERE cat_type='jb' AND post_job_status='Published' OR post_job_status IS NULL
																GROUP BY cat_name ORDER BY cat_name");
			if($query->num_rows()>0){return $query->result();}
		}
	}

	public function sub_category($id="")
	{
		$search=$this->input->post("txtSearch");
		$location=$this->input->post("ddlLocation");
		if($id=="")
		{
			if(($search=="" OR $search==NULL) AND ($location=="" OR $location==NULL))
			{
				$query=$this->db->query("SELECT post_job_id,rate_det_type,job_title,DATE_FORMAT(end_date, '%d-%m-%Y') as end_date,acc_name
																	FROM tbl_post_job AS pj
																	INNER JOIN tbl_account AS acc ON pj.acc_id=acc.acc_id
																	INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id
																	WHERE post_job_status='Published' AND post_job_action='Done'
																	ORDER BY rate_det_type ASC,post_job_id DESC");
				if($query->num_rows()>0){return $query->result();}
			}
			elseif(($search!="" OR $search!=NULL) AND ($location=="" OR $location==NULL))
			{
				$query=$this->db->query("SELECT post_job_id,rate_det_type,job_title,end_date,acc_name FROM tbl_post_job AS pj INNER JOIN tbl_account AS acc ON pj.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE post_job_status='Published' AND post_job_action='Done' AND rate_det_type LIKE '%$search%' OR job_title LIKE '%$search%' OR acc_name LIKE '%$search%' OR end_date LIKE '%$search%' ORDER BY rate_det_type ASC,post_job_id DESC");
				if($query->num_rows()>0){return $query->result();}
			}
			elseif(($search=="" OR $search==NULL) AND ($location!="" OR $location!=NULL))
			{
				$query=$this->db->query("SELECT post_job_id,rate_det_type,job_title,end_date,acc_name FROM tbl_post_job AS pj INNER JOIN tbl_account AS acc ON pj.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE post_job_status='Published' AND post_job_action='Done' AND loc_id='{$location}' ORDER BY rate_det_type ASC, post_job_id DESC");
				if($query->num_rows()>0){return $query->result();}
			}
			else
			{
				$query=$this->db->query("SELECT post_job_id,rate_det_type,job_title,end_date,acc_name FROM tbl_post_job AS pj INNER JOIN tbl_account AS acc ON pj.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE post_job_status='Published' AND post_job_action='Done' AND (rate_det_type LIKE '%$search%' OR job_title LIKE '%$search%' OR acc_name LIKE '%$search%' OR end_date LIKE '%$search%') AND loc_id='$location' ORDER BY rate_det_type ASC,post_job_id DESC");
				if($query->num_rows()>0){return $query->result();}
			}
		}
		else
		{
			if(is_numeric($id))
			{
				$query=$this->db->query("SELECT post_job_id,rate_det_type,job_title,end_date,acc_name FROM tbl_post_job AS pj INNER JOIN tbl_account AS acc ON pj.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE post_job_status='Published' AND post_job_action='Done' AND cat_id='{$id}' ORDER BY rate_det_type ASC,post_job_id DESC");
				if($query->num_rows()>0){return $query->result();}
			}
			else//here id is string from home_search
			{
				$id1=str_replace('%20',' ',$id);
				$query=$this->db->query("SELECT post_job_id,rate_det_type,job_title,end_date,acc_name FROM tbl_post_job AS pj INNER JOIN tbl_account AS acc ON pj.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE post_job_status='Published' AND post_job_action='Done' AND rate_det_type LIKE '%$id1%' OR job_title LIKE '%$id1%' OR acc_name LIKE '%$id1%' OR end_date LIKE '%$id1%' ORDER BY rate_det_type ASC,post_job_id DESC");
				if($query->num_rows()>0){return $query->result();}
			}
		}
	}

	public function sub_category_by_acc_id($acc_id)
	{
		$query = $this->db->query("SELECT post_job_id,rate_det_type,job_title,end_date,acc_name FROM tbl_post_job AS pj INNER JOIN tbl_account AS acc ON pj.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE pj.acc_id='{$acc_id}' and post_job_status='published' ORDER BY rate_det_type ASC,post_job_id DESC");
		if($query->num_rows()>0)
		{
			return $query->result();
		}else {
			return array();
		}
	}
	public function update_notify($id="")
	{
		$data= array('notify' =>0);
		$this->db->where("post_job_id",$id);
		$this->db->update("tbl_post_job",$data);
	}
	public function feature($id="")
	{
		$query=$this->db->query("SELECT post_job_id,rate_det_type,job_title,end_date,acc_name FROM tbl_post_job AS pj INNER JOIN tbl_account AS acc ON pj.acc_id=acc.acc_id INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE acc_name='$id' ORDER BY rate_det_type ASC,post_job_id DESC");
		if($query->num_rows()>0){return $query->result();}
	}
	public function job_detail($id)
	{
		$query=$this->db->query("SELECT pj.*,loc_name,cat_name,acc_photo,acc_name,acc_desc FROM tbl_post_job AS pj INNER JOIN tbl_location AS loc ON pj.loc_id=loc.loc_id INNER JOIN tbl_category AS cat ON pj.cat_id=cat.cat_id INNER JOIN tbl_account AS acc ON pj.acc_id=acc.acc_id WHERE post_job_id='{$id}'");
			if($query->num_rows()>0){return $query->row();}
	}
	public function job_setup()
	{
		$query=$this->db->query("SELECT rd.duration,rd.price,rd.rate_det_id,CONCAT(rate_det_type,' ',rd.duration,' ','days') AS job_setup2
			FROM tbl_rate_detail AS rd
			INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id
			WHERE (rate_det_type='Premium' OR rate_det_type='Standard') AND rate_type='job'
			ORDER BY rate_det_type DESC,duration ASC");
		if($query->num_rows()>0){return $query->result();}
	}
	public function job_code($id="")
	{
		if($id=="")
		{
			$query=$this->db->query("SELECT max(job_code) AS job_code FROM tbl_post_job");
			if($query->num_rows()>0){return $query->row();}
			else{return "KJJB-000001";}
		}
		else
		{
			$query=$this->db->query("SELECT job_code FROM tbl_post_job WHERE post_job_id='{$id}'");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function count_job_by_acc()
	{
		$query=$this->db->query("SELECT COUNT(post_job_id) AS numbers FROM tbl_post_job WHERE acc_id={$this->account_login}");
		if($query->num_rows()>0){return $query->row();}
		else{return "01";}
	}
	public function account()
	{
		$query=$this->db->query("SELECT acc_desc,acc_name,acc_email,acc_phone,acc_addr,acc_photo FROM tbl_account WHERE acc_id={$this->account_login}");
		if($query->num_rows()>0){return $query->row();}
	}
	public function VAT()
	{
		$query=$this->db->query("SELECT key_code FROM tbl_sysdata WHERE key_type='VAT' ORDER BY key_id DESC");
		if($query->num_rows()>0){return $query->row();}
	}
	public function category()
	{
		$query=$this->db->query("SELECT cat_id,cat_name FROM tbl_category WHERE cat_type='jb'");
		if($query->num_rows()>0){return $query->result();}
	}
	public function location()
	{
		$query=$this->db->query("SELECT loc_id,loc_name FROM tbl_location ORDER BY loc_name='Phnom Penh' DESC,loc_name ASC");
		if($query->num_rows()>0){return $query->result();}
	}
	public function job_location($loc_id)
	{
		$query=$this->db->query("SELECT loc_name FROM tbl_location WHERE loc_id='$loc_id' ");
			if($query->num_rows()>0){return $query->row();}
	}
	public function job_category($cat_id)
	{
		$query=$this->db->query("SELECT cat_name FROM tbl_category WHERE cat_id='$cat_id'");
			if($query->num_rows()>0){return $query->row();}
	}
	public function post_history()
	{
		$query=$this->db->query("SELECT post_job_id,job_code,rate_det_type,job_title,DATE_FORMAT(posting_date, '%d/%m/%Y') AS posting_date,DATE_FORMAT(end_date, '%d/%m/%Y') AS end_date,DATE_FORMAT(DATE_ADD(posting_date, INTERVAL duration DAY),'%d/%m/%Y') AS expired_date,post_job_status,post_job_action FROM tbl_post_job AS pj INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE acc_id='{$this->account_login}' ORDER BY job_code");
		if($query->num_rows()>0){return $query->result();}
	}
	public function billing_info()
	{
		$query=$this->db->query("SELECT post_job_id,job_code,rate_det_type,job_2post_discount,price FROM tbl_post_job AS pj INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE acc_id='{$this->account_login}' AND post_job_status='Submited' AND process_payment='0' ORDER BY job_code");
		if($query->num_rows()>0){return $query->result();}
	}
	
	public function add_billing_info($id)
	{
		/*date_default_timezone_set('Asia/Phnom_Penh');
		$date=date('Y-m-d H:i:s');
		$data=array('acc_id' => $this->account_login,'type'=>'job','VAT'=>$this->input->post('VAT'),'pay_date'=>$date,'pay_by'=>$this->input->post('pay_by'));
		$query=$this->db->insert('tbl_payment',$data);
		if($query==TRUE)
		{
			$query=$this->db->query("SELECT pay_id FROM tbl_payment WHERE pay_date='{$date}'");
			$row=$query->row();//pay_id
			//insert process payment transaction
			$data=array("pay_id" =>$row->pay_id,"total"=>$this->input->post("grand_total"));
			$this->db->insert('tbl_payment_transaction',$data);
			$row1=$this->billing_info();//payment_detail
			$pre=$this->count_premium();
			$sta=$this->count_standard();
			foreach($row1 as $rows1)
			{
				$data=array(
							'pay_id' =>$row->pay_id,
							'post_code'=>$rows1->job_code,
							'price'=>$rows1->price,
							'discount'=>$rows1->rate_det_type=="Premium"?($pre->premium>=2?$b_info->job_2post_discount:0):($sta->standard>=2?$b_info->job_2post_discount:0),
							'priority'=>$rows1->rate_det_type
							);
				$query=$this->db->insert('tbl_payment_detail',$data);
				if($query==TRUE)
				{
					$data=array('post_job_status'=>$status,'post_job_action'=>$action);
					$this->db->where('job_code',$rows1->job_code);
					$query=$this->db->update('tbl_post_job',$data);
				}
			}

		}*/
		$data=array('post_job_status'=>'Pending','post_job_action'=>'Payment',);
		$this->db->where('post_job_id',$id);
		$query=$this->db->update('tbl_post_job',$data);

	}
	public function count_premium()
	{
		$query=$this->db->query("SELECT COUNT('rate_det_type') AS premium FROM tbl_post_job AS pj INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE acc_id='{$this->account_login}' AND rate_det_type='Premium' AND post_job_status='Submited' ");
		if($query->num_rows()>0){return $query->row();}
	}
	public function count_standard()
	{
		$query=$this->db->query("SELECT COUNT('rate_det_type') AS standard FROM tbl_post_job AS pj INNER JOIN tbl_rate_detail AS rd ON pj.priority=rd.rate_det_id WHERE acc_id='{$this->account_login}' AND rate_det_type='Standard' AND post_job_status='Submited	'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function check_published()
	{
		$query=$this->db->query("SELECT post_job_status FROM tbl_post_job WHERE job_code='{$this->input->post("txtJobID")}' AND (post_job_status='Published' OR post_job_status='Pending' OR post_job_status='Expired')");
		if($query->num_rows()>0){return TRUE;}
		else{return FALSE;}
	}
	public function format_date($format,$date)
	{
		$tz = new DateTimeZone('Asia/Bangkok');
		$tmp = date_create_from_format($format,$date,$tz);
		var_dump($date);
		if($tmp!==false)
		{
				return $result = $tmp->format('Y-m-d H:i:s');
		}else {
			return null;
		}
	}
	public function add($status="",$action="")
	{
		$post_date = date('Y-m-d',strtotime($this->input->post("txtPostingDate")));
		$end_date = date('Y-m-d',strtotime($this->input->post("txtEndDate")));
		$data= array(
						"job_code" =>$this->input->post("txtJobID"),
						"acc_id"	=>$this->account_login,
						"priority" => $this->input->post("ddlPriority"),
						"job_title" =>$this->input->post("txtJobTitle"),
						"job_desc" => $this->input->post("txtJobDes"),
						"job_requirement" => $this->input->post("txtJobRequirement"),
						"other_benefit" => $this->input->post("txtOtherBenefit"),
						"contact_name"=>$this->input->post("txtContactName"),
						"phone"=>$this->input->post("txtPhone"),
						"phone2" => $this->input->post("txtPhone2"),
						"email"=>$this->input->post("txtEmail"),
						"addr"=>$this->input->post("txtAddr"),
						"posting_date" =>$post_date,
						"end_date" => $end_date,
						"contract" => $this->input->post("ddlContract"),
						"edu" => $this->input->post("ddlEducation"),
						"gender" =>$this->input->post("ddlGender"),
						"age" => $this->input->post("ddlAge"),
						"salary_range" => $this->input->post("ddlSalaryRange"),
						"year_exp" => $this->input->post("ddlYearExp"),
						"edu" =>$this->input->post("ddlEducation"),
						"lang1" => $this->input->post("ddlLang1"),
						"lang2" => $this->input->post("ddlLang2"),
						"lang3" => $this->input->post("ddlLang3"),
						"lang4" =>$this->input->post("ddlLang4"),
						"hiring_qty" => $this->input->post("txtHiringQty"),
						"cat_id" => $this->input->post("ddlCategory"),
						"loc_id" => $this->input->post("ddlLocation"),
						"post_job_status" =>$status,
						"post_job_action" =>$action,
						"date_crea" =>$status=="Submited"?date("Y-m-d"):NULL,
					);
					 $query=$this->db->insert("tbl_post_job",$data);
					if($query==TRUE){return TRUE;}
	}

	public function get_saved($id)
	{
		$query=$this->db->query("SELECT pj.*,cat.cat_id,loc.loc_id FROM tbl_post_job as pj INNER JOIN tbl_category AS cat ON pj.cat_id=cat.cat_id INNER JOIN tbl_location AS loc ON pj.loc_id=loc.loc_id WHERE post_job_id='{$id}'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function edit($status="",$action="")
	{
		$data= array(
						"job_code" =>$this->input->post("txtJobID"),
						"priority" => $this->input->post("ddlPriority"),
						"job_title" =>$this->input->post("txtJobTitle"),
						"job_desc" => $this->input->post("txtJobDes"),
						"job_requirement" => $this->input->post("txtJobRequirement"),
						"other_benefit" => $this->input->post("txtOtherBenefit"),
						"contact_name"=>$this->input->post("txtContactName"),
						"phone"=>$this->input->post("txtPhone"),
						"email"=>$this->input->post("txtEmail"),
						"addr"=>$this->input->post("txtAddr"),
						"posting_date" =>$this->input->post("txtPostingDate"),
						"end_date" => $this->input->post("txtEndDate"),
						"contract" => $this->input->post("ddlContract"),
						"edu" => $this->input->post("ddlEducation"),
						"gender" =>$this->input->post("ddlGender"),
						"age" => $this->input->post("ddlAge"),
						"salary_range" => $this->input->post("ddlSalaryRange"),
						"year_exp" => $this->input->post("ddlYearExp"),
						"edu" =>$this->input->post("ddlEducation"),
						"lang1" => $this->input->post("ddlLang1"),
						"lang2" => $this->input->post("ddlLang2"),
						"lang3" => $this->input->post("ddlLang3"),
						"lang4" =>$this->input->post("ddlLang4"),
						"hiring_qty" => $this->input->post("txtHiringQty"),
						"cat_id" => $this->input->post("ddlCategory"),
						"loc_id" => $this->input->post("ddlLocation"),
						"post_job_status" =>$status,
						"post_job_action" =>$action,
						"date_crea" =>$status=="Submited"?date("Y-m-d"):NULL,
					);
		$this->db->where("job_code",$this->input->post("txtJobID"));
		$query=$this->db->update("tbl_post_job",$data);
		if($query==TRUE){return TRUE;}
	}
	public function check_bundle_package()
	{
		// $query=$this->db->query("SELECT bp.bp_id FROM tbl_post_job AS job INNER JOIN tbl_bundle_package AS bp ON job.acc_id=bp.acc_id WHERE job.acc_id='{$this->account_login}' AND bp.bp_status='Published'");
		$query=$this->db->query("SELECT bp_id FROM tbl_bundle_package WHERE acc_id='{$this->account_login}' AND bp_status='Published'");
		if($query->num_rows()>0){return TRUE;}
		else{return FALSE;}
	}
	public function check_premium_3()
	{
		$today=date("Y-m-d");
		$sub_month=date("Y-m-d",strtotime($today."-1 months"));
		// $query=$this->db->query("SELECT COUNT(job.priority) AS pre_3
		// 	FROM tbl_post_job AS job
		// 	INNER JOIN tbl_rate_detail AS rd
		// 	INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id
		// 	INNER JOIN tbl_bundle_package AS bp ON job.bp_id=bp.bp_id
		// 	WHERE (r.rate_type='job' AND rd.rate_det_type='Premium')
		// 	AND (job.date_crea BETWEEN $sub_month AND $today )
		// 	AND job.	acc_id='{$this->account_login}' AND (post_job_status='Published' OR post_job_status='Pending' OR post_job_status='Submited')
		// 	AND bp.bp_status='Published'");
		$query = $this->db->query("SELECT COUNT(rate_det_type) AS pre_3
																FROM tbl_post_job AS pj INNER JOIN tbl_rate_detail rd ON pj.priority = rd.`rate_det_id`
																WHERE rate_det_type='Premium' AND acc_id='{$this->account_login}' AND MONTHNAME(CURRENT_DATE())=MONTHNAME(posting_date)");
		if($query->num_rows()>0){return $query->row();}
		else{return FALSE;}
	}
	function check_priority_type($pr_id)
	{
		if($pr_id!=""){
			$query = $this->db->get_where("tbl_rate_detail",array("rate_det_id"=>$pr_id));
			if($query->num_rows()>0)
			{
				return $query->row();
			}else{
				return array();
			}
		}
	}
	public function edit_published()
	{
		$data= array(
						//"job_code" =>$this->input->post("txtJobID"),
						//"priority" => $this->input->post("ddlPriority"),
						"job_title" =>$this->input->post("txtJobTitle"),
						"job_desc" => $this->input->post("txtJobDes"),
						"job_requirement" => $this->input->post("txtJobRequirement"),
						"other_benefit" => $this->input->post("txtOtherBenefit"),
						"contact_name"=>$this->input->post("txtContactName"),
						"phone"=>$this->input->post("txtPhone"),
						"email"=>$this->input->post("txtEmail"),
						"addr"=>$this->input->post("txtAddr"),
						"posting_date" =>$this->input->post("txtPostingDate"),
						"end_date" => $this->input->post("txtEndDate"),
						"contract" => $this->input->post("ddlContract"),
						"edu" => $this->input->post("ddlEducation"),
						"gender" =>$this->input->post("ddlGender"),
						"age" => $this->input->post("ddlAge"),
						"salary_range" => $this->input->post("ddlSalaryRange"),
						"year_exp" => $this->input->post("ddlYearExp"),
						"edu" =>$this->input->post("ddlEducation"),
						"lang1" => $this->input->post("ddlLang1"),
						"lang2" => $this->input->post("ddlLang2"),
						"lang3" => $this->input->post("ddlLang3"),
						"lang4" =>$this->input->post("ddlLang4"),
						"hiring_qty" => $this->input->post("txtHiringQty"),
						"cat_id" => $this->input->post("ddlCategory"),
						"loc_id" => $this->input->post("ddlLocation"),
						//"post_job_status" =>$status,
						//"post_job_action" =>$action,
					);
		$this->db->where("job_code",$this->input->post("txtJobID"));
		$query=$this->db->update("tbl_post_job",$data);
		if($query==TRUE){return TRUE;}
		else{return FLASE;}
	}
	public function delete($id)
	{
		$this->db->where("post_job_id",$id);
		$query=$this->db->delete("tbl_post_job");
		if($query==TRUE){return TRUE;}
	}

	public function updateProcessPayment()
	{
		$billing = $this->billing_info();
		foreach ($billing as $key => $value)
		{
			$data = array(
										"process_payment"	=>	"1",
			);
			$this->db->where("post_job_id",$value->post_job_id);
			$this->db->update("tbl_post_job",$data);
		}
	}

}#end of class
?>
