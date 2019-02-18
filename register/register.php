<?php
mysql_connect("localhost","root","");
mysql_select_db("sasiac_anveshana");

//query
$sql=mysql_query("SELECT name FROM colleges");
if(mysql_num_rows($sql)){

$select.='<option >Select</option>';
while($rs=mysql_fetch_array($sql)){
      $select.='<option >'.$rs['name'].'</option>';
  }
}
$select.='<option value="Other">Other</option>';
$select.='</select>';
echo $select;
?>
