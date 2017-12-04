<?php
session_start();
include "connection/connection.php"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale-1">
<title>geekfocus | Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="js/all.js"></script>
</head>

<body style="padding-top:50px;">		
<div class="row" id="nav">
	<?php include "include/navbar.php"?>
</div>

<p>&nbsp;</p>

<div class="container">
	
	<div class="row">
		<div class="col-lg-12">
			<table width="27%" height="200" border="0">
  <tr>
    <td align="center" ><img height="200px" width="200px" src="image/12054015.jpg" class="thumbnail" /></td>
  </tr>
</table>

		</div>	
		<div class="row">
			<div class="col-lg-3 col-lg-offset-1">
				<h5 ><B>Rangan Roy</B></h5>
				<h5><B>Kolkata, India</B></h5>
				<h5><B>roy.rangan7@gmail.com</B></h5>
			</div>
			<div class="col-lg-2 col-lg-offset-2"> World
			</div>
		</div>	
	</div>
	
</div>
</body>
</html>