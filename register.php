<?php
   require 'core.php';
   require 'dbconnect.php'; 

   if(Loggedin()){
		echo'You are already Registered and Logged in.';
	
   }else if(!Loggedin()){

		if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['pass_again'])&&isset($_POST['firstname'])&&isset($_POST['lastname']))
		{
			//Validations
			$username =$_POST['username'];  
			$password =$_POST['password'];
			$pass_again =$_POST['pass_again'];
			$firstname =$_POST['firstname'];
			$lastname  =$_POST['lastname'];
			
			$pass_hash = md5($password);
			
			if(!empty($username)&&!empty($password)&&!empty($pass_again)&&!empty($firstname)&&!empty($lastname)){
			

		   if($password !=$pass_again){  
				echo 'passwords donot match';
			}else{
				//Check if username already taken

				echo $query = "SELECT `username` FROM `users` WHERE `username` ='$username' "; 


				if($query_run=mysqli_query($mycon,$query)){
					
					$num_rows = mysqli_num_rows($query_run);
				
				if($num_rows ==1){
					echo 'username already exists. ' ;
				}else if($num_rows==0){   
					
					echo $query ="INSERT INTO `users`(`id`,`username`,`password`,`firstname`,`surname`) VALUES(NULL , '$username','$pass_hash','$firstname','$lastname')";

					if($query_run = mysqli_query($mycon, $query)){
						header('Location: succes.php');

					}
	
	
				}
			}
		}
	}else{
		echo 'All Fields are Required';
	}
	}
}
?>
    <h2>Register</h2>
   <form action="register.php" method="POST">
   Username:<br>
    <input type="text" name="username"><br><br>
    Password:<br>
    <input type="password" name="password"><br><br>
    password again:<br>
     <input type="password" name="pass_again"><br><br>
    Firstname:<br>
    <input type="text" name="firstname"><br><br>
    Lastname:<br>
     <input type="text" name="lastname"><br><br>

     <input type="submit" value="Register">
      </form>