<?php require 'footer.php';?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-department" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="id" value="">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Name</label>
							<input type="text" class="form-control form-control-sm" name="name" value="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Status</label>
							<select name="status" id="status" class="custom-select custom-select-sm">
								<option value="Pending">Pending</option>
								<option value="On-Hold">On-Hold</option>
								<option value="Done">Done</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Start Date</label>
							<input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date" value="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">End Date</label>
							<input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date" value="">
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col-md-6">
							<div class="form-group">
							<label for="" class="control-label">Project Team Members</label>
							<select class="form-control form-control-sm select2" multiple="multiple" name="user_ids[]">
									<?php 
									require 'DB.php';
                                     if (isset($_SESSION['admin'])) {
							               	
							                 $id=$_SESSION['admin']->manger_id ;
							               
							                 $selectEmploye=$db->prepare("SELECT * FROM  employee WHERE Manager_Name =:id");
							                 $selectEmploye->bindparam("id",$id);                                  
							                  $selectEmploye->execute();

                                  foreach ($selectEmploye as $key ) {
                                   	echo '<option value="'.$key['employee_id'].'">'.$key['First_Name'].$key['Last_Name'].'</option>'; }



                                ?>
					
                              </select> 					


							
						</div>
							<?php  echo  '<input type="hidden" name="id" value="'.$_SESSION['admin']->manger_id.'">'; 
                                   }?>		
                     
					</div>
					<div class="col-md-6">
						
					</div>

					


				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label for="" class="control-label">Description</label>
							<textarea name="description" id="" cols="30" rows="10" class="summernote form-control">

					</textarea>
						</div>
					</div>
				</div>
					
			
		</div>
		<div class="card-footer border-top border-info">
			<div class="d-flex w-100 justify-content-center align-items-center">
						<button class="btn btn-primary mr-2" type="submit" name="submit">Save</button>
	
				<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=project_list'">Cancel</button>
			</div>
			
		</div>
	</div>
</div>
</form>
<?php 
			if (isset($_POST['submit'])) {
				require 'DB.php';

                 $Emploey_Name=$_POST['user_ids'];
                
                 $user_ids=implode(",", $Emploey_Name);
                 if ( isset($user_ids)==isset($Emploey_Name)) {
                 	     $user_ids=$user_ids;
                 	  
                 }
                 else{
                    	$user_ids=$Emploey_Name;
                    	
                 }
               
           
                
				$INSERT=$db->prepare("INSERT INTO emploeyeetask (Subject,comment	,Stuts,Start,Endd,Emploey_Name,manger_id) VALUES (:Subject,:comment,:Stuts,:Start,:Endd,:Emploey_Name,:manger_id)");
				
				$INSERT->bindparam("Subject",$_POST['name']);

				$INSERT->bindparam("comment",$_POST['description']);
				$INSERT->bindparam("Stuts",$_POST['status']);
				$INSERT->bindparam("Start",$_POST['start_date']);
				$INSERT->bindparam("Endd",$_POST['end_date']);
				$INSERT->bindparam("Emploey_Name",$user_ids);
				$INSERT->bindparam("manger_id",$id);
				if ($INSERT->execute()) {
					
				}
				else{
					echo "Erorr";
				}
                  

            















				// $fileName=$_FILES['image']['name'];
				// $fileTmp=$_FILES['image']['tmp_name'];
				// $position="image/".$fileName;
				// $INSERT=$db->prepare("INSERT INTO admn_task (,Subject	,fileName,position,comment	,Stuts,Start,Endd) VALUES (:Manager_Name,:Subject	,:fileName,:position,:comment,:Stuts,:Start,:Endd)");
				// $INSERT->bindparam("Manager_Name",$_POST['manager_id']);
				// $INSERT->bindparam("Subject",$_POST['name']);
				// $INSERT->bindparam("fileName",$fileName);
				// $INSERT->bindparam("position",$position);
				// $INSERT->bindparam("comment",$_POST['description']);
				// $INSERT->bindparam("Stuts",$_POST['status']);
				// $INSERT->bindparam("Start",$_POST['start_date']);
				// $INSERT->bindparam("Endd",$_POST['end_date']);
				// if ($INSERT->execute()) {
				// 	move_uploaded_file($fileTmp,"image/$fileName");
				// }
				// else{
				// 	echo "Erorr";
				// }

			}
			?>
<script>
	// $('#manage-project').submit(function(e) {
	// 	e.preventDefault()
	// 	start_load()
	// 	$.ajax({
	// 		url: 'ajax.php?action=save_project',
	// 		data: new FormData($(this)[0]),
	// 		cache: false,
	// 		contentType: false,
	// 		processData: false,
	// 		method: 'POST',
	// 		type: 'POST',
	// 		success: function(resp) {
	// 			if (resp == 1) {
	// 				alert_toast('Data successfully saved', "success");
	// 				setTimeout(function() {
	// 					location.href = 'index.php?page=project_list'
	// 				}, 2000)
	// 			}
	// 		}
	// 	})
	// })
</script> 