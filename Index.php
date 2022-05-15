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
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item p-2">
                    <button type="button" data-toggle="modal" data-target="#exampleModal"  class="btn btn-outline-success">Login</button>
                </li>

            </ul>

            <span class="navbar-text">
                <ul class="navbar-nav mr-auto">

         
             
                    <li class="nav-item p-2">
                      <button type="button" data-toggle="modal" data-target="#exampleModal3" class="btn btn-success">Farmer Register</button>
                    </li>
                    <li class="nav-item p-2">
                        <button type="button" data-toggle="modal" data-target="#exampleModal4"  class="btn btn-success">Investor Register</button>
                    </li>
                </ul>
            </span>

        </div>
    </nav>
    <!--Navbar End-->

    <div class="container-fluid form-signin">

        <?php

        $host = 'localhost:3306';  
        $user = 'root';  
        $pass = '';  
         $dbname = 'farmerdbs';  
        $conn = mysqli_connect($host, $user, $pass,$dbname);  
        if(! $conn )  
        {  
            die('Could not connect: ' .  mysqli_connect_error()); 
        }  

        $msg = '';
        $usertype = '';

        if (
            isset($_POST['login']) && !empty($_POST['username'])
            && !empty($_POST['password'])
        ) {

            if ($user = $_POST['usertype'] == 'u1') {


                $sql = "SELECT * FROM farmerlogin";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    if (
                        $_POST['username'] == $row["aadhar"] &&
                        $_POST['password'] == $row["password"]
                    ) {
                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['username'] = $row["aadhar"];
    
                        $msg = 'Logging You IN';
    
    
                        header('Refresh: 2; URL = Farmer.php');
                        # mysqli_close($conn);  
                    } else {
    
                        
                    }
                }
               
                } else {
                echo "0 results";
                }
               

            
            }
            if ($user = $_POST['usertype'] == 'u2') {


                $sql = "SELECT * FROM adminlogin";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    if (
                        $_POST['username'] == $row["aadhar"] &&
                        $_POST['password'] == $row["password"]
                    ) {
                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['username'] = $row["aadhar"];
    
                        $msg = 'Logging You IN';
    
    
                        header('Refresh: 2; URL = Admin.php');
                        # mysqli_close($conn);  
                    } else {
    
                        $msg = 'Wrong username or password';
                    }
                }
                } else {
                echo "0 results";
                }
               
            }

            if ($user = $_POST['usertype'] == 'u3') {


                $sql = "SELECT * FROM investor";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    if (
                        $_POST['username'] == $row["aadhar"] &&
                        $_POST['password'] == $row["password"]
                    ) {
                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['username'] = $row["aadhar"];
    
                        $msg = 'Logging You IN'.$_SESSION['username'];
                      
    
    
                        header('Refresh: 2; URL = Investor.php');
                        # mysqli_close($conn);  
                    } else {
    
                        $msg = 'Wrong username or password';
                    }
                }
                } else {
                echo "0 results";
                }
               
            }
        }
        $conn->close();
        ?>
    </div> <!-- /container -->

    <!--Home bg--->
    <?php echo $msg; ?>

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./Image/bghome.jpg" class="d-block w-100" height="510px" alt="...">
                <div class="carousel-caption d-none d-md-block">


                </div>
            </div>

            <div class="carousel-item">
                <img src="./Image/bghome2.jpg" class="d-block w-100" height="510px" alt="...">
                <div class="carousel-caption d-none d-md-block">


                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <!--Home bg End--->

    <!---Login Module-->



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                                    ?>" method="post">
                        <h4 class="form-signin-heading"></h4>
                        <input type="text" class="form-control" name="username" placeholder="username " required autofocus></br>
                        <input type="password" class="form-control" name="password" placeholder="password " required>

                        <select class="custom-select mt-2" name="usertype" id="validationTooltip04" required>
                            <option selected disabled value="">User type</option>
                            <option value="u1">Farmer</option>
                            <option value="u2">Admin</option>
                            <option value="u3">Investor</option>
                        </select>




                        <button class="btn btn-lg btn-primary btn-block mt-2" type="submit" name="login">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!----Login module end---->


   


     <!-- Farmer Module start--->

     <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel3">Farmer Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="FarmerSave.php" method="post">
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
    <!---Farmer module end-->


     <!---Investor module  start-->

     <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel4">Investor Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="InvestorSave.php" method="post">
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
                            <label for="sugarid" class="col-form-label">Sugar Card ID Number</label>
                            <input type="number" class="form-control" id="sugarid" name="sugarid">
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
    <!--Investor module end--->




    <!--Footer End--->
    <div class="fixed-bottom bg-dark text-white text-center p-1">
        <p>Developed By : Jarvis Vision 2022</p>
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