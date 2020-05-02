<?php

$basepath = $_SERVER["DOCUMENT_ROOT"]."/shoppy";

include($basepath.'/config/config.php');

//include the database connection file
include($basepath.'/libraries/Database.php');

Include "index.php";
?>
<?php
if(isset($_GET['catId']) && is_numeric($_GET['catId']))
{
    echo "<script> console.log('inside if');</script>";

    $catId=$_GET['catId'];
}
else {
    // if user id is not set redirect to the client page
    echo "<script> console.log('error in deleting');</script>";
    header("location:users.php");
}


if($_POST)
{
    $subcategoryName=$_POST['subcategoryName'];
    $subcategoryDescription=$_POST['subcategoryDescription'];
    //create Database object
    $db=new Database();

    //create select query
    $query="insert into tb_sub_category
    (
        dbCategoryId,
        dbSubCatName,
        dbDescription
        )
        values
        (
            '$catId','$subcategoryName','$subcategoryDescription'
            )";

            //run query
            $db->insert($query);
        }

        ?>
        <script>
        	// Once, the document have all elements then perform action.
        	$(document).ready(function(){
        		// Click delete user: exectue following function
        		$(".delete").click(function(){

        			// Getting the Id of user which has to be deleted
        			var delId= $(this).attr('da_id');
        			var tbName = "tb_sub_category";
        			var tbIdAttr = "dbSubCatId";

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

        <head>
            <script type="text/javascript">
            function validate()
            {
                var name=(document.getElementById('name').value).trim();
                var Description=(document.getElementById('categoryName').valu).trim();
            }

            $(document).ready(function() {
                var toogleAddForm = true;
                $("#addSubCat").click(function() {

                    if(toogleAddForm) {
                        $("#demo").removeClass("hide");
                        $("#demo").addClass("show");
                        toogleAddForm = false;
                    }
                    else {
                        $("#demo").removeClass("show");
                        $("#demo").addClass("hide");
                        toogleAddForm = true;
                    }
                });
            });

            </script>
            <style type="text/css">
            .labelHeading{
                padding:5px;
            }

            .hide {
                display: none;
            }

            .show {
                display: block;
            }


            </style>
        </head>
        <div id="demo" class="hide">
            <form class="form-group" onsubmit="return validate()" method="post">
                <div style="width:30%"class="form-group">
                    <label class="labelHeading">Enter Sub Category Name</label>
                    <input class="form-control" id="name" name="subcategoryName"placeholder="Enter sub category name">
                    <label class="labelHeading">Sub Category Description</label>
                    <input class="form-control" id="categoryName" name="subcategoryDescription" placeholder="Enter sub category description">
                    <br />
                    <span> <button type="submit" value="submit" class="btn btn-default">Add</button></span>
                </div>
            </form>
        </div>

        <?php
        $query="select * from tb_sub_category where dbCategoryId=".$catId;

        //run query
        $all_categories=$db->select($query);

        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sub Category details
                        <span class="pull-right"><i class="glyphicon-plus"></i> <a id="addSubCat" >Add New Sub Category</a></span>
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>
                                     Sub Category ID
                                    </th>
                                    <th>Category ID</th>
                                    <th>Sub Category Name</th>
                                    <th>Description</th>
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
                                            <?php echo $cat['dbSubCatId'];?>
                                        </td>
                                        <td>
                                            <?php echo $cat['dbCategoryId']; ?>
                                        </td>
                                        <td>
                                            <?php echo $cat['dbSubCatName']; ?>
                                        </td>
                                        <td>
                                            <?php echo $cat['dbDescription']; ?>
                                        </td>
                                        <td>
                                            <a class="delete" da_id=<?php echo $cat['dbSubCatId']; ?> > Delete </a>
                                            <a href="edit.php?editSubCat_Id=<?php echo $cat['dbSubCatId']; ?>" class="edit"> Edit  </a>

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
