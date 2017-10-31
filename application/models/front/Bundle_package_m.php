<?php
class Bundle_package_m extends CI_Model
{
	var $account_login;
	public function __construct()
	{
		parent::__construct();
		$this->account_login=$this->session->acc_log1;
	}
	public function bp_setup()
	{
		$query=$this->db->query("SELECT key_id,CONCAT(key_code,'days',' ','(',key_data,'$',')') AS bp_setup2 FROM tbl_sysdata WHERE key_type='bundle_package' ORDER BY key_data ASC");
		if($query->num_rows()>0){return $query->result();}
	}
   public function bu_pa_duration($key_id=""){
   		$query=$this->db->query("SELECT key_code,key_data FROM tbl_sysdata WHERE key_id='{$key_id}'");
		if($query->num_rows()>0){return $query->row();}
   }
	public function bp_code($id="")
	{
		if($id=="")
		{
			$query=$this->db->query("SELECT max(bp_code) AS bp_code FROM tbl_bundle_package");
			if($query->num_rows()>0){return $query->row();}
			else{return "KJBP-000001";}
		}
		else
		{
			$query=$this->db->query("SELECT bp_code FROM tbl_bundle_package WHERE bp_code='{$id}'");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function VAT()
	{
		$query=$this->db->query("SELECT key_code FROM tbl_sysdata WHERE key_type='VAT' ORDER BY key_id DESC");
		if($query->num_rows()>0){return $query->row();}
	}
	public function post_history()
	{
		$query=$this->db->query("SELECT bp_id,bp_code,key_code,date_from,bp_status,bp_action FROM tbl_bundle_package AS bp INNER JOIN tbl_sysdata AS sd ON bp.key_id=sd.key_id WHERE acc_id='{$this->account_login}' AND bp.type!='Free'");
		if($query->num_rows()>0){return $query->result();}
	}
	public function account()
	{
		$query=$this->db->query("SELECT acc_name,acc_company,acc_email,acc_desc,acc_phone,acc_addr,acc_photo FROM tbl_account WHERE acc_id={$this->account_login}");
		if($query->num_rows()>0){return $query->row();}
	}
	public function billing_info()
	{
		$query=$this->db->query("SELECT bp_id,bp_code,key_code,key_data,DATE_FORMAT(date_from, '%d-%m-%Y') as date_from,DATE_FORMAT(DATE_ADD(date_from, INTERVAL key_code DAY),'%d-%m-%Y') as date_expire,bp_status,bp_action FROM tbl_bundle_package AS bp INNER JOIN tbl_sysdata AS sd ON bp.key_id=sd.key_id WHERE acc_id='{$this->account_login}' AND bp_status='Submited'");
		if($query->num_rows()>0){return $query->result();}
	}
	public function add_billing_info($id)
	{
		/*date_default_timezone_set('Asia/Phnom_Penh');
		$date=date('Y-m-d H:i:s');
		$data=array('acc_id' => $this->account_login,'type'=>'bundle_package','VAT'=>$this->input->post('VAT'),'pay_date'=>$date,'pay_by'=>'wing');
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
							'post_code'=>$rows1->bp_code,
							'price'=>$rows1->key_data,
							'duration'=>$rows1->key_code
							);
				$query=$this->db->insert('tbl_payment_detail',$data);
				if($query==TRUE)
				{
					$data=array('bp_status'=>$status,'bp_action'=>$action);
					$this->db->where('bp_code',$rows1->bp_code);
					$query=$this->db->update('tbl_bundle_package',$data);
					if($query==TRUE){return TRUE;}
				}
			}

		}*/
		$data=array('bp_status'=>'Pending','bp_action'=>'Payment',);
		$this->db->where('bp_id',$id);
		$query=$this->db->update('tbl_bundle_package',$data);
		if ($query==TRUE) {return TRUE;}
	}
	public function add($status="",$action="")
	{
		$purchase_date = date('Y-m-d',strtotime($this->input->post("txtPurchaseDate")));
		$data= array(
						"bp_code" =>		$this->input->post("txtBpID"),
						"acc_id"	=>		$this->account_login,
						"key_id" => 		$this->input->post("ddlBpDuration"),
						"date_from" =>	$purchase_date,
						"bp_status" =>	$status,
						"bp_action" =>	$action,
					);
		$query=$this->db->insert("tbl_bundle_package",$data);
		if($query==TRUE){return TRUE;}
	}
	public function get_bp_id($id="")
	{
		$query=$this->db->query("SELECT bp_id,key_id FROM tbl_bundle_package WHERE bp_code='$id'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function get_hour_bp($id="")
	{
		$query=$this->db->query("SELECT key_code FROM tbl_rate_detail AS rd INNER JOIN tbl_sysdata AS s ON rd.free_per_month_job=s.key_id
			WHERE rd.bp_for_job='$id'");
		if($query->num_rows()>0){return $query->row()->key_code;}
	}
	public function free_cps()
	{
		$row=$this->get_bp_id($this->input->post("txtBpID"));
		$id=$row->bp_id;
		$key_id=$row->key_id;
		$hour=$this->get_hour_bp($key_id);
		if($hour==TRUE)
		{
			$data= array(
						"cps_code" =>NULL,
						"acc_id"	=>$this->account_login,
						"type"=>"Free",
						"bp_id"=>$id,
						"hour"=>$hour,
						"date_from"=>date("Y-m-d"),
						"cps_status" => "Submited",
						"cps_action" => "Pending",
					);
		$query=$this->db->insert("tbl_cv_paid_search",$data);
		if($query==TRUE){return TRUE;}
		}
	}
	public function get_saved($id="")
	{
		if($id!="")
		{
			$query=$this->db->query("SELECT * FROM tbl_bundle_package WHERE bp_code='{$id}'");
			if($query->num_rows()>0){return $query->row();}
		}
		else
		{
			$query=$this->db->query("SELECT bp_code FROM tbl_bundle_package WHERE acc_id='{$this->account_login}' AND type!='Free'");
			if($query->num_rows()>0){return $query->row();}
			else{return FALSE;}
		}
	}
	public function check_published()
	{
		$query=$this->db->query("SELECT bp_status FROM  tbl_bundle_package WHERE acc_id='{$this->account_login}' AND (bp_status='Published' OR bp_status='Pending' OR bp_status='Expired')");
		if($query->num_rows()>0){return TRUE;}
		else{return FALSE;}
	}
	public function edit($status="",$action="")
	{
		$data= array(
					"bp_code" =>$this->input->post("txtBpID"),
					"acc_id"	=>$this->account_login,
					"key_id" => $this->input->post("ddlBpDuration"),
					"date_from" =>$this->input->post("txtPurchaseDate"),
					"bp_status" =>$status,
					"bp_action" =>$action,
				);
		$this->db->where("bp_code",$this->input->post("txtBpID"));
		$query=$this->db->update("tbl_bundle_package",$data);
		if($query==TRUE){return TRUE;}
	}
	public function edit_published()
	{
		$data= array(
					//"bp_code" =>$this->input->post("txtBpID"),
					//"acc_id"	=>$this->account_login,
					//"key_id" => $this->input->post("ddlBpDuration"),
					"date_from" =>$this->input->post("txtPurchaseDate"),
					//"bp_status" =>$status,
					//"bp_action" =>$action,
				);
		$this->db->where("bp_code",$this->input->post("txtBpID"));
		$query=$this->db->update("tbl_bundle_package",$data);
		if($query==TRUE){return TRUE;}
		else{return FALSE;}
	}

	public function delete($id)
	{
		$query=$this->db->query("SELECT bp_id FROM tbl_bundle_package WHERE bp_code='$id'");
		if($query->num_rows()>0){$id1=$query->row()->bp_id;$this->db->query("DELETE FROM tbl_cv_paid_search WHERE bp_id='$id'");}
		$this->db->where("bp_code",$id);
		$query=$this->db->delete("tbl_bundle_package");
		if($query==TRUE){return TRUE;}
	}
}
?>
