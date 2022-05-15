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

           // $sql = "SELECT * FROM image WHERE aadhar='" . $user . "'"; 
           // $result=mysqli_query($Conn,$sql);
          //  $singleRow = mysqli_fetch_assoc($result);
        //  $sql = "SELECT * FROM image WHERE aadhar='$user'";
         // $row2 = mysqli_fetch_assoc($retval);
        // if(mysqli_num_rows($retval) > 0){  
        // while($row = mysqli_fetch_assoc($retval)){  
       //     echo "EMP ID :{$row['aadhar']}  <br> ".  
        //            "EMP NAME : {$row['name']} <br> ".  
        //           "EMP SALARY : {$row['cultivationdate']} <br> ".  
             //      "--------------------------------<br>";  
         //  } //end of while  
         // }else{  
         //  echo "0 results";  
        //   }  

        $user=$_SESSION['username'];
        if (isset($_POST['update'])) {

   
            $id=$_POST['id'];
            $payment=$_POST['payment'];
            $dist1=$_POST['dist1'];
            $dist2=$_POST['dist2'];
            $date1=$_POST['date1'];
            $date2=$_POST['date2'];
         
          

            $sql2 = "UPDATE imageinvestor SET dist1='$dist1',dist2='$dist2',date1='$date1',date2='$date2',payment='$payment' WHERE investorid=$id";

           if(mysqli_query($conn, $sql2)){
               echo "<div class='alert alert-success' role='alert'>
               Query Sended ! Refresh Page to Check
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
   <span aria-hidden='true'>&times;</span>
 </button>
             </div>";

           } else {
               echo "<div class='alert alert-danger' role='alert'>
               Error
             </div>";
             echo  mysqli_error($conn);
             
           }

       }
       $conn->close();

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
                    <a class="nav-link" href="/FarmerHM/Admin.php">Home | Admin <span class="sr-only">(current)</span></a>
                </li>

            </ul>

            <span class="navbar-text">
                <ul class="navbar-nav mr-auto">

                <li class="nav-item ">
                    <a class="nav-link" href="farmerdata.php">Farmers</a>
                </li>

                <li class="nav-item mr-1 active">
                    <a class="nav-link" href="investordata.php">Investors </a>
                </li>

                <li class="nav-item mr-4">
                    <a class="nav-link" href="query.php">Query</a>
                </li>

                <li class="nav-item mr-1 active">
                    <a class="nav-link" href="Investorsort.php">Investors Not Paid/Distributed</a>
                </li>

              

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><button type="button" class="btn btn-success">Logout</button></a>

                    </li>

                </ul>
            </span>

        </div>
    </nav>


      <!---->
      <div class="container-fluid mt-2 table-responsive">
        <table class="table table-bordered ">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Investor Id</th>
                    <th scope="col">Aadhar Number</th>
                    <th scope="col">Card Number</th>
                    <th scope="col">Investor Card </th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Distribution 1</th>
                    <th scope="col">Distribution 1 Date</th>
                    <th scope="col">Distribution 2</th>
                    <th scope="col">Distribution 2 Date</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Action</th>
                
                </tr>
            </thead>
            <tbody>
        <?php
            if(mysqli_num_rows($retval) > 0){  
                while($row = mysqli_fetch_assoc($retval)){   
            ?>
            <tr>
            <td><?php echo $row['investorid']??''; ?></td>
            <td><?php echo $row['aadhar']??''; ?></td>
            <td><?php echo $row['cardno']??''; ?></td>
           <td><a href="./Upload/<?php echo $row['filename']??''; ?>" download>Download Card For Verification</a></td>
            <td><?php echo $row['name']??''; ?></td>
            <td><?php echo $row['address']??''; ?></td>
            <td><?php echo $row['dist1']??''; ?></td>
            <td><?php echo $row['date1']??''; ?></td>
            <td><?php echo $row['dist2']??''; ?></td>
            <td><?php echo $row['date2']??''; ?></td>
            <td><?php echo $row['payment']??''; ?></td>
            <td><button type="button" data-toggle="modal" data-target="#exampleModal"  class="btn btn-outline-success" data-whatever="<?php echo $row['investorid']??''; ?>" >Update</button></td>
        
            </tr>
            <?php  }   }else{  echo "0 results";  
           }   
            ?>
           
            </tbody>
            </table>
      
        </div>
    <!---->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel">Update Investor Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                                    ?>" method="post">
                        <h4 class="form-signin-heading"></h4>

                        <input type="text" hidden id="mad" name="id">

                        <label for="distribution1d">Distribution 1 Date</label>
                        <input type="date" class="form-control" name="date1" placeholder="Distribution 1 Date " required autofocus></br>

                        <label for="Distribution1">Distribution 1</label>
                        <input type="text" class="form-control" name="dist1" placeholder="Distribution 1" required autofocus></br>
                        
                        <label for="Distribution2d">Distribution 2 Date</label>
                        <input type="date" class="form-control" name="date2" placeholder="Distribution 2 Date" required autofocus></br>
                        
                      

                        <label for="Distribution2">Distribution 2</label>
                        <input type="text" class="form-control" name="dist2" placeholder="Distribution 2" required autofocus></br>
                        
                        
                        <input type="number" class="form-control" name="payment" placeholder="Payment " required autofocus></br>
                        
                     
                        <button class="btn btn-lg btn-primary btn-block mt-2" type="submit" name="update">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
 

  
  document.getElementById('mad').value=recipient;
  
})
    </script>


</body>

</html>