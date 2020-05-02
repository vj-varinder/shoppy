<?php

$basepath = $_SERVER["DOCUMENT_ROOT"]."/shoppy";

include($basepath.'/config/config.php');

//include the database connection file
include($basepath.'/libraries/Database.php');

Include "index.php";
?>

<?php

//create Database object
$db=new Database();

//create select query
$query="select O.dbOrderId, P.dbProductName, U.dbUserName from tb_order_details O, tb_product P, tb_user U where O.dbProductId = P.dbProductId and O.dbUserId = U.dbUserId ";
//run query
$all_orders=$db->select($query);

// $query1="select *from tb_product";
// $all_products=$db->select($query);

?>
<script>
	// Once, the document have all elements then perform action.
	$(document).ready(function(){
		// Click delete user: exectue following function
		$(".delete").click(function(){

			// Getting the Id of user which has to be deleted
			var delId= $(this).attr('da_id');
			var tbName = "tb_order_details";
			var tbIdAttr = "dbOrderId";

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

	});
</script>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                order details

            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Order_ID</th>
                            <th>Product_ID</th>
                            <th>UserID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($all_orders) :?>
							<?php
							while($cat=$all_orders->fetch_assoc())
							:
							?>
							<tr>
								<td>
									<?php
                                    // echo $cat['dbOrderId'];
                                    echo $cat['dbOrderId'];

                                     ?>
								</td>
								<td>
									<?php
                                    echo $cat['dbProductName'];
                                    // echo $cat['dbProductId'];
                                //     $query1="select dbProductName from tb_product where dbProductId=".$cat['dbProductId'];
                                //     $all_products=$db->select($query);
                                    // if($all_products):
                                //   //     while($prod = $all_products->fetch_assoc()) :
                                //
                                //     echo $prod['dbProductName'];
                                //     //  $all_products;
                                // endwhile;
                                //     endif;

                                    ?>

								</td>
                                <td>
                                    <?php
                                    // echo $cat['dbUserId'];
                                    echo $cat['dbUserName'];

                                    ?>
                                </td>
							</tr>
							<<?php
						endwhile;
						?>
					<?php else: ?>
						<p>
							there is no data in database
						</p>
					<?php endif; ?>
                    </tbody>
                </table>
