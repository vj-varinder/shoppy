<?php
// echo $_SERVER["DOCUMENT_ROOT"];   prints  C:/xampp/htdocs    otherwise it look for the relative path.
$basepath = $_SERVER["DOCUMENT_ROOT"]."/shoppy";

include($basepath.'/config/config.php');

//include the database connection file
include($basepath.'/libraries/Database.php');

// Include admin index file
include('index.php');

//create Database object
$db=new Database();

//create select query
$query="select * from tb_user";

//run select query
$all_users=$db->select($query);


?>
<script>
	// Once, the document have all elements then perform action.
	$(document).ready(function(){
		// Click delete user: exectue following function
		$(".delete").click(function(){

			// Getting the Id of user which has to be deleted
			var delId= $(this).attr('da_id');
			var tbName = "tb_user";
			var tbIdAttr = "dbUserId";

			// Calling ajax function for deleting the particular user
			$.ajax({
				type:'POST',
				url:'delete.php',
				/* Parmeters passed to delete.php:
						Id of a user,
						Name of table,
						Primary key attribute of table
				*/
				data: {delId: delId, tbName: tbName, tbIdAttr: tbIdAttr },
				success: function(response){
					// Print response on the console
					console.log("response: "+response);
					if($.trim(response)==="YES") {

						alert("User deleted");
						// Reloading the current page.
					 	window.location.reload();
					}
					else {
						alert("data other.");
					}
				}
			});

		});

	});
</script>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Registered Users

			</div>
			<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th>User ID</th>
							<th>User Name</th>
							<th>E-mail</th>
							<th>Phone number</th>
							<th>User type</th>
							<th>Operations</th>

						</tr>
					</thead>
					<tbody>
						<?php if($all_users) :?>
							<?php
							while($user=$all_users->fetch_assoc())
							:
							?>
							<tr>
								<td>
									<?php echo $user['dbUserId']; ?>
								</td>
								<td>
									<?php echo $user['dbUserName']; ?>
								</td>
								<td>
									<?php echo $user['dbEmail']; ?>
								</td>
								<td>
									<?php echo $user['dbPhone']; ?>
								</td>
								<td>
									<?php  $val = $user['dbUserType'];
									if($val=='1'){ echo "admin";}
									else{echo "user";}

									?>

								</td>
								<td>
									<a class="delete" da_id=<?php echo $user['dbUserId']; ?> >Delete User</a>

								</td>
							</tr>
							<<?php
						endwhile;
						?>
					<?php else: ?>
						<p>
							there is no data yet
						</p>
					<?php endif; ?>
				</tbody>
			</table>
