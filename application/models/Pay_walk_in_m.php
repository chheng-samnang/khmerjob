<?php
class Pay_walk_in_m extends CI_Model
{			
	var $userCrea;		
	public function __construct()
	{
		parent::__construct();
		$this->account_login=$this->session->acc_log1;
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";				
	}
	public function index($acc_code="")
	{
		$acc_code=$this->input->post("acc_code");		
		$query=$this->db->query("SELECT acc_id FROM tbl_account WHERE acc_code='$acc_code'");
		if($query->num_rows()>0){return $query->row();}else{return FALSE;}
	}
	public function count_top()
	{   	
		if($acc_id=$this->index()->acc_id){
			$query=$this->db->query("SELECT COUNT('rate_det_type') AS top FROM tbl_post_ads AS pads INNER JOIN tbl_rate_detail AS rd ON pads.ads_type=rd.rate_det_id WHERE acc_id='$acc_id' AND rate_det_type='Top' AND post_ads_status='Pending' ");		
			if($query->num_rows()>0){return $query->row();}	
		}
	}
	public function count_side()
	{	if($acc_id=$this->index()->acc_id){
			$query=$this->db->query("SELECT COUNT('rate_det_type') AS side FROM tbl_post_ads AS pads INNER JOIN tbl_rate_detail AS rd ON pads.ads_type=rd.rate_det_id WHERE acc_id='$acc_id' AND rate_det_type='Side' AND post_ads_status='Pending'");		
			if($query->num_rows()>0){return $query->row();}	
		}
	}
	public function account($acc_code="")
	{
		$query=$this->db->query("SELECT acc_code FROM tbl_account WHERE acc_code='$acc_code'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function addPay_walk()
	{	
		$post_type=$this->input->post("post_type");
		date_default_timezone_set('Asia/Phnom_Penh');
		$date=date('Y-m-d H:i:s');

		$post_type=$this->input->post("post_type");
		$payment = array(
			'acc_id'=>$this->input->post("txtAccId"),
			'VAT'=>$this->input->post("VAT"),
			'type'=>$post_type,
			'pay_by'=>"walk_in",
			'pay_date'=>$date
		);
		$query=$this->db->insert("tbl_payment",$payment);
		/*=======payment=========*/
		$this->walk_in_detail(); /*call walk_in_detail function*/

		$query=$this->db->query("SELECT pay_id FROM tbl_payment WHERE pay_date='{$date}'");
		$pay_id=$query->row();//pay_id	

	    $pay_transation = array
		(
		'pay_id'=>$pay_id->pay_id,
		'cash' =>$this->input->post("txtCash"),
		'exchange' => $this->input->post("txtEchange"),
		'total' => $this->input->post("txtExtotal"),
		);
		 $query=$this->db->insert("tbl_payment_transaction",$pay_transation);
		 /*=========paymante_transaction=========*/
		    $acc_id=$this->input->post("txtAccId");
		 	if($post_type=="job")
		 	{	
		 		$data= array(
		 			"post_job_status" =>'Published',
		 			"post_job_action" =>'Done'
		 			);				
				$this->db->where("acc_id",$acc_id);
				$query=$this->db->update("tbl_post_job",$data);
				if($query==TRUE){return TRUE;}
		 	}
			if($post_type=="cv")
			{	
				$data= array("post_cv_status" =>'Published',"date_update"=>$date);				
				$this->db->where("acc_id",$acc_id);
				$query=$this->db->update("tbl_post_cv",$data);
				if($query==TRUE){return TRUE;}
			}
			if($post_type=="skill")
			{
				$data= array(
					"post_skill_status" =>'Published',
					"date_update"=>$date
					);
				$this->db->where("acc_id",$acc_id);
				$query=$this->db->update("tbl_post_skill",$data);
				if($query==TRUE){return TRUE;}
			}
			if($post_type=="ads")
			{	
				$data= array("post_ads_status" =>'Published',"post_ads_action" =>'Done');				
				$this->db->where("acc_id",$acc_id);
				$query=$this->db->update("tbl_post_ads",$data);
				if($query==TRUE){return TRUE;}
			}
			if($post_type=="bp")
			{
				$data= array("bp_status" =>'Published',"bp_action" =>'Done',"date_update"=>$date);				
				$this->db->where("acc_id",$acc_id);
				$query=$this->db->update("tbl_bundle_package",$data);
				if($query==TRUE){return TRUE;}
			}
			if($post_type=="cps")
			{
				$data= array("cps_status" =>'Published',"cps_action" =>'Done');				
				$this->db->where("acc_id",$acc_id);
				$query=$this->db->update("tbl_cv_paid_search",$data);
				if($query==TRUE){return TRUE;}
			}
	}	/*-------==========end payment and transaction walk_in=============----------*/

	public function walk_in_detail()
	{	$post_type=$this->input->post("post_type");
		$post_code=$this->input->post("txtpost_code");
		date_default_timezone_set('Asia/Phnom_Penh');
		$date=date('Y-m-d H:i:s');
		$query=$this->db->query("SELECT pay_id FROM tbl_payment WHERE pay_date='{$date}'");
		$pay_id=$query->row();//pay_id	
		$pre=$this->count_premium();
		$sta=$this->count_standard();
		if($post_type=="job")
		{
			$row=$this->job();
			foreach($row as $val)
			{
				$arr = array(
				'pay_id'=>$pay_id->pay_id,
				'post_code'=>$val->job_code,
				'price'=>$val->price,
				'duration'=>$val->duration,
				'discount'=>$val->rate_det_type=="Premium"?($pre->premium>=2?$val->job_2post_discount:0):($sta->standard>=2?$val->job_2post_discount:0),
				'priority'=>$val->rate_det_type
				);
				$query=$this->db->insert("tbl_payment_detail",$arr);
			} 
		}/*========end job_payment_detail====*/
		if($post_type=="cv")
		{
			$row=$this->cv();
			foreach($row as $val)
			{
				$arr = array(
				'pay_id'=>$pay_id->pay_id,
				'post_code'=>$val->cv_code,
				'price'=>$val->price,
				'duration'=>$val->duration,
				'discount'=>0,
				'priority'=>$val->rate_det_type
				);
				$query=$this->db->insert("tbl_payment_detail",$arr);
			}
		}/*---======cv_payment_detail========--------*/
		if($post_type=="skill")
		{
			$row=$this->skill();
			foreach($row as $val)
			{
				$arr = array(
				'pay_id'=>$pay_id->pay_id,
				'post_code'=>$val->skill_code,
				'price'=>$val->price,
				'duration'=>$val->duration,
				'discount'=>0,
				);
				$query=$this->db->insert("tbl_payment_detail",$arr);
			}
		}/*---======cv_payment_detail========--------*/

		if($post_type=="ads")
		{
			$row=$this->ads();
			foreach($row as $val)
			{
				$arr = array(
				'pay_id'=>$pay_id->pay_id,
				'post_code'=>$val->ads_code,
				'price'=>$val->price,
				'duration'=>$val->duration,
				'discount'=>$val->rate_det_type=="Premium"?($pre->premium>=2?$val->job_2post_discount:0):($sta->standard>=2?$val->job_2post_discount:0),
				'ads_location'=>$val->rate_det_type,
				);
				$query=$this->db->insert("tbl_payment_detail",$arr);
			}
		}/*---======cv_payment_detail========--------*/
		if($post_type=="bp")
		{
			$row=$this->bp();
			foreach($row as $val)
			{
				$arr = array(
				'pay_id'=>$pay_id->pay_id,
				'post_code'=>$val->bp_code,
				'price'=>$val->key_data,
				'duration'=>$val->key_code
				);
				$query=$this->db->insert("tbl_payment_detail",$arr);
			}
		}/*---======bp_payment_detail========--------*/
		if($post_type=="cps")
		{

			$row=$this->cps();
			foreach($row as $val)
			{
				$arr = array(
				'pay_id'=>$pay_id->pay_id,
				'post_code'=>$val->cps_code,
				'price'=>$val->key_data,
				'duration'=>$val->hour
				);
				$query=$this->db->insert("tbl_payment_detail",$arr);
			}
		}/*---======cps_payment_detail========--------*/
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
	public function VAT()
	{
		$query=$this->db->query("SELECT key_code FROM tbl_sysdata WHERE key_type='VAT' ORDER BY key_id DESC");		
		if($query->num_rows()>0){return $query->row();}			
	}	
	public function job()
	{
		if($this->index()==TRUE)
		{
			$acc_id=$this->index()->acc_id;
			$query=$this->db->query("SELECT acc_id,duration,price,rate_det_type,job_code,job_2post_discount FROM tbl_post_job AS job INNER JOIN tbl_rate_detail AS r ON job.priority=r.rate_det_id WHERE job.acc_id='$acc_id' AND post_job_status='Submited'");
			if($query->num_rows()>0){return $query->result();}
			else{return FALSE;}
		}
		else{return FALSE;}						
	}
	public function cv()
	{
		if($this->index()==TRUE)
		{
			$acc_id=$this->index()->acc_id;
			$query=$this->db->query("SELECT acc_id,duration,price,rate_det_type,cv_code FROM tbl_post_cv AS cv INNER JOIN tbl_rate_detail AS r ON cv.priority=r.rate_det_id WHERE cv.acc_id='$acc_id' AND post_cv_status='Submited'");
			if($query->num_rows()>0){return $query->result();}
			else{return FALSE;}
		}
		else{return FALSE;}						
	}
	public function skill()
	{
		if($this->index()==TRUE)
		{
			$acc_id=$this->index()->acc_id;
			$query=$this->db->query("SELECT acc_id,duration,price,rate_det_type,skill_code FROM tbl_post_skill AS skill INNER JOIN tbl_rate_detail AS r ON skill.priority=r.rate_det_id WHERE skill.acc_id='$acc_id' AND post_skill_status='Submited'");
			if($query->num_rows()>0){return $query->result();}
			else{return FALSE;}
		}
		else{return FALSE;}						
	}
	public function ads()
	{
		if($this->index()==TRUE)
		{
			$acc_id=$this->index()->acc_id;
			$query=$this->db->query("SELECT acc_id,duration,price,rate_det_type,ads_code,ads_discount FROM tbl_post_ads AS ads INNER JOIN tbl_rate_detail AS r ON ads.ads_type=r.rate_det_id WHERE ads.acc_id='$acc_id' AND post_ads_status='Submited'");
			if($query->num_rows()>0){return $query->result();}
			else{return FALSE;}
		}
		else{return FALSE;}						
	}

	public function bp()
	{

		if($this->index($acc_id=20)==TRUE)
		{
			$acc_id=$this->index()->acc_id;
			$query=$this->db->query("SELECT acc_id,key_code,key_data,bp_code,date_from FROM tbl_bundle_package AS bp INNER JOIN tbl_sysdata AS s ON bp.key_id=s.key_id WHERE bp.acc_id='$acc_id' AND bp_status='Submited'");
			if($query->num_rows()>0){return $query->result();}
			else{return FALSE;}
		}
		else{return FALSE;}						
	}

	public function cps()
	{
		if($this->index()==TRUE)
		{
			$acc_id=$this->index()->acc_id;
			$query=$this->db->query("SELECT acc_id,cps_code,date_from,cps_status,cps_action,hour,key_data FROM tbl_cv_paid_search AS ps INNER JOIN tbl_sysdata AS s ON ps.hour=s.key_code WHERE (acc_id='$acc_id' AND cps_status='Submited') AND s.key_type='cv_paid_search'");		
			if($query->num_rows()>0){return $query->result();}
			else{return FALSE;}
		}
		else{return FALSE;}						
	}
}
?>
