<?php

$basepath = $_SERVER["DOCUMENT_ROOT"]."/shoppy";

include($basepath.'/config/config.php');

//include the database connection file
include($basepath.'/libraries/Database.php');

Include "index.php";

$db=new Database();
//create select query
$query="select * from tb_category";
$all_categories=$db->select($query);
$query_subCategory="select * from tb_sub_category";
$all_sub_categories=$db->select($query_subCategory);
?>
<head>

<style type="text/css">

.labelHeading{
    padding:5px;
}
</style>

<script type="text/javascript">

$(document).ready(function() {
    $("#selectedCategory").change(function() {
        var selectedCatId = $("option:selected",this).attr('value');
        // alert("select value is "+ selectedCatId);
        // $("#subCategoryPlace").html("<p>Welcome</p>");

        // $(div).find('.demo').html('<p>Welcome</p>').end().appendTo($("body"));


        $.ajax( {
            type: "POST",
            url: "getSubCategoryDetails.php",
            data: {selectedCatId : selectedCatId },
            success: function (response) {

                console.log("response: "+response);

                // $('.demo').html(response);

            }
        });

    });
});
</script>

</head>

<?php
if($_POST)
{
    // $selectedCatId=$_POST['selectedCategory'];
    // echo $selectedCatId;

    // $query_subCategory="select * from tb_sub_category where dbCategoryId=".$selectedCatId;
    // $all_sub_categories=$db->select($query_subCategory);
    $subCategoryId=1;
    $productName=$_POST['productName'];
    $productDescription=$_POST['productDescription'];
    $price=$_POST['price'];
    $size=$_POST['size'];

    //create Database object
    // $db=new Database();

    //create select query
    $query="insert into tb_product(
        dbSubCatId,
        dbProductName,
        dbDescription,
        dbPrice,
        dbSize
        )
        values
        (
            '$subCategoryId','$productName','$productDescription','$price','$size'
            )";

            //run query
            $db->insert($query);


        }

        ?>

        <body>
            <form action="" method="post">
                <div style="width:30%"class="form-group">
                    <div class="form-group">
                        <label>Select the Category</label>
                        <select class="form-control" name="selectedCategory" id="selectedCategory">
                            <option>No Select</option>
                            <?php while($cat=$all_categories->fetch_assoc()) :
                                echo "<option value='".$cat['dbCategoryId']."'>".$cat['dbCategoryName'] ."</option>";
                            endwhile; ?>
                        </select>

                    </div>
                </div>
                <div id="subCategoryPlace" style="width:30%">
                    <label>Select the Subcategory</label>
                    <select class="form-control">
                    <option>No Select</option>
                    <option>Hoodies</option>
                    <option>T-shirts</option>
                    <option>Caps</option>
                    </select>
            </div>
            <div style="width:30%">
                <label class="labelHeading">Product Name</label>
                <input class="form-control" name="productName"placeholder="Enter Product name">
                <label class="labelHeading">Product Description</label>
                <input class="form-control" name="productDescription" placeholder="Enter Product Description">
                <label class="labelHeading">Product price</label>
                <input class="form-control" name="price" placeholder="Enter Product Price">
                <label class="labelHeading">Product Size</label>
                <input class="form-control" name="size" placeholder="Enter Product size">
                <!-- <label class="labelHeading">Product Image</label>
                <input class="form-control" type="file" name="image"></td> -->
                <br />
                <button type="submit" class="btn btn-default">Add</button>
                <button type="Reset" class="btn btn-default">Reset</button> <br/>
            </div>
        </br/>

    </form>
    <!-- </div> -->

    <!-- following code is to display the products table  -->
    <?php

    //create select query
    $query="select * from tb_product";

    //run query
    $all_products=$db->select($query);

    ?>
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
                                <th>Subcategory_ID</th>
                                <th>Product_Name</th>
                                <th>Product_Description</th>
                                <th>Price</th>
                                <th>Size</th>
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
<!-- </div> -->
</body>
