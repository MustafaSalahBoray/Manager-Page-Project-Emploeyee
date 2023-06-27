   <link rel="stylesheet" type="text/css" href="Library/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Style.css">
  <script type="text/javascript" src="Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Library/js/jquery-3.6.1.min.js"></script>
      <link rel="stylesheet" href="A-Send Task/css/bootstrap.min.css">
      <?php include 'header.php';
       include 'topbar.php' ;
       include 'sidebar.php';
        require 'DB.php'; 
           if (isset($_GET['edit'])) {
       $select=$db->prepare("SELECT * FROM  emploeyeetask WHERE id=:id");
       $select->bindparam("id",$_GET['edit']);
       $select->execute();
       foreach ($select as $key ) {
       	// code...
       
        

        ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary ">
		<div class="card-body " style="width:1400;margin: auto; margin-right:50px">
			<form action="" id="manage-department" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="id" value="">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Name</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo $key['Subject']?>">
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
							<input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date" value="<?php echo $key['Start']?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">End Date</label>
							<input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date"value="<?php echo $key['Endd']?>" >
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Project Employee</label>
							<select class="form-control form-control-sm select2" name="manager_id">
							  	<?php  }}
							  	require'DB.php';
                                   
                if (isset($_SESSION['admin'])) {
                    $x=1;
                 $id=$_SESSION['admin']->manger_id ;
                 require 'DB.php';
                 $selectEmploye=$db->prepare("SELECT * FROM  employee WHERE Manager_Name =:id");
                 $selectEmploye->bindparam("id",$id);
                 $selectEmploye->execute();
                 
                 	foreach ($selectEmploye as $key ) {
                                   echo '<option value="'.$key['employee_id'].'">'.$key['First_Name'].$key['Last_Name'].'</option>';
                              }}
                                     

								?>
							
							</select>
						</div>
					</div>
					

					


				</div>
				<div class="row">
					  <?php     if (isset($_GET['edit'])) {
       $select=$db->prepare("SELECT * FROM emploeyeetask WHERE id=:id");
       $select->bindparam("id",$_GET['edit']);
       $select->execute();
       foreach ($select as $key ) {?>
					<div class="col-md-10">
						<div class="form-group">
							<label for="" class="control-label">Description</label>
							<textarea name="description" id="" cols="30" rows="10" class="summernote form-control">
                             <?php echo $key['comment']?>
					</textarea>
						</div>
					</div>
				</div>
			
		</div>
		<div class="card-footer border-top border-info">
			<div class="d-flex w-100 justify-content-center align-items-center">
						<button class="btn btn-primary mr-2" type="submit" name="submit" value="<?php echo $key['id']?>">Save</button>
	
				<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=project_list'">Cancel</button>
			</div>
			
		</div>
	</div>
</div><?php }}?>
</form>
<?php
			if (isset($_POST['submit'])) {
				require 'DB.php';
		
				
				$INSERT=$db->prepare("UPDATE  emploeyeetask SET  Emploey_Name	=:Emploey_Name	,Subject=:Subject,comment=:comment	,Stuts=:Stuts,Stuts=:Stuts,Endd=:Endd WHERE id=:id");
				$INSERT->bindparam("Emploey_Name",$_POST['manager_id']);
				$INSERT->bindparam("Subject",$_POST['name']);
			
				$INSERT->bindparam("comment",$_POST['description']);
				$INSERT->bindparam("Stuts",$_POST['status']);
				$INSERT->bindparam("Start",$_POST['start_date']);
				$INSERT->bindparam("Endd",$_POST['end_date']);
				$INSERT->bindparam("id",$_POST['submit']);
				if ($INSERT->execute()) {
					
				}
				else{
					echo "Erorr";
				}

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