<?php
                                 //CORE FILE SHOULD BE FIRSR IN INDEX FILE
  ob_start();
   session_start();                       #we write here because it will be included everywhere
 /*storing a server variable*/$current_file =$_SERVER['SCRIPT_NAME'];    //if we echo this it gives the file path

     function Loggedin(){
	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
      
	  return true;
		
       }else{
	return false;
}
}

function getuserfield($field){
	global $mycon;   #to use this in function
	$id =$_SESSION['user_id'];
	#now we write query
	$query ="SELECT `$field` FROM `users` WHERE `id`=$id ";
	#we have to run query now
	if($query_run =mysqli_query($mycon,$query)){
		
      #now we take no of rows returned
     $num_rows = mysqli_num_rows($query_run);
	   
		 if($num_rows==1){
			 
			 $row =mysqli_fetch_row($query_run); #we got an array to return value
			 return $row[0];
		 }
	}
}
?>