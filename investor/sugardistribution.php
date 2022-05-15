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

            $user=$_SESSION['username'];
            $sql = 'SELECT * FROM imageinvestor';  
            $retval=mysqli_query($conn, $sql);  

         // $sql = "SELECT * FROM imageinvestor";
         // $row2 = mysqli_fetch_assoc($retval);
      
        
        ?>
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
                    <a class="nav-link" href="/FarmerHM/Investor.php">Home | Investor <span class="sr-only">(current)</span></a>
                </li>
            
            </ul>

            <span class="navbar-text">
                <ul class="navbar-nav mr-auto">


                <li class="nav-item mr-3 active ">
                    <a class="nav-link" href="sugardistribution.php">Sugar Distribution</a>
                </li>

                
                <li class="nav-item mr-4">
                    <a class="nav-link" href="query.php">Query</a>
                </li>

                    <li class="nav-item">
                        <a class="nav-link" href = "logout.php"><button type="button" class="btn btn-success">Logout</button></a>

                    </li>
                    
                </ul>
            </span>

        </div>
    </nav>
    <!--Navbar End-->

    <div class="container mt-2">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Investor Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Aadhar Number</th>
                    <th scope="col">Card Number</th>
                    <th scope="col">Distribution Sugar 1</th>
                    <th scope="col">Distribution Sugar 1 Date</th>
                    <th scope="col">Distribution Sugar 2</th>
                    <th scope="col">Distribution Sugar 2 Date</th>
                    <th scope="col">Payment</th>
                    

                </tr>
            </thead>
            <tbody>
            <?php
            if(mysqli_num_rows($retval) > 0){  
                while($row2 = mysqli_fetch_assoc($retval)){   
            ?>
                <tr>
                <td><?php echo $row2['investorid']; ?></td>
                    <td><?php echo $row2['name']; ?></td>
                    <td><?php echo $row2['aadhar']; ?></td>
                    <td><?php echo $row2['cardno']; ?></td>
                    <td><?php echo $row2['dist1']; ?></td>
                    <td><?php echo $row2['date1']; ?></td>
                    <td><?php echo $row2['dist2']; ?></td>
                    <td><?php echo $row2['date2']; ?></td>
                    <td><?php echo $row2['payment']; ?></td>


                </tr>
                <?php  }   }else{  echo "0 results";  
           }   
            ?>
    
            </tbody>
        </table>

    </div>


 






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