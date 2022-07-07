<?php
include("data_class.php");
// session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="">
</head>

<style>
a{
    text-decoration:none;
}    
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
    .rightinnerdiv {
        float: right;
        width: 75%;
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


            <!-- Adding Person Whether Student or Teacher -->
            <div class="rightinnerdiv">
            <div id="addperson" class="innerright portion" style="display:none">
            <button class="bluebtn">ADD PERSON</button>
            <form action="addperson_page.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
            <label class="form-label">Name:</label><input class="form-control" type="text" name="addname"/>
            </br>
            </div>
            <label class="form-label">Password:</label><input class="form-control" type="password" name="addpass"/>
            </br>
            <label class="form-label">Email:</label><input class="form-control" type="email" name="addemail"/></br>
            <label for="type">Choose type:</label>
            <select name="type">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
            
            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            <!-- Books requested by student/teacher portion -->
            <div class="rightinnerdiv">   
            <div id="bookrequestapprove" class="innerright portion" style="display:none">
            <Button class="bluebtn" >BOOK REQUEST APPROVE</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->requestbookdata();
            $recordset=$u->requestbookdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Person Name</th><th>Person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
               // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                 $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approve Book?</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>


            <!-- Issue book  -->
            <div class="rightinnerdiv">   
            <div id="issuebook" class="innerright portion" style="display:none">
            <Button class="bluebtn" >ISSUE BOOK</Button>
            <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
            <label for="book">Choose Book:</label>
            <select name="book" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>
            </select>

            <label for="Select Student">:</label>
            <select name="userselect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
<br>
            Days<input type="number" name="days"/>

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            <!-- Issue book report -->
            <div class="rightinnerdiv">   
            <div id="issuebookreport" class="innerright portion" style="display:none">
            <Button class="bluebtn" >Issue Book Record</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table class='table-primary table-striped w-100 px-2' style=''><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>
            
            <!-- Book Reporting -->
            <div class="rightinnerdiv">   
            <div id="bookreport" class="innerright portion" style="display:none">
            <Button class="bluebtn" >BOOK RECORD</Button>
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbook();
            $recordset=$u->getbook();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Book Name</th><th>Price</th><th>Qnt</th><th>Rent</th></th><th>View</th><th>Delete?</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[10]</td>";
                $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View Book</button></td>";
                $table.="<td><a href='bookdelete.php?bookdelete=$row[0]'><button type='button' class='btn btn-primary'>Delete</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <!-- Book Detail -->

            <div class="rightinnerdiv">   
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            
            <Button class="bluebtn" >BOOK DETAIL</Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($_GET["viewid"] ?? "-1");
            foreach($recordset as $row){

                $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthor= $row[4];
               $bookpublish= $row[5];
               $branch= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];

            }            
?>

            <div class="d-flex px-4 pt-2">
            <img class="w-50" src="uploads/<?php echo $bookimg?> "/>
                <div class="ps-2 text-start">
                    <div class="d-flex gap-1 align-items-center">
                        <h4>Book Name: </h4> 
                        <strong><?= $bookname ?></strong>
                    </div>
                    <div class="d-flex gap-1 align-items-center">
                        <h4>Book Detail: </h4>
                        <strong><?= $bookdetail ?></strong>
                    </div>
                    <div class="d-flex gap-1 align-items-center">
                        <h4>Book Author: </h4>
                        <strong><?= $bookauthor ?></strong>
                    </div>
                    <div class="d-flex gap-1 align-items-center">
                        <h4>Book Publisher: </h4>
                        <strong><?= $bookpublish ?></strong>
                    </div>
                    <div class="d-flex gap-1 align-items-center">
                        <h4>Book Branch: </h4>
                        <strong><?= $branch ?></strong>
                    </div>
                    <div class="d-flex gap-1 align-items-center">
                        <h4>Book Price: </h4>
                        <strong><?= $bookprice ?></strong>
                    </div>
                    <div class="d-flex gap-1 align-items-center">
                        <h4>Book Available: </h4>
                        <strong><?= $bookava ?></strong>
                    </div>
                    <div class="d-flex gap-1 align-items-center">
                        <h4>Book Rent: </h4>
                        <strong><?= $bookrent ?></strong>
                    </div>
                </div>
            </div>

            </div>
            </div>

            <!-- Student Reporting -->
            <div class="rightinnerdiv">   
            <div id="studentrecord" class="innerright portion" style="display:none">
            <Button class="bluebtn" >Student RECORD</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'> Name</th><th>Email</th><th>Type</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td><a href='userdelete.php?useriddelete=$row[0]'><button type='button' class='btn btn-primary'>Delete</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>


            <!-- Adding Book -->
            <div class="rightinnerdiv">   
            <div id="addbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="bluebtn" >ADD NEW BOOK</Button>
            <form action="addbook_page.php" class="text-start px-4 pt-2 d-flex flex-column gap-1" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Book Name:</label>
                    <input class="form-control" type="text" name="bookname"/>
                </div>
                <div class="mb-3">
                <label class="form-label">Detail:</label><input class="form-control" type="text" name="bookdetail"/>
                </div>
                <div class="mb-3">
                <label class="form-label">Author:</label><input class="form-control" type="text" name="bookauthor"/>
                </div>
                <div class="mb-3">
                <label class="form-label">Publication</label><input class="form-control" type="text" name="bookpublish"/>
                </div>
                <div class="form-check">Branch:
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="BSIT" name="branch" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                        BSIT
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="BSCS" name="branch" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                        BSCS
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Other" name="branch" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                        Other
                        </label>
                    </div>
                </div>   
                <label class="form-label">Price:</label><input class="form-control" type="number" name="bookprice"/>
                <label class="form-label">Quantity:</label><input class="form-control" type="number" name="bookquantity"/>
                <label class="form-label">Book Photo</label><input class="form-control" type="file" name="bookphoto"/>
                <input type="submit" value="SUBMIT"/>
            </form>
            </div>
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