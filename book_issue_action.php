<?php 


require_once __DIR__.'/db-connect.php';
require_once __DIR__.'/session.php';
require_once __DIR__.'/sql_functions.php';

sec_session_start();

$error_msg = "";

// print_r($_REQUEST['bookname']); 

if (isset($_REQUEST['selected'],$_REQUEST['rent']))

 
 { 

  $db_rent=extract_cell('debt','member_id',$_REQUEST['member_id'],'membership');

 
  $net_rent=$db_rent + $_REQUEST['rent'];

 
 	if($_REQUEST['selected']=='')
 	{

 		echo '
 	<script type="text/javascript">
 		
 		alert("Select a Book");

 		window.location.replace("issue_book_view.php?id='.$_REQUEST['member_id'].'");

 	</script> ';


 	}

  else if($_REQUEST['rent']=='')
  {

    echo '
  <script type="text/javascript">
    
    alert("Enter rent");

    window.location.replace("issue_book_view.php?id='.$_REQUEST['member_id'].'");

  </script> ';


  }

  else if($net_rent > 500)
  {

    echo '
  <script type="text/javascript">
    
    alert("Failed :Outstanding debts > 500 ");

    window.location.replace("issue_book_view.php?id='.$_REQUEST['member_id'].'");

  </script> ';


  }

 	else
 	{

 	$issue_id=uniqid();


 	insert_value('issue_book','issue_id',$issue_id);

 	update_value($_REQUEST['member_id'],'issue_book','member_id','issue_id',$issue_id);

 	update_value($_REQUEST['selected'],'issue_book','book_id','issue_id',$issue_id);

  update_value(1,'issue_book','status','issue_id',$issue_id);

  update_value($_REQUEST['rent'],'issue_book','book_rent','issue_id',$issue_id);

  




 	sql_query_raw("
    
    UPDATE books 
    SET book_stock = book_stock -1
    WHERE book_id = '".$_REQUEST['selected']."'
	
	");

    sql_query_raw("
    
    UPDATE membership 
    SET debt = debt + '".$_REQUEST['rent']."'
    WHERE member_id = '".$_REQUEST['member_id']."'
  
  ");
  
  
 	
 	echo '
 	<script type="text/javascript">
 		
 		alert("Book Issued to '.$_REQUEST['membername'].'");

 		window.location.replace("issue_book_view.php?id='.$_REQUEST['member_id'].'");

 	</script> ';

 }
}

else echo "please select a book";

?>
