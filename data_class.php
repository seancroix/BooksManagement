<?php
session_start();
include("db.php");

class data extends db{


function __construct(){
   // echo "Working..";
}

function adminLogin($t1,$t2){

$q="SELECT * FROM admin where email='$t1' and pass='$t2' ";
$setRecord=$this->connection->query($q);
$result=$setRecord->rowCount();


if($result > 0){
    foreach($setRecord->fetchAll() as $row){
        $logId=$row['id'];
        $_SESSION["adminId"] = $logId;
    header("Location:admin_service_dashboard.php");
    }
}
elseif($result <= 0){
    header("Location:index.php?msg=Invalid Account");
}


}

}