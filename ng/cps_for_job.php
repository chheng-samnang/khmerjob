<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	include("db.php");
	$id = $_GET['id'];	
	$result = $conn->query("SELECT key_id,key_type,key_code,key_data FROM tbl_sysdata WHERE key_type='cv_paid_search'");
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}	    
	    $outp .= '{"type":"'  . $rs["key_type"] . '",';
	    $outp .= '"duration":"'  . $rs["key_code"] . '",';
	    $outp .= '"price":"'  . $rs["key_data"] . '",';	    
	    $outp .= '"id":"'. $rs["key_id"]. '"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
?>