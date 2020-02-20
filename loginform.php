<?php

#1-to store server variables we use a core fie used to carry core data

if(isset($_POST['username'])&&isset($_POST['password'])){
	
#WE NOW CREATE VARIABLES AND ASSIGN THEM
$username =$_POST['username'];
$password =$_POST['password'];
$pass_hash =md5($password);    #we take this because we are using md5 encryption;
//they should not be empty ,so we check for that
if(!empty($username)&&!empty($password)){

//now we take query to connect to databse
$query ="SELECT `id` FROM `users` WHERE `username`='$username' AND `password`='$pass_hash' ";

#now we have to run query


if($query_run =mysqli_query($mycon,$query))	{ 
	
//if this query runs we have to find no of rows returned

 $num_rows =mysqli_num_rows($query_run);	//we ECHO this for showing display results of un and pw.

if($num_rows==0){   #if the credentials are not correct it returns invalid un and pw.
	echo 'Invalid username and password';
}else if($num_rows==1){  #IF CREDENTIALS are correct it returns ok, so now we start session,so we create or set session variable
	
	$row =mysqli_fetch_row($query_run);
	
	echo $id =$row[0];  #now we store in session variable
	$_SESSION['user_id'] = $id;
	
#WE USE HEADER FUNCTION TO AUTOMATICALLY REFRESH	
//to use header function we should add ob start functions in core

header('Location: index.php');

#Seesion will be closed when we close browser	
	
}
}
}	else{
	echo 'enter your username and password';
}
	
}

?>

<form action="<?php echo $current_file ?>" method ="POST">

Username:
<input type="text" name="username"><br><br>
Password:
<input type="password" name="password"><br><br>
<input type="submit" value="login">


</form>