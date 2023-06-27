   <link rel="stylesheet" type="text/css" href="Library/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Style.css">
  <script type="text/javascript" src="Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Library/js/jquery-3.6.1.min.js"></script>
      <link rel="stylesheet" href="A-Send Task/css/bootstrap.min.css">
      <?php include 'header.php';
       include 'topbar.php' ;
       include 'sidebar.php';
        require 'DB.php'; 
          if (isset($_GET['view'])) {
         	echo $_GET['view'];
       $select=$db->prepare("SELECT * FROM  evaluation WHERE id=:id");
       $select->bindparam("id",$_GET['view']);
  if ($select->execute()) {
  	// code...
  
       foreach ($select as $key ) {

    
      
         ?>
        <style>
	.modal-footer {
		justify-content: center;

	}
</style>
<div class="container mt-3" >
	<div class="col-lg-12">
		<div class="row justify-content-around ">
			<div class="col-md-5 bg-white border border-5 border-primary p-4 shadow-lg rounded">
				<dl>
					<dt><b class="border-bottom border-primary">Task</b></dt>
					<dd><?php echo $key['Task']?></dd>
				</dl>
				<dl> 
					<dt><b class="border-bottom border-primary">Assign To</b></dt>
					<dd><?php echo $key['Name']?></dd>
				</dl>


				<dl>
					<dt><b class="border-bottom border-primary">Remarks</b></dt>
					<dd><?php echo $key['Remarks']?></dd>
				</dl>
			</div>
			<div class="col-md-5 bg-white border border-5 border-primary p-4 shadow-lg rounded">
				<b>Ratings:</b>
				<dl>
					<dt><b class="border-bottom border-primary">Efficiency</b></dt>
					<dd><?php echo $key['Efficiency'].'/5'?></dd>
				</dl>
				<dl>
					<dt><b class="border-bottom border-primary">Timeliness</b></dt>
					<dd><?php echo $key['Timeliness'].'/5'?></dd>
				</dl>
				<dl>
					<dt><b class="border-bottom border-primary">Quality</b></dt>
					<dd><?php echo $key['Quality'].'/5'?></dd>
				</dl>
				<dl>
					<dt><b class="border-bottom border-primary">Accuracy</b></dt>
					<dd><?php echo $key['Accuracy'].'/5'?></dd>
				</dl>
				<dl>
					<dt><b class="border-bottom border-primary">Performance Average</b></dt>
					<dd><?php echo $key['Efficiency']+$key['Timeliness']+$key['Quality']+$key['Accuracy'].'/5'?></dd>
				</dl><?php }}} ?>
			</div>
		</div>

		<div class="modal-footer display p-0 mt-3">
			<a href="./index.php?page=evaluation" class="btn btn-secondary">Close</a>
		</div>

	</div>
</div>
<!-- <style>
	#uni_modal .modal-footer {
		display: none
	}

	#uni_modal .modal-footer.display {
		display: flex
	}

	#post-field {
		max-height: 70vh;
		overflow: auto;
	}
</style> -->