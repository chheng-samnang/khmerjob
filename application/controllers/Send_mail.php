<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_mail extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Mail_model","mm");
	}

	public function index()
	{
		$current_day = date('l');
		if($current_day=="Friday")
		{
			$email = "samnang164@gmail.com";
			$username = "samnang";
			$acc_id = "49";
			//$this->Send_mail($email,$username,$acc_id);
		}
	}

	public function Send_mail($email="",$username="",$acc_id="")
	{
		$jobs = $this->mm->get_new_job_for_sending_mail();
		$config = Array(

							'mailtype' => 'html',
							'charset' => 'iso-8859-1',
							'wordwrap' => TRUE
						);
		$this->load->library('email',$config);
		$this->email->initialize($config);
		$this->email->from('info@khmer-job.com', 'Khmer Job');
		$this->email->to($email);

		$message .= "<!DOCTYPE html>
								<html>
								<head>
									<title></title>

								</head>
								<body>
								<div>
									<table border='1'>
										<tr>";

		$message .='		<td colspan="6" style="text-align:center;width:703px;">"Job in Cambodia" Mailing List: 04-Jul-2017</td>
										</tr>
										<tr class="header">
											<th>No.</th>
											<th>Job ID</th>
											<th>Employer</th>
											<th>Title</th>
											<th>Location</th>
											<th>Closing Date</th>
										</tr>';

		foreach($query as $key => $value){
			$message .='<tr>
												<td>'.($key+1).'</td>
												<td>'.$value->job_code.'</td>
												<td>'.$value->acc_name.'</td>
												<td>'.$value->job_title.'</td>
												<td>'.$value->loc_name.'</td>
												<td>'.$value->end_date.'</td>
								</tr>';
		}

		$message .='</table>
								</div>
								</body>
								</html>';

		$this->email->subject("Cambodia's Job Listing:".date("d-M-Y"));
		$this->email->message($message);

		$this->email->send();
		echo $this->email->print_debugger();
	}
}
?>
