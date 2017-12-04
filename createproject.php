<?php
session_start();
include "connection/connection.php";
include "include/functions.php";
$zip = new ZipArchive;
if(isset($_POST['Submit']))
{
	if($_POST['Submit'] == "Create Project")
	{
		$project_name = $_POST['projname'];
		$project_description = $_POST['projdesc'];
		$project_files=$_FILES['file']['name'];
		$privacy_type = $_POST['projtype'];
		//echo $privacy_type;exit;
		//echo $project_file_type;exit;
		#echo $file;exit;
		$fetch_space_name = "select * from space_master where user_id='$_SESSION[user_id]'";
		$fetch_space_name_query = mysql_query($fetch_space_name);
		$fetch_space_name_result = mysql_fetch_assoc($fetch_space_name_query);
		$project_name_fetch = "select * from project_master where user_id='$_SESSION[user_id]' and project_name='$project_name'";
		$project_name_query = mysql_query($project_name_fetch);
		$project_count = mysql_num_rows($project_name_query);
		if($project_count > 0)
		{
			echo "<script>
					alert('Project Exist With The Same Name');
					location.replace('createproject.php?');
				  </script>";
		}else{
				$project_statement = "insert into project_master(user_id,project_name,project_description,privacy_status) 				values('$_SESSION[user_id]','$project_name','$project_description','$privacy_type')";
				$project_query = mysql_query($project_statement);
				$project_pk = mysql_insert_id();
				list($first_name,$extension) = explode(".",$project_files);
				//$new_file_name = $project_name;
				if ($zip->open($project_files) === TRUE) 
				{
					$zip->extractTo($fetch_space_name_result['space_path'].'/'.$project_name);
					$zip->close();	
				}	
				chkdir($fetch_space_name_result['space_path'], $project_name, $first_name, $project_pk);
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<style type="text/css">
<!--
body {
	background-color: #F3F3F3;
}
-->
</style>
</head>

<body>
	<div class="row">
		<?php include "include/navbar.php"?>
	</div>
	<br />
	<br />
	<br />
	<div class="row">
	 <div class="col-lg-4 col-sm-6 col-lg-offset-4 col-sm-offset-3" style="background-color:#E6E6E6">
		<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >
		<br />
		  		 <div class="form-group">
						<label for="projname"> Project Name </label>
						<input class="form-control" name="projname" type="text" id="projname" placeholder="Project Name" />
				 </div>
				 <div class="form-group">
								<label for="projtype"> Project Type </label>
					<br />
								<label>
									<input type="radio" name="projtype" value="0" />
									Public
								</label>
					<br />
								<label>
									<input type="radio" name="projtype" value="1" />
									Private
								</label> 
				  </div>
				  <div class="form-group">
						<label for="pdesc"> Project Description </label>
						<textarea class="form-control" rows="5" id="projdesc" name="projdesc"></textarea>
				 </div>
				 
				 <div class="form-group">
						<label for="file"> Upload Project File </label>
						<input name="file" id="file" type="file" />
				 </div>
				 
				 <div class="form-group" align="center">
				 		<input type="submit" name="Submit" value="Create Project" class="btn btn-primary btn-block" />
				 </div>
	    </form>
		</div>  
	  </div>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="js/bootstrap.min.js"></script>
	  <script type="text/javascript" language="javascript" src="js/all.js"></script>
</body>
</html>
