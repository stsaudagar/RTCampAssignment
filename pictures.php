<?php
   session_start();
   $emailid=$_SESSION['emailid'];    
    echo 'Welcome '.$emailid;  

?> 
<html>
    
    <p style="text-align: right"><a href="Logout.php">Logout</a></p>
    <h1 style="text-align: center"> Pictures </h1>
        <br>
        <br>
        
<?php 
        $con=mysqli_connect("localhost","root","","fb");         
 
       
              $query=  mysqli_query($con,"select * from account where Email_id='$emailid'");
                while ($row = mysqli_fetch_array($query)) 
                {
                    echo "<tr>";
                    ?>
        
                    <p style="text-align: center">  click <a href="slideShow.php"> <img src="FolderIcon/Folder_icon.png" width="40" height="40"><?php echo $row["Fname"]?></a>                 
                     slide show
                    </p>
                   <?php
                 
                }            
                
                ?>             
                  <br>
                  <br>
                  
                  <p style="text-align: center"><a href="downLoad.php">Download Album</a>
                  <p style="text-align: center"><a href="UploadImage.php">Upload Image</a>
                      <br>
                      <br>
                      
                  <p style="text-align: center"><a href="Login.php"><< back</a>
       </body>
</html>