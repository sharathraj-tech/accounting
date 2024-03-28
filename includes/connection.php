<?php 
$host="localhost:3306";
$user="thesoftb_sharath";
$password="Sharu@143";
$database="thesoftb_accounts";

$con=mysqli_connect($host,$user,$password,$database);

if(!$con)
{
	echo "Failed to Connect : ".mysqli_error($con);
}else
{
	//echo 'Connection Successful';
}
?>