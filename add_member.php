<?php 


require_once __DIR__.'/db-connect.php';
require_once __DIR__.'/session.php';
require_once __DIR__.'/sql_functions.php';

sec_session_start();

$error_msg = "";

// print_r($_REQUEST['bookname']); 

if (isset($_REQUEST['membername']))

 {

 	$member_id=uniqid();


 	insert_value('membership','member_id',$member_id);



 	update_value($_REQUEST['membername'],'membership','member_name','member_id',$member_id);

 	update_value($_REQUEST['email'],'membership','email','member_id',$member_id);


 	update_value($_REQUEST['phone'],'membership','phone_number','member_id',$member_id);

  
 
 	
 	echo '
 	<script type="text/javascript">
 		
 		alert("New Member Added");

 		window.location.replace("members.php");

 	</script> ';

 }

else echo "please try again";

?>
