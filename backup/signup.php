<?php
include "connection/connection.php";
if(isset($_POST['Submit']))
{
		$full_name = $_POST['fname'];
		$email_id = $_POST['email_id'];
		$password = md5($_POST['password']);
		$rpassword = md5($_POST['rpassword']);
		$contact_number = $_POST['contact']; 
		echo $full_name;
		$sql_ins_statment = "insert into login_master(email_id,password) values('$email_id', '$password')";
		//echo $sql_ins_statment;
		$sql_ins_record = mysql_query($sql_ins_statment);
		$user_id = mysql_insert_id();
		if($sql_ins_record)
		{
			$sql_ins_statement_user_details = "insert into user_details_master(user_id,full_name,contact_number) values('$user_id', '$full_name', 							'$contact_number')";
			$sql_ins_user_details_record = mysql_query($sql_ins_statement_user_details);
			
			if($sql_ins_user_details_record)
			{
				echo "<script>
						alert('Account Created Successfully');
						location.replace('signup.php?')
					  </script>";
			}
		}
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INDEX</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<script type="text/javascript" language="javascript" src="js/all.js"></script>
</head>

<body>
<p>&nbsp;</p>
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center"> <h1>Create Account</h1> </div>
	</div>
	<div> &nbsp;</div>
	<div class="row">
		<div class="col-lg-12 text-center"> <h4> Save Your Project Details  </h4> </div>
	</div>
	<div> &nbsp;</div>
	<div class="row">
	 <div class="col-lg-12">
		<form id="form1" name="form1" method="post" action="" onsubmit="return chk_null_index()">
            <div class="table-responsive">
              <table width="85%" border="0" align="center" class="table-condensed indx_inner_table" style="background-color:#EFEFEF">
                <tr>
                  <td align="right" valign="top">&nbsp;</td>
                  <td align="center" valign="top">&nbsp;</td>
                  <td align="left" valign="top">&nbsp;</td>
                </tr>
                <tr>
                  <td width="48%" align="right" valign="top">Full Name </td>
                  <td width="6%" align="center" valign="top">:</td>
                  <td width="46%" align="left" valign="middle"><input name="fname" type="text" id="fname" /></td>
                </tr>
                <tr>
                  <td align="right" valign="top">Email Id </td>
                  <td align="center" valign="top">:</td>
                  <td align="left" valign="middle"><input name="email_id" type="text" id="email_id" /></td>
                </tr>
                <tr>
                  <td align="right" valign="top">Password</td>
                  <td height="10" align="center" valign="top">:</td>
                  <td height="10" align="left" valign="middle"><input name="password" type="password" id="password" /></td>
                </tr>
                <tr>
                  <td align="right" valign="top">Re-Password</td>
                  <td height="30" align="center" valign="top">:</td>
                  <td height="30" align="left" valign="middle"><input name="rpassword" type="password" id="rpassword" /></td>
                </tr>
                <tr>
                  <td align="right" valign="top">Contact Number </td>
                  <td height="10" align="center" valign="top">:</td>
                  <td height="10" align="left" valign="middle"><input name="contact" type="text" id="contact" /></td>
                </tr>
                <tr align="left">
                  <td height="30" align="right" valign="middle" >&nbsp;</td>
                  <td height="30" align="center" valign="middle" >&nbsp;</td>
                  <td height="30" valign="top" ><input type="submit" name="Submit" value="Submit" class="btn btn-primary"/></td>
                </tr>
                <tr>
                  <td height="30" colspan="3" align="center" valign="top">&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" colspan="3" align="center" valign="top" onclick="redirect('index.php')" class="index_create_account_link">Sign In </td>
                </tr>
              </table>
          </div>
	    </form>
		</div>  
	  </div>
	</div>
</div>
</body>
</html>
