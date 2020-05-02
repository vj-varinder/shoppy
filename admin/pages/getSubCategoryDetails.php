<?php
$basepath = $_SERVER["DOCUMENT_ROOT"]."/shoppy";
include($basepath.'/config/config.php');

include($basepath.'/libraries/Database.php');

$db=new Database();

// confirm that the 'id' variable has been sent
// if(isset($_GET['dbUserId']) && is_numeric($_GET['dbUserId']))
// {
//     echo "<script> console.log('inside if');</script>";
//
//     $Id=$_GET['dbUserId'];
//     if($stmt = $mysqli->prepare("DELETE FROM tb_user where dbUserId=? LIMIT 1"))
//     {
//         $stmt->bind_param("i",$Id);
//         $stmt->execute();
//         $stmt->close();
//     }
//     else {
//         echo "<script> console.log('inside else');</script>";
//
//         echo "error could not prepare Sql statment";
//     }
//     $mysqli->close();
//     // redirect to the client page
//     header("location:users.php");
//
//
// }
// else {
//     // if user id is not set redirect to the client page
//     echo "<script> console.log('error in deleting');</script>";
//     header("location:users.php");
// }


// confirm that the 'id' variable has been sent
if(isset($_POST['selectedCatId']) )
{
    $selectedCatId=$_POST['selectedCatId'];


    $query="select dbSubCatId, dbSubCatName from tb_sub_category where dbCategoryId=".$selectedCatId;
    $allSubCategory=$db->select($query);

    $response = " <label>Select the Subcategory</label>
    <select name='selectedSubCategory' id='selectedSubCategory'>

    <option>No Select</option>";

    // CHecking the number of rows.
    if(mysqli_num_rows($allSubCategory)>0)
    {
        while($subCategory=$allSubCategory->fetch_assoc()) :
            $response = $response. '<option value="'.$subCategory['dbSubCatId'].'">'.$subCategory['dbSubCatName'] .'</option>';
        endwhile;

    }
    else
    {
        $response = "<p>No Sub Category available.</p>";
    }

    $response = $response.'</select>';

    echo $response;

}
else {
    // if user id is not set redirect to the client page
    echo "<script> console.log('Unable to retrieve Sub Category.');</script>";

}
?>
