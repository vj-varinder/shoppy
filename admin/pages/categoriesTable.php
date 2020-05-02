<?php
$basepath = $_SERVER["DOCUMENT_ROOT"]."/shoppy";

include($basepath.'/config/config.php');

//include the database connection file
include($basepath.'/libraries/Database.php');

//create Database object
$db=new Database();

//create select query
$query="select * from tb_category";

//run query
$all_categories=$db->select($query);

?>
<style type="text/css">
.page{
	display: none;
	z-index: -1;
	position: absolute;
	top: 0px;
	left:0px;
}
.show{
	display: block !important;
	z-index: 0 !important;
	top: 0px;
	left:0px;
}
</style>
<script>
	// Once, the document have all elements then perform action.
	$(document).ready(function(){
		// Click delete user: exectue following function
		$(".delete").click(function(){

			// Getting the Id of user which has to be deleted
			var delId= $(this).attr('da_id');
			var tbName = "tb_category";
			var tbIdAttr = "dbCategoryId";

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

						alert("Category Deleted");
						// Reloading the current page.
					 	window.location.reload();
					}
					else {
						alert("data other.");
					}
				}
			});

		});
		// $(".edit").click(function(){
		//
		//
		// 	// Getting the Id of user which has to be deleted
		// 	var editId= $(this).attr('edit_id');
		// 	var tbName = "tb_category";
		// 	var tbIdAttr = "dbCategoryId";
		//
		// 	// Calling ajax function for deleting the particular user
		// 	$.ajax({
		// 		type:'POST',
		// 		url:'edit.php',
		// 		/* Parmeters passed to delete.php:
		// 				Id of a user,
		// 				Name of table,
		// 				Primary key attribute of table
		// 		*/
		// 		data: {editId: editId, tbName: tbName, tbIdAttr: tbIdAttr },
		// 		success: function(response){
		// 			// Print response on the console
		// 			console.log("response: "+response);
		// 			if($.trim(response)==="YES") {
		//
		// 				alert("Category updates successfully ");
		// 				// Reloading the current page.
		// 			 	window.location.reload();
		// 			}
		// 			else {
		// 				alert("data other.");
		// 			}
		// 		}
		// 	});
		//
		// });



	});
</script>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Categories details
                <span class="pull-right"><i class="glyphicon-plus"></i> <a href="Addcategories.php">Add New Category</a></span>
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Category_ID</th>
                            <th>Category_Name</th>
                            <th>Category_Description</th>
                            <th>
                                Operation
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($all_categories) :?>
							<?php
							while($cat=$all_categories->fetch_assoc())
							:
							?>
							<tr>
								<td>
									<?php echo $cat['dbCategoryId']; ?>
								</td>
								<td>
								<a href="AddSubCategories.php?catId=<?php echo $cat['dbCategoryId']; ?>"><?php echo $cat['dbCategoryName']; ?></a>
								</td>
								<td>
									<?php echo $cat['dbDescription']; ?>
								</td>
                                <td>
                                    <a class="delete" da_id=<?php echo $cat['dbCategoryId']; ?> > Delete  </a>
									<a href="edit.php?editCat_Id=<?php echo $cat['dbCategoryId']; ?>" class="edit"> Edit  </a>
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
			</div>
