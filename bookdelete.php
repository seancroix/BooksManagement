<?php
include("data_class.php");

$bookdelete=$_GET['bookdelete'];

$obj=new data();
$obj->setconnection();
$obj->bookdeletedata($bookdelete);