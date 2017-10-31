<?php
class Ads_m extends CI_Model
{				
	var $account_login;		
	public function __construct()
	{
		parent::__construct();
		$this->account_login=$this->session->acc_log1;	
	}			
	public function ads_setup()
	{		
		$query=$this->db->query("SELECT rate_det_type,rate_det_id,CONCAT(rate_det_type,' ',duration,'days') AS ads_setup2 FROM tbl_rate_detail AS rd INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id WHERE (rate_det_type='Top' OR rate_det_type='Side') AND rate_type='ads' ORDER BY rate_det_type ASC, price ASC");
		if($query->num_rows()>0){return $query->result();}								
	}
	public function check_type_top()
	{
		$query=$this->db->query("SELECT rd.rate_det_id,rd.rate_det_type FROM tbl_post_ads AS pads INNER JOIN tbl_rate_detail AS rd ON pads.ads_type=rd.rate_det_id INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id WHERE (r.rate_type='ads' AND rd.rate_det_type='Top') AND pads.post_ads_status='Published'");
		if($query->num_rows()>0){return $query->row();}	
	}
	public function ads_code($id="")
	{
		if($id=="")
		{
			$query=$this->db->query("SELECT max(ads_code) AS ads_code FROM tbl_post_ads");		
			if($query->num_rows()>0){return $query->row();}
			else{return "KJAD-000001";}	
		}
		else
		{
			$query=$this->db->query("SELECT ads_code FROM tbl_post_ads WHERE post_ads_id='{$id}'");
			if($query->num_rows()>0){return $query->row();}				
		}		
	}
	public function count_ads_by_acc()
	{
		$query=$this->db->query("SELECT COUNT(post_ads_id) AS numbers FROM tbl_post_ads WHERE acc_id={$this->account_login}");		
		if($query->num_rows()>0){return $query->row();}
		else{return "01";}			
	}
	public function account()
	{
		$query=$this->db->query("SELECT acc_name,acc_company,acc_email,acc_phone,acc_addr,acc_photo FROM tbl_account WHERE acc_id={$this->account_login}");
		if($query->num_rows()>0){return $query->row();}
	}
	public function get_ads_id($id="")
	{

		$query=$this->db->query("SELECT post_ads_id,ads_type,rate_det_type FROM tbl_post_ads AS ads
			INNER JOIN tbl_rate_detail AS rd ON ads.ads_type=rd.rate_det_id
			WHERE ads_code='$id'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function get_hour_bp($id="")
	{		
		$query=$this->db->query("SELECT key_code FROM tbl_rate_detail AS rd INNER JOIN tbl_sysdata AS s ON rd.free_per_month=s.key_id 
			WHERE rd.rate_det_id='$id'");
		if($query->num_rows()>0){return $query->row()->key_code;}
	}
	public function free_cps()
	{
		$row=$this->get_ads_id($this->input->post("txtAdsID"));
		if($row->rate_det_type=="Side")
		{
			$id=$row->post_ads_id;
			$key_id=$row->ads_type;
			$hour=$this->get_hour_bp($key_id);
			if($hour==TRUE)
			{
				$data= array(
							"cps_code" =>NULL,
							"acc_id"	=>$this->account_login,
							"type"=>"Free",
							"ads_id"=>$id,
							"hour"=>$hour,
							"date_from"=>date("Y-m-d"),															
							"cps_status" => "Submited",
							"cps_action" => "Pending",												
						);
			$query=$this->db->insert("tbl_cv_paid_search",$data);
			if($query==TRUE){return TRUE;}	
			}
		}		
	}
	public function get_bp_duration($id="")
	{
		$query=$this->db->query("SELECT free_per_month FROM tbl_post_ads AS ads 
			INNER JOIN tbl_rate_detail AS rd ON ads.ads_type=rd.rate_det_id WHERE ads.ads_type='$id'");
		if($query->num_rows()>0){return $query->row()->free_per_month;}
	}
	public function free_bp()
	{
		$row=$this->get_ads_id($this->input->post("txtAdsID"));
		if($row->rate_det_type=="Top")
		{
			$id=$row->post_ads_id;
			$key_id=$row->ads_type;			
			echo $bp_id=$this->get_bp_duration($key_id);
			if($bp_id==TRUE)
			{
				$data= array(
							"bp_code" =>NULL,
							"acc_id"=>$this->account_login,
							"type"=>"Free",
							"ads_id"=>$id,
							"key_id"=>$bp_id,
							"date_from"=>date("Y-m-d"),															
							"bp_status" => "Submited",
							"bp_action" => "Pending",												
						);
			$query=$this->db->insert("tbl_bundle_package",$data);
			if($query==TRUE){return TRUE;}	
			}
		}
	}

	public function VAT()
	{
		$query=$this->db->query("SELECT key_code FROM tbl_sysdata WHERE key_type='VAT' ORDER BY key_id DESC");		
		if($query->num_rows()>0){return $query->row();}			
	}				
	public function post_history()
	{
		$query=$this->db->query("SELECT post_ads_id,ads_code,rate_det_type,duration,post_ads_date,post_ads_status,post_ads_action FROM tbl_post_ads AS pads INNER JOIN tbl_rate_detail AS rd ON pads.ads_type=rd.rate_det_id WHERE acc_id='{$this->account_login}' ORDER BY ads_code");		
		if($query->num_rows()>0){return $query->result();}		
	}
	public function billing_info()
	{
		$query=$this->db->query("SELECT post_ads_id,ads_code,rate_det_type,ads_discount,price,duration FROM tbl_post_ads AS pads INNER JOIN tbl_rate_detail AS rd ON pads.ads_type=rd.rate_det_id WHERE acc_id='{$this->account_login}' AND post_ads_status='Submited' ORDER BY ads_code");		
		if($query->num_rows()>0){return $query->result();}		
	}
	public function add_billing_info($id)
	{	
		/*date_default_timezone_set('Asia/Phnom_Penh');
		$date=date('Y-m-d H:i:s');
		$data=array('acc_id' => $this->account_login,'type'=>'ads','VAT'=>$this->input->post('VAT'),'pay_date'=>$date,'pay_by'=>'wing');
		$query=$this->db->insert('tbl_payment',$data);
		if($query==TRUE)
		{
			$query=$this->db->query("SELECT pay_id FROM tbl_payment WHERE pay_date='{$date}'");
			$row=$query->row();//pay_id
			//insert process payment transaction
			$data=array("pay_id" =>$row->pay_id,"total"=>$this->input->post("grand_total"));			
			$this->db->insert('tbl_payment_transaction',$data);
			$row1=$this->billing_info();//payment_detail
			$pre=$this->count_top();
			$sta=$this->count_side();
			foreach($row1 as $rows1)
			{
				$data=array(
							'pay_id' =>$row->pay_id,
							'post_code'=>$rows1->ads_code,
							'price'=>$rows1->price,
							'duration'=>$rows1->duration,
							'discount'=>$rows1->rate_det_type=="top"?($pre->top>=2?$b_info->ads_discount:0):($sta->side>=2?$b_info->ads_discount:0),														
							'ads_location'=>$rows1->rate_det_type
							);
				$query=$this->db->insert('tbl_payment_detail',$data);
				if($query==TRUE)
				{
					$data=array('post_ads_status'=>$status,'post_ads_action'=>$action);
					$this->db->where('ads_code',$rows1->ads_code);
					$query=$this->db->update('tbl_post_ads',$data);					
				}
			}

		}*/
		$data=array('post_ads_status'=>'Pending','post_ads_action'=>'Payment',);
		$this->db->where('post_ads_id',$id);
		$query=$this->db->update('tbl_post_ads',$data);	
	}
	public function pr_ads_location($loc_id="")
	{
		$query=$this->db->query("SELECT rate_det_type,duration,price FROM tbl_rate_detail WHERE rate_det_id='{$loc_id}'  ");		
		if($query->num_rows()>0){return $query->row();}
	}
	public function check_published()
	{
		$query=$this->db->query("SELECT post_ads_status FROM tbl_post_ads WHERE post_ads_status='Published' OR post_ads_status='Pending' OR post_ads_status='Expired'");
		if($query->num_rows()>0){return TRUE;}
		else{return FALSE;}
	}
	public function count_top()
	{
		$query=$this->db->query("SELECT COUNT('rate_det_type') AS top FROM tbl_post_ads AS pads INNER JOIN tbl_rate_detail AS rd ON pads.ads_type=rd.rate_det_id WHERE acc_id='{$this->account_login}' AND rate_det_type='Top' AND post_ads_status='Pending' ");		
		if($query->num_rows()>0){return $query->row();}			
	}
	public function count_side()
	{
		$query=$this->db->query("SELECT COUNT('rate_det_type') AS side FROM tbl_post_ads AS pads INNER JOIN tbl_rate_detail AS rd ON pads.ads_type=rd.rate_det_id WHERE acc_id='{$this->account_login}' AND rate_det_type='Side' AND post_ads_status='Pending'");		
		if($query->num_rows()>0){return $query->row();}			
	}
	public function add($status="",$action="")
	{		
		$data= array(
						"ads_code" =>$this->input->post("txtAdsID"),
						"acc_id"	=>$this->account_login,															
						"ads_type" => $this->input->post("ddlAdsLoc"),						
						"post_ads_date" =>$this->input->post("txtPostingDate"),
						"ads_img" => $this->input->post("txtImgName"),	
						"ads_url" => $this->input->post("txtAdsURL"),															
						"post_ads_status" =>$status,
						"post_ads_action" =>$action,
					);
		$query=$this->db->insert("tbl_post_ads",$data);
		if($query==TRUE){return TRUE;}											
	}	
	public function get_saved($id)
	{
		$query=$this->db->query("SELECT * FROM tbl_post_ads WHERE post_ads_id='{$id}'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function edit($status="",$action="")
	{
		if(!empty($this->input->post('txtImgName')))
		{	
			$row=$this->get_saved($this->input->post("txt_post_ads_id"));
			unlink("assets/uploads/".$row->ads_img);		
			$data= array(
						"ads_code" =>$this->input->post("txtAdsID"),
						"acc_id"	=>$this->account_login,															
						"ads_type" => $this->input->post("ddlAdsLoc"),						
						"post_ads_date" =>$this->input->post("txtPostingDate"),
						"ads_img" => $this->input->post("txtImgName"),
						"ads_url" => $this->input->post("txtAdsURL"),																
						"post_ads_status" =>$status,
						"post_ads_action" =>$action,
					);
		}
		else
		{
			$data= array(
						"ads_code" =>$this->input->post("txtAdsID"),
						"acc_id"	=>$this->account_login,															
						"ads_type" => $this->input->post("ddlAdsLoc"),						
						"post_ads_date" =>$this->input->post("txtPostingDate"),
						//"ads_img" => $this->input->post("txtImgName"),
						"ads_url" => $this->input->post("txtAdsURL"),																
						"post_ads_status" =>$status,
						"post_ads_action" =>$action,
					);
		}
		$this->db->where("post_ads_id",$this->input->post("txt_post_ads_id"));
		$query=$this->db->update("tbl_post_ads",$data);
		if($query==TRUE){return TRUE;}											
	}
	public function edit_published()
	{
		if(!empty($this->input->post('txtImgName')))
		{	
			$row=$this->get_saved($this->input->post("txt_post_ads_id"));
			unlink("assets/uploads/".$row->ads_img);		
			$data= array(
						//"ads_code" =>$this->input->post("txtAdsID"),
						//"acc_id"	=>$this->account_login,															
						"ads_type" => $this->input->post("ddlAdsLoc"),						
						"post_ads_date" =>$this->input->post("txtPostingDate"),
						"ads_img" => $this->input->post("txtImgName"),
						"ads_url" => $this->input->post("txtAdsURL"),																
						//"post_ads_status" =>$status,
						//"post_ads_action" =>$action,
					);
		}
		else
		{
			$data= array(
						//"ads_code" =>$this->input->post("txtAdsID"),
						//"acc_id"	=>$this->account_login,															
						"ads_type" => $this->input->post("ddlAdsLoc"),						
						"post_ads_date" =>$this->input->post("txtPostingDate"),
						//"ads_img" => $this->input->post("txtImgName"),
						"ads_url" => $this->input->post("txtAdsURL"),																
						//"post_ads_status" =>$status,
						//"post_ads_action" =>$action,
					);
		}
		$this->db->where("post_ads_id",$this->input->post("txt_post_ads_id"));
		$query=$this->db->update("tbl_post_ads",$data);
		if($query==TRUE){return TRUE;}											
	}
	public function delete($id)
	{
		$row=$this->get_saved($id);
		$this->db->query("DELETE FROM tbl_cv_paid_search WHERE ads_id='$id'");
		$this->db->query("DELETE FROM tbl_bundle_package WHERE ads_id='$id'");
		unlink("assets/uploads/".$row->ads_img);
		$this->db->where("post_ads_id",$id);
		$query=$this->db->delete("tbl_post_ads");
		if($query==TRUE){return TRUE;}
	}
}
?>
