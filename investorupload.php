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

    <title>Investor Saved Success</title>
  </head>
  <body>

    <div class="container-fluid">
<?php
error_reporting(0);
?>
<?php
 
  // image upload...
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "./admin/UploadInvestor/".$filename;
          
    $host = 'localhost:3306';  
    $user = 'root';  
    $pass = ''; 
    $dbname = 'farmerdbs';   
    $conn = mysqli_connect($host, $user, $pass,$dbname);  
    if(! $conn )  
    {  
    die('Could not connect: ' . mysqli_connect_error());  
    }  
        //echo $filename;
        $user=$_SESSION['username'];
        //echo $user;
       $savefile=$user.".JPG";
       $name =  $_REQUEST['name'];
        $address = $_REQUEST['address'];
        $cardno = $_REQUEST['cardno'];
        //echo $savefile;
     
            // Get all the submitted data from the form
        $sql = "INSERT INTO imageinvestor (aadhar,filename,name,address,cardno) VALUES ('$user','$filename','$name','$address','$cardno')";
  
        // Execute query 
        mysqli_query($conn, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            echo "<div class='alert alert-success' role='alert'>
            Image Uploaded Successful Thank you ! 
            <a href='Investor.php'> <button type='submit' class='btn btn-success'>Back To Home</button></a>
            </div>";  
        }else{
            echo "<div class='alert alert-danger' role='alert'>
            Try Again Something went wrong ! 
            <a href='Investor.php'> <button type='submit' class='btn btn-success'>Back To Uplaod</button></a>
        </div> "; 
      }
     
        
  
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