<?php


session_start();

$adminId = $_SESSION["adminId"];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="">
</head>

<style>
    .logo {
        margin: auto;
    }

    .innerdiv {
        text-align: center;
        margin: 100px;
    }

    .leftinnerdiv {
        float: left;
        width: 25%;
    }

    .bluebtn {
        background-color: blue;
        color: white;
        width: 95%; 
        height: 40px;
        margin-top: 8px;
    }
</style>

<body>
    <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="logo" src="images/logo.jpg"></div>
            <div class="leftinnerdiv">

                <Button class="bluebtn">Admin</Button>
                <Button class="bluebtn" onclick="openpart('addbook')">ADD BOOK</Button>
                <Button class="bluebtn" onclick="openpart('bookreport')"> BOOK REPORT</Button>
                <Button class="bluebtn" onclick="openpart('bookrequestapprove')"> BOOK REQUESTS</Button>
                <Button class="bluebtn" onclick="openpart('addperson')"> ADD STUDENT</Button>
                <Button class="bluebtn" onclick="openpart('studentrecord')"> STUDENT REPORT</Button>
                <Button class="bluebtn" onclick="openpart('issuebook')"> ISSUE BOOK</Button>
                <Button class="bluebtn" onclick="openpart('issuebookreport')"> ISSUE REPORT</Button>
                <a href="index.php"><Button class="bluebtn"> LOGOUT</Button></a>


            </div>
        </div>
    </div>

    <script>
        function openpart(portion) {
            var i;
            var x = document.getElementsByClassName("portion");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(portion).style.display = "block";
        }
    </script>
</body>

</html>