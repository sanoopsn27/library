<?php 

function stringTruncate($string, $limit, $break=".", $pad="...")
{
  if(strlen($string) <= $limit) return $string;

  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}


function insert_value($table_name,$table_col,$var_element){
  require __DIR__.'/db-connect.php';

  if($var_element!=''){

    $insert_query='INSERT INTO '.$table_name.' ('.$table_col.') VALUES (?)';
    $insert_stmt = $mysqli->prepare($insert_query); 
    $insert_stmt->bind_param('s',$var_element);
    $insert_stmt->execute();
    $insert_stmt->close();
  }


}

function update_value( $var_element,$table_name,$table_col,$table_primary_key,$table_primary_val,$dtype='s',$additional=" " ){
  require __DIR__.'/db-connect.php';


  if($var_element!='' && $dtype=='s'){

    $update_query="UPDATE ".$table_name."  SET ".$table_col."= '". $var_element."'  WHERE ".$table_primary_key." = '".$table_primary_val."' ".$additional;

    $update_stmt = $mysqli->query($update_query); 

  }else {
   $update_query="UPDATE ".$table_name."  SET ".$table_col."= ". $var_element."  WHERE ".$table_primary_key." = '".$table_primary_val."' ".$additional;

   $update_stmt = $mysqli->query($update_query); 

 }

}


function extractRecord($outcol,$incol,$inval,$table,$additional=''){
  require __DIR__.'/db-connect.php';

  $sql = "SELECT ".$outcol." FROM `".$table."` WHERE ".$incol." = '".$inval."' ". $additional." " ;
  $result = $mysqli->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     $output[]=$row; 
   }
   return $output;
 } else {
   return "NO-DATA";
 }

 $mysqli->close();

}

function extractAll($outcol,$table,$additional=''){
  require __DIR__.'/db-connect.php';

  $sql = "SELECT ".$outcol." FROM `".$table."` ". $additional." " ;
  $result = $mysqli->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     $output[]=$row; 
   }
   return $output;
 } else {
   return "NO-DATA";
 }

 $mysqli->close();

}


function droprecord($table,$col,$value,$additional=''){
  require __DIR__.'/db-connect.php';

  $insert_stmt = $mysqli->prepare("DELETE FROM `".$table."` WHERE ".$col." = ? ". $additional); 
  $insert_stmt->bind_param('s', $value);
  $insert_stmt->execute();
  $insert_stmt->close();
}

function joinTables($selectcols,$jointa,$jointb,$jointtype,$pkey,$fkey, $additional='',$sizeflg=1){
  require __DIR__.'/db-connect.php';
  $output=[];
  $sql = "SELECT ".$selectcols." FROM `".$jointa."` ".$jointtype." JOIN `".$jointb."` ON  ".$pkey." = ".$fkey." " .$additional ;
  $result = $mysqli->query($sql);
  if ($result->num_rows > 0) {

    if($sizeflg!=2){

      while($row = $result->fetch_assoc()) {
       $output[]=$row; 
     }
   }

   if($sizeflg==1){
     return array($result->num_rows,$output);
   }else if($sizeflg==2){
    return  $result->num_rows;

  } else{
   return  $output;
 }

} else {
  if($sizeflg==1){
   return array($result->num_rows,$output);
 }else if($sizeflg==2){
  return  $result->num_rows;

}  

else{
 return  $output;
}
}

$mysqli->close();

}

 function extract_cell($outcol,$incol,$invalue,$table,$additional=''){
  require __DIR__.'/db-connect.php';

  $sql = "SELECT ".$outcol." FROM ".$table." WHERE ".$incol." = '".$invalue."' ".$additional;
  $result = $mysqli->query($sql);
  if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()) {
     $output=$row[$outcol]; 
   }
   return $output;
 } else {
   return "NO-DATA";
 }

 $mysqli->close();

}


function sql_query_raw($query ){
  require __DIR__.'/db-connect.php';
  $insert_stmt = $mysqli->query($query); 
}

function getmem_namebymem_id($catid){
  return extract_cell('member_name','member_id',$catid,'membership');
}

function getbook_namebybook_id($catid){
  return extract_cell('book_name','book_id',$catid,'books');
}

function getbook_stockbybook_id($catid){
  return extract_cell('book_stock','book_id',$catid,'books');
}
 
?>