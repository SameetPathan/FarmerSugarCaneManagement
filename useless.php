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
	$image_details  = mysqli_query($conn, "SELECT * FROM image");
     while ($row = mysqli_fetch_array($image_details)) {     
		
      	echo "<img src='Upload/".$row['filename']."' width='50' height='50' >";   
      
    }     

	?>


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
	$image_details  = mysqli_query($conn, "SELECT * FROM image");
     while ($row = mysqli_fetch_array($image_details)) {     
		
      	echo "<img src='Upload/".$row['filename']."' width='50' height='50' >";   
      
    }     

	?>
 


 if(mysqli_num_rows($retval) > 0){  
 while($row = mysqli_fetch_assoc($retval)){  
    echo "EMP ID :{$row['id']}  <br> ".  
         "EMP NAME : {$row['name']} <br> ".  
         "EMP SALARY : {$row['salary']} <br> ".  
         "--------------------------------<br>";  
 } //end of while  
}else{  
echo "0 results";  
}


<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>







SELECT id 
FROM events 
WHERE start >= '2013-07-22' AND end <= '2013-06-13'



$oquery=$conn->query("select * from `login` where login_date between '$from' and '$to'");