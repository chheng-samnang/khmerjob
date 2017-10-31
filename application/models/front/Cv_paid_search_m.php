<?php
class Cv_paid_search_m extends CI_Model
{
	var $account_login;
	public function __construct()
	{
		parent::__construct();
		$this->account_login=$this->session->acc_log1;
	}
	public function cps_setup()
	{
		$query=$this->db->query("SELECT key_code,CASE WHEN key_code='1' THEN CONCAT(key_code,' hour',' ','(',key_data,'$',')') ELSE CONCAT(key_code,' hours',' ','(',key_data,'$',')') END AS cps_setup2 FROM tbl_sysdata WHERE key_type='cv_paid_search' ORDER BY key_data ASC");
		if($query->num_rows()>0){return $query->result();}
	}
	public function cps_code($id="")
	{
		if($id=="")
		{
			$query=$this->db->query("SELECT max(cps_code) AS cps_code FROM tbl_cv_paid_search");
			if($query->num_rows()>0){return $query->row();}
			else{return "KJCPS-000001";}
		}
		else
		{
			$query=$this->db->query("SELECT cps_code FROM tbl_cv_paid_search WHERE cps_code='{$id}'");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function pcv_paid_search($key_id="")
	{
   		$query=$this->db->query("SELECT key_code,key_data FROM tbl_sysdata WHERE key_id='{$key_id}'");
		if($query->num_rows()>0){return $query->row();}
    }
	public function account()
	{
		$query=$this->db->query("SELECT acc_name,acc_company,acc_email,acc_desc,acc_phone,acc_addr,acc_photo FROM tbl_account WHERE acc_id={$this->account_login}");
		if($query->num_rows()>0){return $query->row();}
	}
	public function VAT()
	{
		$query=$this->db->query("SELECT key_code FROM tbl_sysdata WHERE key_type='VAT' ORDER BY key_id DESC");
		if($query->num_rows()>0){return $query->row();}
	}
	public function post_history()
	{
		$query=$this->db->query("SELECT cps_id,cps_code,date_from,cps_status,cps_action,hour FROM tbl_cv_paid_search WHERE acc_id='{$this->account_login}' AND type!='Free'");
		if($query->num_rows()>0){return $query->result();}
	}
	public function billing_info()
	{
		$query=$this->db->query("SELECT cps_id,cps_code,date_from,cps_status,cps_action,hour,key_data FROM tbl_cv_paid_search AS ps INNER JOIN tbl_sysdata AS s ON ps.hour=s.key_code WHERE (acc_id='{$this->account_login}' AND cps_status='Submited') AND s.key_type='cv_paid_search'");
		if($query->num_rows()>0){return $query->result();}
	}
	public function add_billing_info($id="")
	{
		/*date_default_timezone_set('Asia/Phnom_Penh');
		$date=date('Y-m-d H:i:s');
		$data=array('acc_id' => $this->account_login,'type'=>'cv_paid_search','VAT'=>$this->input->post('VAT'),'pay_date'=>$date,'pay_by'=>'wing');
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
							'post_code'=>$rows1->cps_code,
							'price'=>$rows1->key_data,
							'duration'=>$rows1->key_code
							);
				$query=$this->db->insert('tbl_payment_detail',$data);
				if($query==TRUE)
				{
					$data=array('cps_status'=>$status,'cps_action'=>$action);
					$this->db->where('cps_code',$rows1->cps_code);
					$query=$this->db->update('tbl_cv_paid_search',$data);
					if($query==TRUE){return TRUE;}
				}
			}

		}*/
		$data=array('cps_status'=>'Pending','cps_action'=>'Payment',);
		$this->db->where('cps_id',$id);
		$query=$this->db->update('tbl_cv_paid_search',$data);
		if ($query==TRUE){return TRUE;}
	}
	public function check_published()
	{
		$query=$this->db->query("SELECT cps_status FROM tbl_cv_paid_search WHERE acc_id='{$this->account_login}' AND (cps_status='Published' OR cps_status='Pending' OR cps_status='Expired')");
		if($query->num_rows()>0){return TRUE;}
		else{return FALSE;}
	}
	public function add($status="",$action="")
	{
		$data= array(
						"cps_code" =>$this->input->post("txtCvpsID"),
						"acc_id"	=>$this->account_login,
						"hour" => $this->input->post("ddlCvpsDuration"),
						//"remain_hour" => $this->input->post("ddlCvpsDuration"),
						// "date_from" =>$this->input->post("txtPurchaseDate"),
						"date_from" =>date("Y-m-d"),
						"cps_status" =>$status,
						"cps_action" =>$action,
					);
		$query=$this->db->insert("tbl_cv_paid_search",$data);
		if($query==TRUE){return TRUE;}
	}
	public function get_saved($id="")
	{
		if($id!="")
		{
			$query=$this->db->query("SELECT * FROM tbl_cv_paid_search WHERE cps_code='{$id}'");
			if($query->num_rows()>0){return $query->row();}
		}
		else
		{
			$query=$this->db->query("SELECT * FROM tbl_cv_paid_search WHERE acc_id='{$this->account_login}' AND type!='Free'");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function edit($status="",$action="")
	{
		$data= array(
					"cps_code" =>$this->input->post("txtCvpsID"),
						"acc_id"	=>$this->account_login,
						"hour" => $this->input->post("ddlCvpsDuration"),
						//"remain_hour" => $this->input->post("ddlCvpsDuration"),
						"date_from" =>$this->input->post("txtPurchaseDate"),
						"cps_status" =>$status,
						"cps_action" =>$action,
				);
		$this->db->where("cps_code",$this->input->post("txtCvpsID"));
		$query=$this->db->update("tbl_cv_paid_search",$data);
		if($query==TRUE){return TRUE;}
	}
	public function edit_published()
	{
		$data= array(
					//"cps_code" =>$this->input->post("txtCvpsID"),
						//"acc_id"	=>$this->account_login,
						"hour" => $this->input->post("ddlCvpsDuration"),
						"remain_hour" => $this->input->post("ddlCvpsDuration"),
						"date_from" =>$this->input->post("txtPurchaseDate"),
						"cps_status" =>"Submited",
						"cps_action" =>"Payment"
				);
		$this->db->where("cps_code",$this->input->post("txtCvpsID"));
		$query=$this->db->update("tbl_cv_paid_search",$data);
		if($query==TRUE){return TRUE;}
	}
	public function delete($id)
	{
		$this->db->where("cps_code",$id);
		$query=$this->db->delete("tbl_cv_paid_search");
		if($query==TRUE){return TRUE;}
	}
	public function get_price($duration)
	{
			$query = $this->db->query("SELECT * FROM tbl_sysdata WHERE key_type='cv_paid_search' AND key_code='{$duration}'");
			if($query->num_rows()>0)
			{
				return $query->row();
			}else {
				return array();
			}
	}
}
?>
