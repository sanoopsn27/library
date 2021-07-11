<?php 


require_once __DIR__.'/db-connect.php';
require_once __DIR__.'/session.php';
require_once __DIR__.'/sql_functions.php';

sec_session_start();

$error_msg = "";

// print_r($_REQUEST['bookname']); 

if (isset($_REQUEST['rent']))

 {

   $mem_id= extract_cell('member_id','issue_id',$_REQUEST['issue_id'],'issue_book');
   $bk_id= extract_cell('book_id','issue_id',$_REQUEST['issue_id'],'issue_book');

 	if($_REQUEST['rent']=='')
 	{

 		echo '
 	<script type="text/javascript">
 		
 		alert("Pay rent to return");

 		window.location.replace("return_book_view.php?id='.$_REQUEST['issue_id'].'");

 	</script> ';


 	}
 	else
 	{

 	$issue_id=$_REQUEST['issue_id'];
 
   update_value(0,'issue_book','status','issue_id',$issue_id);

   
 	sql_query_raw("
    
    UPDATE books 
    SET book_stock = book_stock + 1
    WHERE book_id = '".$bk_id."'
	
	");


    sql_query_raw("
    
    UPDATE membership 
    SET debt = debt - '".$_REQUEST['rent']."'
    WHERE member_id = '".$mem_id."'
  
  ");
  
 	
 	echo '
 	<script type="text/javascript">
 		
 		alert("Book Returned from '.$_REQUEST['membername'].'");

 		window.location.replace("issue_book_view.php?id='.$mem_id.'");

 	</script> ';

 }
}

else echo "please select a book";

?>
