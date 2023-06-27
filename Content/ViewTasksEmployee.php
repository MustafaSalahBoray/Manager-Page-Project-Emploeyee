

  <link rel="stylesheet" type="text/css" href="Library/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Style.css">
  <script type="text/javascript" src="Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Library/js/jquery-3.6.1.min.js"></script>
      <link rel="stylesheet" href="A-Send Task/css/bootstrap.min.css">
      <?php include 'header.php';
       include 'topbar.php' ;
       include 'sidebar.php';
        require 'DB.php';
        require 'footer.php';?>
        <div class="col-lg-12">
        	<div class="containser">
	<div class="card card-outline card-success mt-5"style="width:80%;margin:auto; margin-right:10px ;">
		<div class="card-header">



		</div>
		<div class="card-body ">
		
			<table class="table tabe-hover table-condensed" id="list" >
				<colgroup>
					<col width="5%">
					<col width="35%">
					<col width="15%">
					<col width="15%">
					<col width="20%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Project</th>
						<th>Date Started</th>
						<th>Due Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
							<?php 
                          if (isset($_GET['view'])) {
                            $x=1;
                          require 'DB.php';
                            
                          $admn_task=$db->prepare("SELECT * FROM answertaskadmin WHERE id_AdminTask=:id");
                            $admn_task->bindparam("id",$_GET['view']);
                          $admn_task->execute();
                          foreach ($admn_task as $key ) {
                           $user=explode(",", $key['Emploey_Name']);
                          
                          for ($i=0; $i <count($user) ; $i++) { 
                          


		                   
												                
                       
                           


                         ?>

					<tr>
							<th class="text-center"><?php echo $x;?></th>
							<td>
							
							<p class="truncate"><?php echo $key['Subject'];?></p>
						</td>
							</td>
							 <td><b><?php echo $key['Start'];?></b></td>
							<td><b><?php echo $key['Endd'];?></b></td>
							<td class="text-center">
						<?php 
						  if ($key['Stuts']=='Pending') {
						  	
						  	 	echo "<span class='badge badge-secondary'>".$key['Stuts']."</span>";
						  }
						 
							  elseif($key['Stuts'] =='On-Hold'){
							  
							  	echo "<span class='badge badge-warning'>".$key['Stuts']."</span>";
							  }elseif($key['Stuts'] =='Done'){
							  	
							  	echo "<span class='badge badge-success'>".$key['Stuts']."</span>";
							  }
							?>
						</td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								Action
							</button>
							<div class="dropdown-menu">
								 <?php 
								       if ($key['Stuts'] =='Done'){
								           echo '<a class="dropdown-item view_project" href="http://localhost/Manager%20Page%20Project%20Emploeyee/Content/EvaluateTaskAdmin.php?Evaluate='.$key['id_AdminTask'].'&&user='.$user[$i].'" data-id="">Evaluate</a>';}
								 
								?>
								
							
						       
								
                                 <?php  $x++;}}}
                                 else{
                                 	echo "string";
                                 }
                                 ?>
							</div>
						</td>
					</tr>

				</tbody></div>
			</table>
		</div>
	</div>
</div>
<style>
	table p {
		margin: unset !important;
	}

	table td {
		vertical-align: middle !important
	}
</style>
<!-- <script>
	$(document).ready(function() {
		$('#list').dataTable()

		$('.delete_project').click(function() {
			_conf("Are you sure to delete this project?", "delete_project", [$(this).attr('data-id')])
		})
	})

	function delete_project($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_project',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script> -->