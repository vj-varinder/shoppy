<?php
$basepath = $_SERVER["DOCUMENT_ROOT"]."/shoppy";
include($basepath.'/config/config.php');

include($basepath.'/libraries/Database.php');


include 'index.php';
$db=new Database();
$row;

//to update categories
// confirm that the 'id' variable has been sent
if(isset($_GET['editCat_Id']) )
{
    global $row;
    $editId=$_GET['editCat_Id'];
    echo"<script>console.log('inside if');</script>";
    // $tbName=$_POST['tbName'];
    // $tbIdAttr=$_POST['tbIdAttr'];
    $query="select * from tb_category WHERE dbCategoryId='$editId'";
    // $res= mysql_query("SELECT * FROM tb_category WHERE dbCategoryId='$editId'");

    //run query
    $ress= $db->select($query);
    $row = $ress->fetch_assoc();
    ?>
    <form class="form-group" action="edit.php" method="post">
    <div style="width:30%"class="form-group">
        <input type="hidden" name="id" value="<?php echo $row['dbCategoryId']; ?>">
        <label class="labelHeading">Category Name</label>
        <input class="form-control" id="name" name="categoryName" value="<?php echo $row['dbCategoryName']; ?>">
        <label class="labelHeading">Category Description</label>
        <input class="form-control" id="categoryName" name="categoryDescription" value="<?php echo $row['dbDescription']; ?>">

    <span> <button type="submit" value="submit" class="btn btn-default">update</button></span>
    </div>
    </form>

<?php }

if(isset($_POST['categoryName']) && isset($_POST['categoryDescription'])){
    $newName = $_POST['categoryName'];
	$id  	 = $_POST['id'];
    $des     = $_POST['categoryDescription'];

    // dbDescription='$des'
	$query    = "UPDATE tb_category SET dbCategoryName='$newName', dbDescription='$des'  WHERE dbCategoryId=$id";
    if(!empty($_POST))
    {
        if($db->update($query))
        { echo "Row updated successfully click <a href='categories.php'>here</a> to view categories";
            $row=$db->update($query);

        }
        // echo "Row updated successfully";
    }


}


// to update subcategories
if(isset($_GET['editSubCat_Id']) )
{
    global $row;
    $editId=$_GET['editSubCat_Id'];

    // $tbName=$_POST['tbName'];
    // $tbIdAttr=$_POST['tbIdAttr'];
    $query="select * from tb_sub_category WHERE dbSubCatId='$editId'";
    // $res= mysql_query("SELECT * FROM tb_category WHERE dbCategoryId='$editId'");

    //run query
    $ress= $db->select($query);
    $row = $ress->fetch_assoc();
    ?>
    <form class="form-group" action="edit.php" method="post">
    <div style="width:30%"class="form-group">
        <input type="hidden" name="id" value="<?php echo $row['dbSubCatId']; ?>">
        <label class="labelHeading">Sub Category Name</label>
        <input class="form-control"  name="subCategoryName" value="<?php echo $row['dbSubCatName']; ?>">
        <label class="labelHeading"> Sub Category Description</label>
        <input class="form-control" name="subCategoryDescription" value="<?php echo $row['dbDescription']; ?>">

    <span> <button type="submit" value="submit" class="btn btn-default">update</button></span>
    </div>
    </form>

<?php }
if(isset($_POST['subCategoryName']) && isset($_POST['subCategoryDescription'])){
    $newName = $_POST['subCategoryName'];
	$id  	 = $_POST['id'];
    $des     = $_POST['subCategoryDescription'];

    // dbDescription='$des'
	$query    = "UPDATE tb_sub_category SET dbSubCatName='$newName', dbDescription='$des'  WHERE dbSubCatId=$id";
    if(!empty($_POST))
    {
        if($db->update($query))
        {
             echo "Row updated successfully";
            $row=$db->update($query);

        }
        // echo "Row updated successfully";
    }


}

// to update product details
if(isset($_GET['editProd_Id']) )
{
    global $row;
    $editProdId=$_GET['editProd_Id'];

    // echo "prod id: ".$editProdId;
    $query="select * from tb_product WHERE dbProductId='$editProdId'";


    //run query
    $ress= $db->select($query);
    $row = $ress->fetch_assoc();
    ?>
    <form class="form-group" action="edit.php" method="post">
    <div style="width:30%"class="form-group">
        <input type="hidden" name="id" value="<?php echo $row['dbProductId']; ?>">
        <label class="labelHeading">Product  Name</label>
        <input class="form-control"  name="productName" value="<?php echo $row['dbProductName']; ?>">
        <label class="labelHeading"> product Description</label>
        <input class="form-control" name="productDescription" value="<?php echo $row['dbDescription']; ?>">
        <label class="labelHeading"> product Price</label>
        <input class="form-control" name="productPrice" value="<?php echo $row['dbPrice']; ?>">
        <label class="labelHeading"> product size</label>
        <input class="form-control" name="productSize" value="<?php echo $row['dbSize']; ?>">

    <span> <button type="submit" value="submit" class="btn btn-default">update</button></span>
    </div>
    </form>

<?php }

if(isset($_POST['productName']) && isset($_POST['productDescription']) && isset($_POST['productPrice']) && isset($_POST['productSize'])){
    $productName = $_POST['productName'];
	$id  	 = $_POST['id'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    $productSize = $_POST['productSize'];

    // dbDescription='$des'
	$query    = "UPDATE tb_product SET dbProductName='$productName', dbDescription='$productDescription', dbPrice='$productPrice', dbSize='$productSize'  WHERE dbProductId=$id";
    if(!empty($_POST))
    {
        if($db->update($query))
        {
             echo "Row updated successfully";
            $row=$db->update($query);

        }
        // echo "Row updated successfully";
    }


}
