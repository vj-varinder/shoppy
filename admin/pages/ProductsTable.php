<?php
$basepath = $_SERVER["DOCUMENT_ROOT"]."/shoppy";

include($basepath.'/config/config.php');

//include the database connection file
include($basepath.'/libraries/Database.php');

//create Database object
$db=new Database();

//create select query
$query="SELECT P.dbProductId, I.dbImagePath, P.dbSubCatId, P.dbProductName, P.dbDescription, P.dbPrice, P.dbSize
 from tb_product P left join tb_image I on P.dbProductId = I.dbProductId ";

//run query
$all_products=$db->select($query);

?>
<script>
	// Once, the document have all elements then perform action.
	$(document).ready(function(){
		// Click delete user: exectue following function
		$(".delete").click(function(){

			// Getting the Id of user which has to be deleted
			var delId= $(this).attr('da_id');
			var tbName = "tb_product";
			var tbIdAttr = "dbProductId";

			// Calling ajax function for deleting the particular user
			$.ajax({
				type:'POST',
				url:'delete.php',
				/* Parmeters passed to delete.php:
						Id of a user,
						Name of table,
						Primary key attribute of table
				*/
				data: {delId: delId, tbName: tbName, tbIdAttr: tbIdAttr, imgId:1 },
				success: function(response){
					// Print response on the console
					console.log("response: "+response);
					if($.trim(response)==="YES") {

						alert("Product deleted");
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
               Product Details
               <span class="pull-right"><i class="glyphicon-plus"></i> <a href="Addproducts.php">Add New Product</a></span>
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Product_ID</th>
							<th>Product_Image</th>
                            <th>Subcategory_ID</th>
                            <th>Product_Name</th>
                            <th>Product_Description</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>
                                 operation
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($all_products) :?>
							<?php
							while($products=$all_products->fetch_assoc())
							:
							?>
							<tr>
								<td>
									<?php echo $products['dbProductId']; ?>
								</td>
								<td>
									<?php if($products['dbImagePath'])
									{

										?>

										<img src="/shoppy/upload_image/<?php echo $products['dbImagePath']; ?>" style= "height:100px">

										<?php
									}
									else
									{
										?>
										No Image
										<?php
									}
									?>

								</td>
								<td>
									<?php echo $products['dbSubCatId']; ?>
								</td>
								<td>
									<?php echo $products['dbProductName']; ?>
								</td>
								<td>
									<?php echo $products['dbDescription']; ?>
								</td>
								<td>
									<?php echo "$".$products['dbPrice'];
									?>
								</td>
                                <td>
                                    <?php echo $products['dbSize'];
									?>
                                </td>
                                <td>
                                    <a class="delete" da_id=<?php echo $products['dbProductId']; ?> > Delete </a>
									<a href="edit.php?editProd_Id=<?php echo $products['dbProductId']; ?>" class="edit"> Edit </a>
									<a href="uploadImage.php?imageProd_Id=<?php echo $products['dbProductId']; ?>"> UploadImage </a>
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
            </div>
          </div>
        </div>
