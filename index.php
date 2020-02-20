<?php
//CREATE A USER IN DB TABLE,USE MD5 PASSWORD.
//use md5 to encrypt password pass123
//CONNECT TO SERVER
//now connect to DB.
#now connect to login form

require 'dbconnect.php';
require 'core.php';


#WE CREATE THIS VARIABLE TO GET LOGOUT LINK

$Logout_txt = '<a href ="logout.php">Logout</a>';

//include 'form.php';

  if(Loggedin()){
	 /* echo getuserfield('firstname');
	   echo getuserfield('surname');*/
	   #now we take this in variables.
	   $firstname = getuserfield('firstname');
	   $surname = getuserfield('surname');
	echo '<br>WELCOME, '.$firstname.' '.$surname.' '.$Logout_txt;
}else{
	include 'form.php';
}

/*if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){   #to use this function anywhere we use function on core
	echo 'you are logged in';
}else{
	
	echo 'loginform.php'; //if the user doesnt login the form displays
	
}*/



?>