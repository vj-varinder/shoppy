<?php


$basepath = $_SERVER["DOCUMENT_ROOT"]."/shoppy";
include($basepath.'/config/config.php');

include($basepath.'/libraries/Database.php');
include 'image_class.php';

include 'index.php';
$db=new Database();

$obj_image= new Image();

if(@$_POST['submit'])
{
    global $basepath, $db;
    // $txt_image = $_POST['txt_image'];
    // echo "text image is   $txt_image";

    $obj_image->image_name=str_replace("'","''",$_POST['imageName']);
    $obj_image->image=str_replace("'","''",$_FILES['txt_image']);
    $obj_image->prodId=$_POST['prodId'];
    $obj_image->basepath=$basepath;
    $obj_image->db=$db;

    $obj_image->insert_into_image();
}
?>

<html>


<head>

</head>
<body>


<form class="form-group" method="post" enctype="multipart/form-data">
    <div style="width:30%"class="form-group">
        <input type="hidden" name="prodId" value="<?php echo $_GET['imageProd_Id']; ?>">
        <label class="labelHeading">Product Image Name</label>
        <input class="form-control" name="imageName" placeholder="Enter Image name">
        <label class="labelHeading">Product Image</label>
        <input class="form-control" type="file" name="txt_image">
        <br />
        <input type="submit" value="SAVE" class="btn btn-default" name="submit"></input>
    </div>
</form>
</body>
</html>
