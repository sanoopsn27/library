<?php 

 

if($_GET['logout'])

{
	session_destroy();

	header("location:index.php");
} 
else
{
	header("location:welcome.php");
}


?>