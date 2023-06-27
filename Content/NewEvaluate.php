   <link rel="stylesheet" type="text/css" href="Library/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Style.css">
  <script type="text/javascript" src="Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Library/js/jquery-3.6.1.min.js"></script>
      <link rel="stylesheet" href="A-Send Task/css/bootstrap.min.css">
      <?php include 'header.php';
       include 'topbar.php' ;
       include 'sidebar.php';
        require 'DB.php'; ?><div class="col-lg-12">
	<div class="card">
		<div class="card-body" style="width:1400px;margin:auto; margin-right: 50px;">
			<form action="" id="manage_evaluation" method="POST">
				<input type="hidden" name="id" value="">
				<div class="row">
					<div class="col-md-6 border-right">
				
	
								  	<?php  
								  	         if (isset($_SESSION['admin'])) {
							                        	$id= $_SESSION['admin']->manger_id;
							                       
								                     $manager=$db->prepare("SELECT * FROM manager WHERE manger_id =:manger_id ");	
												            $manager->bindparam("manger_id",$id);
												            $manager->execute();
												        				foreach ($manager as $key ) {
												        									             	// code...
												           									           					           
							  	            echo   '<input type="hidden" name="name" value="'.$key['First_Name'].$key['Last_Name'].' (manager)">';
							  	                  echo '	<input type="hidden" name="id" value="'.$key['manger_id'].'">
                                           ';     }}
							  	        if (isset($_GET['Evaluate'])) {
										       $select=$db->prepare("SELECT * FROM emploeyeetask WHERE id=:id");
										       $select->bindparam("id",$_GET['Evaluate']);
										       $select->execute(); 
										       foreach ($select as $key) {
										       echo '	<div class="form-group">
							           <label for="" class="control-label">Task</label>
												            
                  <input type="text" class="form-control" name="task_id" value="'.$key['Subject'].'"</div>
								';
                              }
							                     

										               
                                        echo'		<div class="form-group">
							<label for="" class="control-label">Employee</label>';
							           
							              $user=explode(",",$key['Emploey_Name']);
							                 for($i=0;$i<count($user);$i++){
                                    $show=$db->prepare("SELECT * FROM employee WHERE employee_id=:ikey");
								$show->bindparam("ikey",$user[$i]);

                                    $show->execute();
                                   
                                     foreach ($show as $key ) {
			
                                   echo '<input type="text" class="form-control" name="manager_id" value="'.$key['First_Name'].$key['Last_Name'].'"';
                              }}}
                                     

								?>

							
						</div>
					
						<div class="row " id="ratings-field" style="display: block">
							<div class="col-md-12">
								<label for="" class="control-label">Ratings</label>
							</div>
							<hr>
							<div class="col-md-6">
								<div class="form-group">
									<label for="" class="control-label">Efficiency</label>
									<select name="efficiency" id="efficiency" class="form-control form-control-sm" required>

										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>

									</select>
								</div>
								<div class="form-group">
									<label for="" class="control-label">Timeliness</label>
									<select name="timeliness" id="timeliness" class="form-control form-control-sm" required>

										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>

									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="" class="control-label">Quality</label>
									<select name="quality" id="quality" class="form-control form-control-sm" required>

								    	<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>

									</select>
								</div>
								<div class="form-group">
									<label for="" class="control-label">Accuracy</label>
									<select name="accuracy" id="accuracy" class="form-control form-control-sm" required>

									   <option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>

									</select>
								</div>
							</div>
							<div class="form-group col-md-12">
								<label for="" class="control-label">Remarks</label>
								<textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control"></textarea>
							</div>
						</div>

					</div>
					
				</div>
				 
				
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2" type="submit" name="submit">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=evaluation'">Cancel</button>
				</div>
				<?php
				if (isset($_POST['submit'])) {
				   $INSERT=$db->prepare("INSERT INTO evaluation (Task,Name,Efficiency,Timeliness,Quality,Accuracy,Remarks,Evalouter,manger_id ) VALUES (:Task,:Name,:Efficiency,:Timeliness,:Quality,:Accuracy,:Remarks,:Evalouter,:manger_id )");
				   $INSERT->bindparam("Task",$_POST['task_id']);
				   $INSERT->bindparam("Name",$_POST['manager_id']);
				   $INSERT->bindparam("Efficiency",$_POST['efficiency']);
				   $INSERT->bindparam("Timeliness",$_POST['timeliness']);
				   $INSERT->bindparam("Quality",$_POST['quality']);
				   $INSERT->bindparam("Accuracy",$_POST['accuracy']);
				   $INSERT->bindparam("Remarks",$_POST['remarks']);
				   $INSERT->bindparam("Evalouter",$_POST['name']);
				   $INSERT->bindparam("manger_id",$_POST['id']);
				   $INSERT->execute();
				}
				?>
			</form>
		</div>
	</div>
</div>
<div id="clone_progress" class="d-none">
	<div class="post">
		<div class="user-block">
			<img class="img-circle img-bordered-sm avatar" src="" alt="user image">
			<span class="username">
				<a href="#" class="nf"></a>
			</span>
			<span class="description">
				<span class="fa fa-calendar-day"></span>
				<span><b class="date"></b></span>
			</span>
		</div>
		<div class="pdesc">

		</div>

		<p>
		</p>
	</div>
</div>
<style>
	img#cimg {
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}

	#post-field {
		max-height: 70vh;
		overflow: auto;
	}
</style>
<script>
	$(document).ready(function() {
		if ('<?php echo isset($id) ?>' == 1) {
			update_emp()
		}
	})

	$('[name="password"],[name="cpass"]').keyup(function() {
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if (cpass == '' || pass == '') {
			$('#pass_match').attr('data-status', '')
		} else {
			if (cpass == pass) {
				$('#pass_match').attr('data-status', '1').html('<i class="text-success">Password Matched.</i>')
			} else {
				$('#pass_match').attr('data-status', '2').html('<i class="text-danger">Password does not match.</i>')
			}
		}
	})

	function displayImg(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#cimg').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$('#employee_id').change(function() {
		update_emp()
	})

	function update_emp() {
		start_load();
		$('#task_id').html('')
		$.ajax({
			url: 'ajax.php?action=get_emp_tasks',
			method: 'POST',
			data: {
				employee_id: $('#employee_id').val(),
				task_id: '<?php echo isset($task_id) ? $task_id : ''; ?>'
			},
			error: (err) => {
				alert_toast("An error occured", 'error')
				console.log(err)
				end_load()
			},
			success: function(resp) {
				if (resp && typeof JSON.parse(resp) === 'object') {
					resp = JSON.parse(resp)
					var opt = $('<option value=""></option>')
					if (Object.keys(resp).length > 0) {
						var oc = opt.clone()
						$('#task_id').append(oc)
						Object.keys(resp).map(k => {
							var oc = opt.clone()
							oc.text(resp[k].task)
							oc.attr('value', resp[k].id)
							var task_id = '<?php echo isset($task_id) ? $task_id : ''; ?>';
							if (task_id == resp[k].id)
								oc.attr('selected', true)
							$('#task_id').append(oc)
						})
					} else {
						$('#task_id').html('')
						var oc = opt.clone()
						oc.text("Employee is not assign to any task yet.")
						oc.attr({
							'disabled': 'disabled',
							'selected': 'selected'
						})
						$('#task_id').append(oc)
					}
				}
			},
			complete: function() {
				$('#task_id').select2({
					placeholder: 'Please select task here',
					width: '100%'
				})
				task_update()
				end_load();
				if ('<?php echo isset($id) ?>' == 1)
					$('#task_id').trigger('change')
			}
		})
	}

	function task_update() {
		$('#task_id').change(function() {
			start_load()
			$.ajax({
				url: 'ajax.php?action=get_progress',
				method: 'POST',
				data: {
					task_id: $(this).val(),
					id: '<?php echo isset($id) ? $id : ''; ?>'
				},
				error: (err) => {
					alert_toast("An error occured", 'error')
					console.log(err)
					end_load()
				},
				success: function(resp) {
					if (resp && typeof JSON.parse(resp) === 'object') {
						resp = JSON.parse(resp)
						if (Object.keys(resp).length > 0) {
							$('#post-field').html('')
							var id = '<?php echo isset($id) ? $id : ''; ?>';
							Object.keys(resp).map(k => {
								var _progress = $('#clone_progress .post').clone()
								_progress.find('.pdesc').append(resp[k].progress)
								_progress.find('.avatar').attr('src', 'assets/uploads/' + resp[k].avatar)
								_progress.find('.nf').text(resp[k].uname)
								_progress.find('.date').text(resp[k].date_created)
								if (id == resp[k].id)
									_progress.attr('selected', 'selected')
								$('#post-field').append(_progress)
							})
							$('#ratings-field').show()
						} else {
							$('#ratings-field').hide()
						}
					}
				},
				complete: function() {
					end_load();
				}
			})
		})
	}
	// $('#manage_evaluation').submit(function(e) {
	// 	e.preventDefault()
	// 	$('input').removeClass("border-danger")
	// 	start_load()
	// 	$.ajax({
	// 		url: 'ajax.php?action=save_evaluation',
	// 		data: new FormData($(this)[0]),
	// 		cache: false,
	// 		contentType: false,
	// 		processData: false,
	// 		method: 'POST',
	// 		type: 'POST',
	// 		success: function(resp) {
	// 			if (resp == 1) {
	// 				alert_toast('Data successfully saved.', "success");
	// 				setTimeout(function() {
	// 					location.replace('index.php?page=evaluation')
	// 				}, 750)
	// 			}
	// 		}
	// 	})
	// })
</script>