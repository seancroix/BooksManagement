<?php
include("data_class.php");

$bookname=$_POST['bookname'];
$bookdetail=$_POST['bookdetail'];
$bookauthor=$_POST['bookauthor'];
$bookpublish=$_POST['bookpublish'];
$branch=$_POST['branch'];
$bookprice=$_POST['bookprice'];
$bookquantity=$_POST['bookquantity'];

    if (move_uploaded_file($_FILES["bookphoto"]["tmp_name"],"uploads/" . $_FILES["bookphoto"]["name"])){
        echo "Book Updated!";
        $bookpic=$_FILES["bookphoto"]["name"];

        $obj=new data();
        $obj->setconnection();
        $obj->addbook($bookpic,$bookname,$bookdetail,$bookauthor,$bookpublish,$branch,$bookprice,$bookquantity);
    }
    else{
        echo "File cannot be uploaded"; 
    }