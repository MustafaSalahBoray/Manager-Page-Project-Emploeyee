<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Name</th>                                                
						<th>Email</th>
						<th>Department</th>
						<th>Designation</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					       <?php  
                if (isset($_SESSION['admin'])) {
                    $x=1;
                 $id=$_SESSION['admin']->manger_id ;
                 require 'DB.php';
                 $selectEmploye=$db->prepare("SELECT * FROM  employee WHERE Manager_Name =:id");
                 $selectEmploye->bindparam("id",$id);
                 $selectEmploye->execute();
                 foreach ($selectEmploye as $key ) {
                 	// code...
                 

 
              ?>

					<tr>
						<th class="text-center"><?php echo $x;?></th>
						<td><b><?php echo $key['First_Name'].$key['Last_Name'];?></b></td>
						<td><b><?php echo $key['Email'];?></b></td>
						<td><b><?php echo $key['Department'];?></b></td>
						<td><b><?php echo $key['Designation'];?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								Action
							</button>
							<div class="dropdown-menu">
								<form method="POST"><button class="dropdown-item delete_employee" type="submit" name="remove"data-id="" value="<?php echo $key['employee_id']?>">Delete</button>
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
  	$Delete=$db->prepare("DELETE FROM employee WHERE employee_id=:id");
  	$Delete->bindparam("id",$_POST['remove']);
  	 if ($Delete->execute()) {
			
				   	   	echo "<script>window.open('http://localhost/Manager%20Page%20Project%20Emploeyee/Content//index.php?page=employee_list','_self')</script>";
				   }
				   else{
				   	 echo "Erorr";
				   }
  	  }

?>
<script>
	$(document).ready(function() {
		$('#list').dataTable()
		$('.view_employee').click(function() {
			uni_modal("<i class='fa fa-id-card'></i> Employee Details", "view_employee.php?id=" + $(this).attr('data-id'))
		})
		$('.delete_employee').click(function() {
			_conf("Are you sure to delete this Employee?", "delete_employee", [$(this).attr('data-id')])
		})
	})

	function delete_employee($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_employee',
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