$update_project_master = "update project_master set project_file_name='$new_file_name' where project_id='$project_pk'";
					$update_project_query = mysql_query($update_project_master);
					if($zip->open("zipped_files/".$new_file_name))
					{
						$zip->extractTo($fetch_space_name_result);
						$zip->close();
					}