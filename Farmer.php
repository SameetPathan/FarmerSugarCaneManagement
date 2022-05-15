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
                    <a class="nav-link" href="#">Home | Farmer <span class="sr-only">(current)</span></a>
                </li>

            </ul>

            <span class="navbar-text">
                <ul class="navbar-nav mr-auto">

                <li class="nav-item ">
                    <a class="nav-link" href="./farmer/cultivation.php">Cultivation </a>
                </li>

                <li class="nav-item mr-1">
                    <a class="nav-link" href="./farmer/harvesting.php">Harvesting </a>
                </li>

                <li class="nav-item mr-1">
                    <a class="nav-link" href="./farmer/production.php">Production </a>
                </li>

                <li class="nav-item mr-1">
                    <a class="nav-link" href="./farmer/payment.php">Payment </a>
                </li>

                <li class="nav-item mr-4">
                    <a class="nav-link" href="./farmer/query.php">Query</a>
                </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><button type="button" class="btn btn-success">Logout</button></a>

                    </li>

                </ul>
            </span>

        </div>
    </nav>
    <!--Navbar End-->
    <form method="POST" action="ImageUpload.php" enctype="multipart/form-data">

        <div class="card container mt-5" style="width: 30rem;">
            <div class="card-body">
                <div class="input-group mb-1 p-2">

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">Name</label>
                            <input type="text" class="form-control" id="validationTooltip01" name="name" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip02">Address</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="address"  required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">7/12</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="uploadfile" class="custom-file-input" id="uploadfile" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="uploadfile">Choose file</label>
                    </div>

                    

                    


                    

                    


                </div>
                <div class="form-row">
                        
                        <div class="col-md-6 mb-3">

                        <label for="cultivation">Cultivation Date</label>
                        <input type="date" class="form-control" name="cultivation" placeholder="Cultivation Date " required autofocus></br>
                           
                        </div>
                    </div>
                <div class="input-group mb-1 p-2">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>

            </div>
        </div>
    </form>


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