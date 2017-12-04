<nav class="navbar navbar-default navbar navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-target=".navbar-collapse " data-toggle="collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="dashboard.php"><B>Home</B></a></li>
					<li><a href="content.php?user=<?php echo $_SESSION['user_id'];?>"><B>Your Products</B></a></li>
					<li><a href="contact.php"><B>Contact</B></a></li>
				</ul>
				<form class="navbar-form navbar-left"  role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search" />
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>	
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><b><?php echo $_SESSION['full_name'];?></b><span class="caret"></span></a>
         				 <ul class="dropdown-menu">
         				   <li><a href="profile.php">Your Profile</a></li>
            			   <li><a href="#">Change Password</a></li>
						   <li role="separator" class="divider"></li>
						   <li><a href="#">Sign Out</a></li>
          				 </ul>
					</li>  	
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav>