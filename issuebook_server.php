<?php

include("data_class.php");

$book=$_POST['book'];
$userselect=$_POST['userselect'];
$getdate=date("d/m/y");
$days=$_POST['days'];
$returnDate=Date('d/m/y', strtotime('+'.$days.'days'));

$obj=new data();
$obj->setconnection();
$obj->issuebook($book,$userselect,$days,$getdate,$returnDate);