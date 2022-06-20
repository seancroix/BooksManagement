<?php

include("data_class.php");

$login_email=$_GET['login_email'];
$login_password=$_GET['login_password'];

if($login_email==null||$login_password==null){
    $emailmsg="";
    $passwmsg="";
    if($login_email==null){
        $emailmsg="Email is Empty!";
    }

    if($login_password==null){
        $passwmsg="Password cannot be Empty!";
    }

    header("Location:index.php?addemailmsg=$emailmsg&addpasswmsg=$passwmsg");
}

elseif($login_email!=null&&$login_password!=null){


$obj=new data();
$obj->setconnection();
$obj->adminLogin($login_email,$login_password);
}
