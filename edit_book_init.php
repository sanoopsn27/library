<?php 


require_once __DIR__.'/db-connect.php';
require_once __DIR__.'/session.php';
require_once __DIR__.'/sql_functions.php';

sec_session_start();

$error_msg = "";

if($_SESSION['username']!='admin'){
    header('Location: index.php');
}

// print_r($_REQUEST['bookname']); 

if (isset($_REQUEST['book_id']))

 {

 	$book_id=$_REQUEST['book_id'];
 

 	update_value($_REQUEST['bookname'],'books','book_name','book_id',$book_id);
 	update_value($_REQUEST['bookauthor'],'books','book_author','book_id',$book_id);

 	update_value($_REQUEST['isbn'],'books','isbn','book_id',$book_id);

 	update_value($_REQUEST['bookpublisher'],'books','book_publisher','book_id',$book_id);

 	update_value($_REQUEST['bookpages'],'books','book_pages','book_id',$book_id);

 	update_value($_REQUEST['bookstock'],'books','book_stock','book_id',$book_id);

 
 	
 	echo '
 	<script type="text/javascript">
 		
 		alert("Book Details Updated");

 		window.location.replace("index.php");

 	</script> ';

 }

else echo "please try again";

?>
