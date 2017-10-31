<?php
class Ads_setup_m extends CI_Model
{			
	var $userCrea;		
	public function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";				
	}
	public function index($id="")
	{
		if($id=="")
		{			
			$query=$this->db->query("SELECT rate_det_id,rate_det_type,duration,price,key_code,key_type,rd.key_id,ads_size,ads_discount FROM tbl_rate_detail AS rd INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id INNER JOIN tbl_sysdata AS sd ON rd.free_per_month=sd.key_id ORDER BY rd.rate_det_id DESC");			
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$query=$this->db->query("SELECT free_per_month,rate_det_id,rate_det_type,duration,price,rd.rate_id,key_code,key_type,rd.key_id,ads_size,ads_discount,rate_desc,r.user_crea,r.date_crea,r.user_updt,r.date_updt FROM tbl_rate_detail AS rd INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id LEFT JOIN tbl_sysdata AS sd ON rd.free_per_month=sd.key_id WHERE rate_det_id={$id}");
			if($query->num_rows()>0){return $query->row();}	
		}
	}
	public function purchase($type="")
	{
		$query=$this->db->query("SELECT key_id,key_code FROM tbl_sysdata WHERE key_type='{$type}'");
		if($query->num_rows()>0){return $query->result();}	
	}	
	public function add()
	{
		$data= array(
						"rate_type" =>'ads',
						"rate_desc" => $this->input->post("desc"),										
						"user_crea" => $this->userCrea,
						"date_crea" => date('Y-m-d')
					);
		$query=$this->db->insert("tbl_rate",$data);
		if($query==TRUE)
		{
			$this->db->where("rate_type","ads");
			$query=$this->db->get("tbl_rate");
			if($query->num_rows()>0)
			{
				$row=$query->previous_row();
				$json=json_decode($this->input->post("str"));										
				if(count($json)>0)
				{
					for($i=0;$i<count($json);$i++)
					{	
						$data1=array(	
										"rate_id"=>$row->rate_id,
										"rate_det_type"=>$json[$i][0],
										"duration"=>$json[$i][1],
										"ads_size"=>$json[$i][2],
										"price"=>$json[$i][3],
										"ads_discount"=>$json[$i][4],
										"free_per_month"=>$json[$i][6],								
									);
						$query1=$this->db->insert("tbl_rate_detail",$data1);						
					}
					if($query1==TRUE){return TRUE;}							
				}
			}
		}										
	}
	public function edit($id)
	{
		if($id==TRUE)
		{	
			#upate rate
			$data= array(
					"rate_desc" => $this->input->post("txtDesc"),																									
					"user_updt" => $this->userCrea,
					"date_updt" => date('Y-m-d')
					 );				
			$this->db->where("rate_id",$this->input->post("rate_id"));
			$this->db->update("tbl_rate",$data);					
			#update ads detail
			$data1= array(
					"rate_det_type" => $this->input->post("ddlType"),
					"duration" => $this->input->post("txtDuration"),
					"ads_size" => $this->input->post("txtSize"),
					"price" => $this->input->post("txtPrice"),
					"free_per_month" => $this->input->post("ddlBundle")==undefined||$this->input->post("ddlBundle")==""?($this->input->post("ddlSearch")):($this->input->post("ddlBundle")),
					#"free_per_month" => $this->input->post("ddlSearch"),
					"ads_discount" => $this->input->post("txtDiscount"),					
					 );				
			$this->db->where("rate_det_id",$id);
			$query1=$this->db->update("tbl_rate_detail",$data1);
			if($query1==TRUE){return $query1;}
		}				
	}
	public function delete($id)
	{
		if($id==TRUE)
		{						
			$this->db->where("rate_det_id",$id);
			$query=$this->db->delete("tbl_rate_detail");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>
