<?php
include('config.php');

include('Database.php');

$db=new Database();

// confirm that the 'id' variable has been sent
if(isset($_GET['dbUserId']) && is_numeric($_GET['dbUserId']))
{
    $userId=$_GET['dbUserId'];
    echo $userID;
}


?>
