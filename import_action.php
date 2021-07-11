<?php 


require_once __DIR__.'/db-connect.php';
require_once __DIR__.'/session.php';
require_once __DIR__.'/sql_functions.php';

sec_session_start();


$url="https://localhost:8080/api/library?page=2&title=and";

$ch=curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch,CURLOPT_URL,$url);

$books=curl_exec($ch);

$books=json_decode($books,true);

$books=$books['message'];
print_r($books);
 
foreach ($books as $key => $val) {

	 
		
	$book_id=$val['bookID'];

 	insert_value('books','book_id',$book_id);

 	update_value($val['title'],'books','book_name','book_id',$book_id);
 	update_value($val['authors'],'books','book_author','book_id',$book_id);

 	update_value($val['isbn'],'books','isbn','book_id',$book_id);
 	update_value($val['publisher'],'books','book_publisher','book_id',$book_id);
	update_value($val['num_pages'],'books','book_pages','book_id',$book_id);
 
}

curl_close($ch);



?>
