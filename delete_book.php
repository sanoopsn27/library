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
    $book_id = $_GET['id'];
  
    droprecord('books','book_id',$book_id);


    echo '
    <script type="text/javascript">
        
        alert("Book  Deleted");

        window.location.replace("index.php");

    </script> ';

 }

else {
    echo '
    <script type="text/javascript">
        
        alert("Failed:Try again");

        window.location.replace("index.php");

    </script> ';

 }

 
?>