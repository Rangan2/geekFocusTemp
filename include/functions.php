<?php

function chkdir($project_path_name, $project_name, $file_name, $project_pk)
{
	$dir = $project_path_name."/".$project_name;
	
	echo $dir;
	//$pk = 0;
	$track = "";
	//echo $dir;exit;
	if(is_dir($dir))
	{
		//echo "Directory";exit;
		//echo "Directory path is : ".$dir;
		//$dir_extract = scandir($dir);
		$dir_extract = directory_extract($project_path_name,$project_name);	
		//echo "@After Extracing :".$dir_extract[2];
		//echo "@Project File name is :".$project_name;
		//print_r($dir_extract);
		if($dir_extract[2] == $project_name )
		{
			echo "Inside if condition";
			//$track = $track."@".$dir_extract[2];
			$project_path_name=$project_path_name."/".$dir_extract[2];
			$sql = "insert into directory_master(project_id, dir_name, parent_dir, dir_path) values('$project_pk', '$project_name', 0, '$project_path_name/$project_name' )";
			$rec = mysql_query($sql);
			chkdir($project_path_name, $file_name, $file_name, $project_pk);	
		}else{
			echo "Inside Else Condition";
			echo "$project_path_name : ".$project_path_name;
			echo "  ".$dir_extract[2];
			exit;
			$project_path_name=$project_path_name."/".$dir_extract[2];
			$pk = mysql_insert_id();
			$sql = "insert into directory_master(project_id, dir_name, parent_dir, dir_path) values('$project_pk', '$project_name', '$pk', '$project_path_name/$project_name' )";
			$rec = mysql_query($sql);
			$dir_extract = directory_extract($project_path_name,$file_name);		
			
			echo "Inside Else Condition :";
			print_r($dir_extract);
		}
	}
}
function directory_extract($path_name, $file_name)
{
	$dir = $path_name."/".$file_name;
	return scandir($dir);
}
?>
