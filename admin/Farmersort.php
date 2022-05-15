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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
           $from=$_POST['from'];
           $to=$_POST['to'];
           $sql = "select * from image where cultivationdate between '$from' and '$to'";
           $retval=mysqli_query($conn, $sql);

           

        

        $user=$_SESSION['username'];
        if (isset($_POST['update'])) {

           
           $id=$_POST['id'];
           $harvesting=$_POST['harvesting'];
           $harvesting=$_POST['production'];
           $totalpay=$_POST['totalpay'];
           $firstinstall=$_POST['firstinstall'];
           $firstinstalldate=$_POST['firstinstalldate'];
           $secondinstall=$_POST['secondinstall'];
           $secondinstalldate=$_POST['secondinstalldate'];

           $fi=$firstinstall. " ". " Date - " .$firstinstalldate;
           $si=$secondinstall. " ". " Date - " .$secondinstalldate;
          

           $sql2 = "UPDATE image SET harvestingdate='$harvesting',production='$harvesting',totalpay='$totalpay',firstinstall='$fi',secondinstall='$si' WHERE farmerid=$id";
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

                <li class="nav-item  active">
                    <a class="nav-link" href="farmerdata.php">Farmers </a>
                </li>

                <li class="nav-item  active">
                    <a class="nav-link" href="FarmerBankDetails.php">Farmers Bank Details </a>
                </li>

                <li class="nav-item mr-1">
                    <a class="nav-link" href="investordata.php">Investors </a>
                </li>

                <li class="nav-item mr-4">
                    <a class="nav-link" href="query.php">Query</a>
                </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><button type="button" class="btn btn-success">Logout</button></a>

                    </li>

                </ul>
            </span>

        </div>
    </nav>
        
    <!---->
    <div class="container">
        <h3 class="text-center text-success">From - <?php echo $from=$_POST['from']; ?> To - <?php echo $to=$_POST['to']; ?> Data of Farmer</h3>
    </div>
  
    <div class="container-fluid mt-2 table-responsive">
        <table class="fbody table table-bordered ">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Farmer ID</th>
                    <th scope="col">Aadhar Number</th>
                    <th scope="col">7/12 File</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Cultivation Date</th>
                    <th scope="col">Harvesting Date</th>
                    <th scope="col">Production Date</th>
                    <th scope="col">Total Pay</th>
                    <th scope="col">First Installment</th>
                    <th scope="col">Second Installment</th>
                    <th scope="col">Update Information</th>
                </tr>
            </thead>
            <tbody>
        <?php
            if(mysqli_num_rows($retval) > 0){  
                while($row = mysqli_fetch_assoc($retval)){   
            ?>
            <tr>
            <td><?php echo $row['farmerid']??''; ?></td>
            <td><?php echo $row['aadhar']??''; ?></td>
            <td><a href="./Upload/<?php echo $row['filename']??''; ?>" download>Download 7/12 For Verification</a></td>
            <td><?php echo $row['name']??''; ?></td>
            <td><?php echo $row['address']??''; ?></td>
            <td><?php echo $row['cultivationdate']??''; ?></td>
            <td><?php echo $row['harvestingdate']??''; ?></td>
            <td><?php echo $row['production']??''; ?></td>
            <td><?php echo $row['totalpay']??''; ?></td>
            <td><?php echo $row['firstinstall']??''; ?></td>
            <td><?php echo $row['secondinstall']??''; ?></td>
            <td><button type="button" data-toggle="modal" data-target="#exampleModal"  class="btn btn-outline-success" data-whatever="<?php echo $row['farmerid']??''; ?>" >Update</button></td>
        
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
                    <h5 class="modal-title text-success" id="exampleModalLabel">Update Farmers Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                                    ?>" method="post">
                        <h4 class="form-signin-heading"></h4>

                        <input type="text" hidden id="mad" name="id">
                       
                        <label for="harvesting">Harvesting Date</label>
                        <input type="date" class="form-control" name="harvesting" placeholder="harvesting Date" required autofocus></br>
                        <label for="production">Production Date</label>
                        <input type="date" class="form-control" name="production" placeholder="Production Date" required autofocus></br>
                        <input type="number" class="form-control" name="totalpay" placeholder="Totalpay " required autofocus></br>
                        <input type="number" class="form-control" name="firstinstall" placeholder="First installment " required autofocus></br>
                        <label for="firstinstallDate">First Installment Date</label>
                        <input type="date" class="form-control" name="firstinstalldate" placeholder="First installment Date " required autofocus></br>
                        <input type="number" class="form-control" name="secondinstall" placeholder="Second installment " required autofocus></br>
                        <label for="secondinstalldate">Second Installment Date</label>
                        <input type="date" class="form-control" name="secondinstalldate" placeholder="Second installment Date " required autofocus></br>
                     
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