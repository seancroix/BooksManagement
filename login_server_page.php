<?php

include("data_class.php");

$login_email=$_GET['login_email'];
$login_password=$_GET['login_password'];


if($login_email==null||$login_password==null){
    $emailmsg="";
    $passwmsg="";
    
    if($login_email==null){
        $emailmsg="Email cannot be empty!";
    }
    if($login_password==null){
        $passmsg="Password cannot be empty!";
    }

    header("Location: index.php?emailmsg=$emailmsg&pasdmsg=$passwmsg");
}

elseif($login_email!=null&&$login_password!=null){
    $obj=new data();
    $obj->setconnection();
    $obj->userLogin($login_email,$login_password);

}