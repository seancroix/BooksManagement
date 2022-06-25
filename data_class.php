<?php
session_start();
include("db.php");

class data extends db{

    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookauthor;
    private $bookpublish;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;
    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returndate;


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

function addnewuser($name,$password,$email,$type){
    $this->name=$name;
    $this->password=$password;
    $this->email=$email;
    $this->type=$type;

    $q="INSERT INTO userdata(id,name,email,pass,type)
            VALUES('','$name','$email','$password','$type')";
    if($this->connection->exec($q)){
        header("Location:admin_service_dashboard.php?msg=Added Succesfully!");
    }
    else{
        header("Location:admin_service_dashboard.php?msg=Register failed!");
    }
}

function addbook($bookpic,$bookname,$bookdetail,$bookauthor,$bookpublish,$branch,$bookprice,$bookquantity){
    $this->bookpic=$bookpic;
    $this->bookname=$bookname;
    $this->bookdetail=$bookdetail;
    $this->bookauthor=$bookauthor;
    $this->bookpublish=$bookpublish;
    $this->branch=$branch;
    $this->bookprice=$bookprice;
    $this->bookquantity=$bookquantity;
    
    $q="INSERT INTO book (id, bookpic, bookname, bookdetail, bookauthor, bookpublish, branch, bookprice, bookquantity, bookava, bookrent) 
            VALUES('', '$bookpic', '$bookname', '$bookdetail', '$bookauthor', '$bookpublish', '$branch', '$bookprice', '$bookquantity', 0)";


    if($this->connection->exec($q)){
        header("Location:admin_service_dashboard.php?msg=Done!");
    }
    else{
        header("Location:admin_service_dashboard.php?msg=Failed!");
    }
}


function userdata(){
    $q="SELECT * FROM userdata ";
    $data=$this->connection->query($q);
    return $data;
    
}

function deleteuserdata($id){
    $q="DELETE from userdata where id='$id'";
    if($this->connection->exec($q)){

        header("Location:admin_service_dashboard.php?msg=Deleted!");
    }
    else{
        header("Location:admin_service_dashboard.php?msg=Delete Failed!");
    }

}


}