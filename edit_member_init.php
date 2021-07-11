<?php 


require_once __DIR__.'/db-connect.php';
require_once __DIR__.'/session.php';
require_once __DIR__.'/sql_functions.php';

sec_session_start();

$error_msg = "";

if($_SESSION['username']!='admin'){
    header('Location: index.php');
}

// print_r($_REQUEST['membername']); 

if (isset($_REQUEST['member_id']))

 {

 	$member_id=$_REQUEST['member_id'];
 

 	update_value($_REQUEST['membername'],'membership','member_name','member_id',$member_id);
 	update_value($_REQUEST['email'],'membership','email','member_id',$member_id);
 	update_value($_REQUEST['phone'],'membership','phone_number','member_id',$member_id);

 	 

 
 	
 	echo '
 	<script type="text/javascript">
 		
 		alert("Member Details Updated");

 		window.location.replace("members.php");

 	</script> ';

 }

else echo "please try again";

?>
