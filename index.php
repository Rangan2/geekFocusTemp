<?php
include "connection/connection.php";
if(isset($_POST['Submit']))
{
		$full_name = $_POST['fullname'];
		$email_id = $_POST['email'];
		$password = md5($_POST['password']);
		$rpassword = md5($_POST['confirmPassword']);
		$contact_number = $_POST['contactNumber']; 
		#echo $full_name;
		$verify_userName = "select * from login_master where email_id='$email_id'";
		//echo $verify_userName;
		$verify_userName_record = mysql_query($verify_userName);
		$verify_userName_rowNum = mysql_num_rows($verify_userName_record);
		//echo $verify_userName_rowNum;exit;
		if($verify_userName_rowNum > 0)
		{
			echo "<script>
					alert('Email Id Already Exist !!!')
					location.replace('index.php?');
				  </script>";
		}else{
			$sql_ins_statment = "insert into login_master(email_id,password) values('$email_id', '$password')";
			//echo $sql_ins_statment;
			$sql_ins_record = mysql_query($sql_ins_statment);
			$user_id = mysql_insert_id();
			$input_path = "projects/".$user_id."_".$full_name;
			if($sql_ins_record)
			{
				$sql_ins_statement_user_details = "insert into user_details_master(user_id,full_name,contact_number) values('$user_id', '$full_name', 							'$contact_number')";
				$sql_ins_user_details_record = mysql_query($sql_ins_statement_user_details);
				
				if($sql_ins_user_details_record)
				{
					mkdir($input_path);
					$space_master_statement="insert into space_master(user_id,space_path) values('$user_id','$input_path')";
					//echo $space_master_statement;exit;
					$space_master_query=mysql_query($space_master_statement);
					if($space_master_query)
					{
						echo "<script>
								alert('Account Created Successfully');
								location.replace('index.php?')
							  </script>";
					}else{
							echo "<script>
								alert('Account Does Not Created Successfully');
								location.replace('login.php?')
							  </script>";
					}
				}else{
					
					echo "<script>
							alert('Account Does Not Created Successfully');
							location.replace('index.php?')
						  </script>";
				}
			}else{
					echo "<script>
							alert('Account Does Not Created Successfully');
							location.replace('index.php?')
						  </script>";
			}
		}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>My Project | Index</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<script type="text/javascript" language="javascript" src="js/all.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center"> <h1>Create Account</h1> </div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center"> <h4> Save Your Project Details  </h4> </div>
	</div>
	
	<div class="row">
	 <div class="col-lg-4 col-sm-6 col-lg-offset-4 col-sm-offset-3" style="background-color:#E6E6E6">
		<form id="form1" name="form1" method="post" action="" onsubmit="return chk_null()">
		 <p> <h2 class="login_name_color"> <strong> Sign Up </strong> </h2> </p>
		  		 <div class="form-group">
						<label for="fullname"> Full Name </label>
						<input class="form-control" name="fullname" type="text" id="fullname" placeholder="Full Name" />
				 </div>
				  <div class="form-group">
						<label for="email"> Email Id </label>
						<input class="form-control" name="email" type="text" id="email" placeholder="Email Id" />
				 </div>
				  <div class="form-group">
						<label for="password"> Password </label>
						<input class="form-control" name="password" type="password" id="password" placeholder="Password" />
				 </div>
				  <div class="form-group">
						<label for="confirmPassword"> Confirm Password </label>
						<input class="form-control" name="confirmPassword" type="password" id="confirmPassword" placeholder="Confirm Password" />
				 </div>
				  <div class="form-group">
						<label for="contactNumber"> Contact Number </label>
						<input class="form-control" name="contactNumber" type="text" id="contactNumber" placeholder="Contact Number"  />
				 </div>
				 <div class="form-group" align="center">
				 		<input type="submit" name="Submit" value="Sign Up" class="btn btn-primary btn-block" />
				 </div>
				 <div class="form-group" align="right"><a href="login.php" class=" btn btn-info "> Log In</a> </div>
	    </form>
		</div>  
	  </div>
	</div>
		<div> &nbsp;</div>
</div>
</body>
</html>
