<?php
class Mail_model extends CI_Model{
    function __construct()
    {
      parent::__construct();
    }

    public function get_new_job_for_sending_mail()
    {
      $query = $this->db->query("SELECT job_code,acc_name,job_title,l.loc_name,end_date
                                  FROM tbl_post_job p
                                  INNER JOIN tbl_account a ON p.`acc_id`= a.`acc_id`
                                  INNER JOIN tbl_location l ON p.`loc_id`=l.`loc_id`
                                  WHERE send_mail='0' ORDER BY p.date_crea LIMIT 50");
      if($query->num_rows()>0)
      {
        return $query->result();
      }else {
        return array();
      }
    }
}
?>
