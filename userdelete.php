<?php
include("data_class.php");

$userdelete=$_GET['useriddelete'];

$obj=new data();
$obj->setconnection();
$obj->deleteuserdata($userdelete);