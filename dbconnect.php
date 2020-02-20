<?php
$host ='localhost';
$user ='root';   //change to default user name to cnct to DB.
$pass ='';
$dbname ='company';
//use @->to remove worning
if($mycon = @mysqli_connect($host,$user,$pass)){    
//connected to server

#now connect to database

if(!mysqli_select_db($mycon,$dbname)){
	echo 'not conneceted to db';
}
}
else{
echo	'not conneceted to server';
}
?>