<style>
	.p1{
	  text-align: center;
	  font-size: 20px;
	  color:green;
	}
</style>
<?php
	include("ng/db.php");
	if($this->session->acc_log1 && $this->session->start_count)
	{
		$acc_id=$this->session->acc_log1;
		$result = $conn->query("SELECT cps_id,hour,remain_hour FROM tbl_cv_paid_search WHERE acc_id={$acc_id} AND cps_status='Published'");
		if($result->num_rows>0)
		{
			while($rs = $result->fetch_array(MYSQLI_ASSOC))
			{

				if($rs["remain_hour"]=='0000-00-00 00:00:00')
				{
					$val=$rs["hour"];
					$r=$rs["remain_hour"];
					date_default_timezone_set("Asia/Phnom_Penh");
					$val1=date("M-d-Y h:i:s a",strtotime("$val hours"));
					$d=date("Y-m-d H:i:s",strtotime("$val hours"));
					$conn->query("UPDATE tbl_cv_paid_search SET remain_hour='$d' WHERE acc_id='$acc_id'");
				}
				else
				{
					date_default_timezone_set("Asia/Phnom_Penh");
					$r=$rs["remain_hour"];
					$val=$rs["remain_hour"];
					$val1=date("M-d-Y h:i:s a",strtotime("$val"));
				}
			}
		}
		else
		{
			$result = $conn->query("SELECT cps_id,hour,remain_hour
			FROM tbl_cv_paid_search AS cps
			LEFT JOIN tbl_bundle_package AS bp ON cps.bp_id=bp.bp_id
			LEFT JOIN tbl_post_ads AS ads ON cps.ads_id=ads.post_ads_id
			WHERE (acc_id={$acc_id} AND cps_status='Published') AND (bp.bp_status='Published' OR ads.post_ads_status='Published'");

			if($result!=false&&$result->num_rows>0)
			{
				while($rs = $result->fetch_array(MYSQLI_ASSOC))
				{

					if($rs["remain_hour"]=='0000-00-00 00:00:00')
					{
						$val=$rs["hour"];
						$r=$rs["remain_hour"];
						date_default_timezone_set("Asia/Phnom_Penh");
						$val1=date("M-d-Y h:i:s a",strtotime("$val hours"));
						$d=date("Y-m-d H:i:s",strtotime("$val hours"));
						$conn->query("UPDATE tbl_cv_paid_search SET remain_hour='$d' WHERE acc_id='$acc_id'");
					}
					else
					{
						date_default_timezone_set("Asia/Phnom_Penh");
						$r=$rs["remain_hour"];
						$val=$rs["remain_hour"];
						$val1=date("M-d-Y h:i:s a",strtotime("$val"));
					}
				}
			}else {
				//when user delete their CV Paid Search
			}
		}
	}else{$val1=0;}
?>
<div class="col-md-10">
	<div style="float: right;"><label>You are granted to see and Print CV Detail within<span id="demo" class="p1 thumbnail" style="padding:10px 0px;border-radius: 6px;"></span></label></div>
</div>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $val1?>").getTime();

// Update the count down every 1 second

var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
   	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		// Output the result in an element with id="demo"
		document.getElementById("demo").innerHTML = hours + "h "
		+ minutes + "m " + seconds + "s ";
		// If the count down is over, write some text
		if (distance < 0) {
		    clearInterval(x);
		    // document.getElementById("demo").innerHTML = "EXPIRED";
				document.getElementById("demo").innerHTML = "00:00:00";
		    //udpate Expire status
		    var xhttp = new XMLHttpRequest();
		  	xhttp.open("GET", "<?php echo base_url()?>cv_c/update_countdown", true);
		  	xhttp.send();
		}
},1000);
</script>
