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
<style type="text/css">
<!--
body {
	background-color: #F9F9F9;
}
-->
</style>

</head>

<body style="padding-top:50px;">		
<div class="row" id="nav">
	<?php include "include/navbar.php"?>
</div>
<br />
<br />

<div class="container">
	<div class="row">
	<?php
		$menu_master_statement="select * from menu_master where menu_parent='0' and menu_status='1'";
		$menu_master_query=mysql_query($menu_master_statement);
		$i=0;
		while($menu_master_result=mysql_fetch_assoc($menu_master_query))
		{
	?>
		<div class="col-lg-6" style="padding-bottom:10px;">
		  <table width="70%" border="0" align="center" style="background-color:#FFFFFF;border:1px solid #D4D4D4; border-radius:8px">
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td width="10%" align="left">&nbsp;</td>
                <td width="65%" align="left"><h4><?php echo $menu_master_result['menu_name'];?></h4></td>
                <td width="25%" align="left">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
			  <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
			  <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
			  <tr>
                <td colspan="3" align="center" >&nbsp;</td>
              </tr>
			  <tr>
                <td colspan="3" align="right">&nbsp;</td>
              </tr>
			  <tr>
			    <td colspan="3">&nbsp;</td>
		    </tr>
			  <tr>
			    <td colspan="3" align="right"><table width="80%" border="0">
                  <tr>
                    <td width="44%">&nbsp;</td>
                    <td width="48%" align="center"><a href="<?php echo $menu_master_result['menu_link'] ?>" style="color:#FFFFFF"><table width="100%" border="0" style="background-color:#337ab7; cursor:pointer" >
                        <tr>
                          <td height="40" align="center" > GO</td>
                        </tr>
                    </table></a></td>
                    <td width="8%">&nbsp;</td>
                  </tr>
                </table>			      <a href="<?php echo $menu_master_result['menu_link'] ?>"  style="color:#FFFFFF" ></a></td>
		    </tr>
			  <tr>
			    <td colspan="3" align="right">&nbsp;</td>
		    </tr>
			  <tr>
			    <td colspan="3" align="right">&nbsp;</td>
		    </tr>
          </table>
		</div>
		<?php
			
		}
		?>
	</div>
</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/all.js"></script>
</body>
</html>