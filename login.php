<?php
include "connection/connection.php";

if(isset($_POST['Submit']))
{
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$login_statement="select * from login_master where email_id='$email' and status='1'";
	$login_query=mysql_query($login_statement);
	$login_num_rows=mysql_num_rows($login_query);
	if($login_num_rows > 0){
		$login_result=mysql_fetch_assoc($login_query);
		$login_password=$login_result['password'];
		if($login_password == $password)
		{
			$user_details_master_statement="select * from user_details_master where user_id='$login_result[user_id]' and contact_status='1'";
			$user_details_master_query=mysql_query($user_details_master_statement);
			$user_details_master_result=mysql_fetch_assoc($user_details_master_query);
			session_start();
			$_SESSION['user_id']=$login_result['user_id'];
			$_SESSION['email_id']=$login_result['email_id'];
			$_SESSION['full_name']=$user_details_master_result['full_name'];
			echo "<script>
						alert('Logged In Successfully');
						location.replace('dashboard.php?')
				  </script>";
						
		}else{
			
			echo "<script>
						alert('Pasasword Not Correct');
						location.replace('login.php?')
				  </script>";	
		}
	}else{
	
			echo "<script>
						alert('Email Id Does Not Match');
						location.replace('login.php?')
				  </script>";
		
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>My Project | Log In</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<script type="text/javascript" language="javascript" src="js/all.js"></script>
</head>

<body>
<p>&nbsp;</p>

<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center"> <h1>Log In </h1> 
		</div>
	</div>
	<div> &nbsp;</div>
	<div class="row">
		<div class="col-lg-12 text-center"> <h4>Sign In To Your Account </h4> 
		</div>
	</div>
	<div> &nbsp;</div>
	<div class="row">
	 <div class="col-lg-4 col-sm-6 col-lg-offset-4 col-sm-offset-3"  style="background-color:#E6E6E6">
		<form id="form1" name="form1" method="post" action="" onsubmit="return chk_null()">
				  <div class="form-group">
						<p> 
							<h2 class="login_name_color"> <strong> Log In </strong> </h2> 
						</p>		
						<label for="email"> Email Id </label>
						<input class="form-control" name="email" type="text" id="email" placeholder="Email Id" />
				 </div>
				  <div class="form-group">
						<label for="password"> Password </label>
						<input class="form-control" name="password" type="password" id="password" placeholder="Password" />
				 </div>
				 <div class="form-group" align="center">
				 		<input type="submit" name="Submit" value="Log In" class="btn btn-primary btn-block" />
				 </div>
				 <div class="form-group" align="right"><a href="index.php" class=" btn btn-info "> Sign Up </a> </div>
	    </form>
		</div>  
	  </div>
	</div>
		<div> &nbsp;</div>
</div>
</body>
</html>
