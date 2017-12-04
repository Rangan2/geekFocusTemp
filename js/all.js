// JavaScript Document

	function chk_null()
	{
		if (document.getElementById("fullname").value=="")
		{
			alert("Please Enter Your Full Name")
			document.getElementById("fullname").focus();
			return false;
		}
		return true;
	}
	
	$(":file").filestyle({icon: false});