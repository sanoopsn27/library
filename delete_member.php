<?php

require_once __DIR__.'/db-connect.php';
require_once __DIR__.'/session.php';
require_once __DIR__.'/sql_functions.php';

$error_msg=" ";

sec_session_start();

if($_SESSION['username']!='admin'){
    header('Location: index.php');
}

if (isset( $_GET['id'] )) {
    
    $member_id = $_GET['id'];
  
    droprecord('membership','member_id',$member_id);


    echo '
    <script type="text/javascript">
        
        alert("Member Deleted");

        window.location.replace("members.php");

    </script> ';

 }

else {
    echo '
    <script type="text/javascript">
        
        alert("Failed:Try again");

        window.location.replace("members.php");

    </script> ';

 }

 
?>