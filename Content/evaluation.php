<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Task</th>
						<th>Name</th>
						
						<th width="15%">Performance Average</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                      	<?php 
                            require 'DB.php';
                            $x=1;
                            if (isset($_SESSION['admin'])) {
                             $id=$_SESSION['admin']->manger_id;
                            
                          $evaluation=$db->prepare("SELECT * FROM evaluation WHERE manger_id=:id");
                          $evaluation->bindparam("id",$id);
                          $evaluation->execute();
                          foreach ($evaluation as $key ) {
                          	// code...
                           


                         ?>
					<tr>
						<th class="text-center"><?php echo $x;?></th>
						<td><b><?php echo $key['Task']?></b></td>
						<td><b><?php echo $key['Name']?></b></td>
						
						<td><b>
							<?php echo $key['Efficiency']+$key['Timeliness']+$key['Quality']+$key['Accuracy']?>
						</b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								Action
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item view_evaluation" href="http://localhost/Manager%20Page%20Project%20Emploeyee/Content/view_evaluation.php?view=<?php echo $key['id']?>" data-id="">View</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="http://localhost/Manager%20Page%20Project%20Emploeyee/Content/edit_evaluation.php?edit=<?php echo $key['id']?>">Edit</a>
								<div class="dropdown-divider"></div>
							<form method="POST"><button class="dropdown-item delete_evaluation" type="submit" name="remove" value="<?php echo $key['id']?>" data-id="">Delete</button></form>
							</div>
						</td>
					</tr>
                   <?php $x++;}}?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php 
  if (isset($_POST['remove'])) {
  	$Delete=$db->prepare("DELETE FROM evaluation WHERE id=:id");
  	$Delete->bindparam("id",$_POST['remove']);
  	 if ($Delete->execute()) {
				   	echo "<script>alert('Done remove')</script>";
				   	   	echo "<script>window.open('http://localhost/Manager%20Page%20Project%20Emploeyee/Content//index.php?page=evaluation','_self')</script>";
				   }
				   else{
				   	 echo "Erorr";
				   }
  	  }

?>

<script>
	$(document).ready(function() {
		$('#list').dataTable()
		$('.view_evaluation').click(function() {
			uni_modal("Evaluation Details", "view_evaluation.php?id=" + $(this).attr('data-id'), 'mid-large')
		})
		$('.delete_evaluation').click(function() {
			_conf("Are you sure to delete this evaluation?", "delete_evaluation", [$(this).attr('data-id')])
		})
	})

	function delete_evaluation($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_evaluation',
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
</script>