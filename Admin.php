<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>SFA</title>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class='logo-holder logo-3 mr-3'>
            <a>
                <h3>SFA</h3>
                <p>WE ARE FARMER</p>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active ml-3">
                    <a class="nav-link" href="#">Home | Admin <span class="sr-only">(current)</span></a>
                </li>

             
            </ul>

            <span class="navbar-text">
                <ul class="navbar-nav mr-auto">
                     
                <li class="nav-item ">
                    <a class="nav-link" href="./admin/farmerdata.php">Farmers</a>
                </li>

                <li class="nav-item mr-1 ">
                    <a class="nav-link" href="./admin/investordata.php">Investors </a>
                </li>
                <li class="nav-item mr-4">
                    <a class="nav-link" href="./admin/query.php">Query</a>
                </li>
            

                <li class="nav-item p-2">
                       <button type="button" data-toggle="modal" data-target="#exampleModal2"  class="btn btn-success">Add Admin</button>
                       </li> 
                    <li class="nav-item">
                        <a class="nav-link" href = "logout.php"><button type="button" class="btn btn-success">Logout</button></a>

                    </li>
                    
                </ul>
            </span>

        </div>
    </nav>
    <!--Navbar End-->
    <?php 
    //for sql connection
    $host = 'localhost:3306';  
    $user = 'root';  
    $pass = ''; 
    $dbname = 'farmerdbs';   
    $conn = mysqli_connect($host, $user, $pass,$dbname);  
    if(! $conn )  
    {  
    die('Could not connect: ' . mysqli_connect_error());  
    }  
    $rowcount="";
    $rowcount1="";
    $rowcount2="";
    $rowcount3="";
    $sql = "SELECT * from farmerlogin";
    $sql1 = "SELECT * from investor";
    $sql2 = "SELECT * from image";
    $sql3 = "SELECT * from imageinvestor";
    if ($result = mysqli_query($conn, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    }
    if ($result1 = mysqli_query($conn, $sql1)) {
        // Return the number of rows in result set
        $rowcount1 = mysqli_num_rows( $result1 );
        }
        if ($result2 = mysqli_query($conn, $sql2)) {
            // Return the number of rows in result set
            $rowcount2 = mysqli_num_rows( $result2 );
            }
            if ($result3 = mysqli_query($conn, $sql3)) {
                // Return the number of rows in result set
                $rowcount3 = mysqli_num_rows( $result3 );
                }


  
// Close the connection
mysqli_close($conn);
    ?>

<div class="d-flex justify-content-around m-4">
<div>
<button type="button" style="width: 200px;height: 210px;" class="btn btn-primary">
 <h1> Total Farmers <br> <span class="badge badge-light"><?php echo $rowcount; ?></span></h1>

</button>
</div>
<div>
<button type="button" style="width: 200px;height: 210px;" class="btn btn-primary">
<h1>Total Investors<br> <span class="badge badge-light"><?php echo $rowcount1 ?></span></h1>

</button>
</div>
<div>
<button type="button" style="width: 200px;height: 210px;" class="btn btn-primary">
<h1>Total Farmer Farms<br>  <span class="badge badge-light"><?php echo $rowcount2 ?></span></h1>

</button>
</div>

<div>
<button type="button" style="width: 200px;height: 210px;" class="btn btn-primary ">
<h1> Total Investors Invest <br><span class="badge badge-light"><?php echo $rowcount3 ?></span></h1>

</button>
</div>

</div>










 <!---Admin module start-->

 <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel2">Admin Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="AdminSave.php" method="post">

                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-form-label">Address</label>
                            <textarea class="form-control" id="address" name="address"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-form-label">Aadhar Card Number</label>
                            <input type="number" class="form-control" id="aadhar" name="aadhar">
                        </div>

                        <div class="form-group">
                            <label for="phonenumber" class="col-form-label">Mobile Number</label>
                            <input type="number" class="form-control" id="phone" name="phone">
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="adminid" class="col-form-label">Admin Id Card Number</label>
                            <input type="number" class="form-control" id="adminid" name="adminid">
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                     
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
    <!---Admin module End-->
    






    <!--Footer End--->
    <div class="fixed-bottom bg-dark text-white text-center p-1">
        <p>Developed By : Jarvis Vision</p>
    </div>
    <!--Footer End--->






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>