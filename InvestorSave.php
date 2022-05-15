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

    <title>Farmer Saved Success</title>
  </head>
  <body>

    <div class="container-fluid">
        <?php
        
        $host = 'localhost:3306';  
        $user = 'root';  
        $pass = ''; 
        $dbname = 'farmerdbs';   
        $conn = mysqli_connect($host, $user, $pass,$dbname);  
        if(! $conn )  
        {  
        die('Could not connect: ' . mysqli_connect_error());  
        }  
            
        // Taking all 5 values from the form data(input)
        $name =  $_REQUEST['name'];
        $address = $_REQUEST['address'];
        $aadhar =  $_REQUEST['aadhar'];
        $phoneno = $_REQUEST['phone'];
        $email = $_REQUEST['email'];
        $sugarid = $_REQUEST['sugarid'];
        $password = $_REQUEST['password'];
            
        // Performing insert query execution
       
        
	    $sql = "INSERT INTO investor VALUES ('$name','$address','$aadhar','$phoneno','$email','$sugarid','$password')";  
            if(mysqli_query($conn, $sql)){  
            echo "<div class='alert alert-success' role='alert'>
        Registration Successful Thank you ! 
        <a href='Index.php'> <button type='submit' class='btn btn-success'>Back To Home</button></a>
        </div>";  
            }else{  
                echo "<div class='alert alert-danger' role='alert'>
            Try Again Something went wrong ! May Already Register
            <a href='Index.php'> <button type='submit' class='btn btn-success'>Back To Home</button></a>
        </div> ";  
            }  
            
        // Close connection
        mysqli_close($conn);
        ?>
    </div>

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