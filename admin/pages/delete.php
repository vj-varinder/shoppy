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

if(isset($_POST['imgId']) )
{
    // echo "bla bla bla";
    $delId=$_POST['delId'];
    $tbName=$_POST['tbName'];
    $tbIdAttr=$_POST['tbIdAttr'];


    // $query = "DELETE from tb_image I, tb_product P where I.dbProductId = P.dbProductId and P.dbProductId=".$delId;
    $query="delete from tb_image where dbProductId=".$delId;
    $result = $db->delete($query);
    if(isset($result)) {
        echo "image del.";
        $query2="delete from tb_product where dbProductId=".$delId;
        $result2 = $db->delete($query2);
        if(isset($result2)) {

            echo "YES";
        }
        // else{
        //     echo "no pro";
        //
        // }
    }
    else {
        echo "NO";
    }
}


// confirm that the 'id' variable has been sent
if(isset($_POST['delId']) )
{
    $delId=$_POST['delId'];
    $tbName=$_POST['tbName'];
    $tbIdAttr=$_POST['tbIdAttr'];


    if($stmt = $mysqli->prepare("delete from $tbName where $tbIdAttr=? LIMIT 1"))

        {
            $stmt->bind_param("i",$delId);
            $stmt->execute();
            $stmt->close();
            echo "YES";
        }
        else {
            echo "<script> console.log('inside else');</script>";

            echo "error could not prepare Sql statment";
        }
        $mysqli->close();

    // $query="delete from ".$tbName." where ".$tbIdAttr."=".$delId;
    // $result=$db->delete($query);
    //
    // if(isset($result)) {
    //
    //     echo "YES";
    // }
    // else {
    //     echo "NO";
    // }

}
else {
    // if user id is not set redirect to the client page
    echo "<script> console.log('Id variable is not set.');</script>";

}



    // if($stmt = $mysqli->prepare("delete from $tbName where $tbIdAttr=? LIMIT 1"))
//     if($stmt = $mysqli->prepare("delete from $tbName, tb_image where $tbIdAttr=? LIMIT 1"))
//
//         {
//             $stmt->bind_param("i",$delId);
//             $stmt->execute();
//             $stmt->close();
//             echo "YES";
//         }
//         else {
//             echo "<script> console.log('inside else');</script>";
//
//             echo "error could not prepare Sql statment";
//         }
//         $mysqli->close();
//
//     // $query="delete from ".$tbName." where ".$tbIdAttr."=".$delId;
//     // $result=$db->delete($query);
//     //
//     // if(isset($result)) {
//     //
//     //     echo "YES";
//     // }
//     // else {
//     //     echo "NO";
//     // }
//
// }
// else {
//     // if user id is not set redirect to the client page
//     echo "<script> console.log('Id variable is not set.');</script>";
//
// }
?>
