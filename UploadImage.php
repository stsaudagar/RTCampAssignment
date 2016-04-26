<?php
   session_start();
   $emailid=$_SESSION['emailid'];    
    echo 'Welcome '.$emailid;  
?>

<html>
<body>
<center>

    <h1> Upload Picture</h1>
    
<p style="text-align: right"><a href="Logout.php">Logout</a></p>
<form action="" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" multiple /> 
<br />
<br/>

<input type="submit" name="submit" value="Submit"/>
<input type="reset" name="cancel" value="Cancel"/>

</form>
<?php

// Assigning value about your server to variables for database connection

 $con=  mysqli_connect("localhost", "root", "", "fb");
  $query=  mysqli_query($con,"select * from account where Email_id='$emailid'");
    $count=  mysqli_num_rows($query);
//   echo 'Count'.$count;
           
     while ($row = mysqli_fetch_assoc($query))
     {
         $dbusername=$row['Fname'];              
     }   

    if(mysqli_connect_errno())
    {
        echo 'Error'.  mysqli_connect_error();
    }
    else
        {
         if(isset($_POST['submit']))
        { 
            if ($_FILES["file"]["error"] > 0)
            {
            // if there is error in file uploading 
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

            }
            else
            {
                // check if file already exit in "img" folder.
                if (file_exists("img/" .$dbusername."/". $_FILES["file"]["name"]))
                {
                echo $_FILES["file"]["name"] . " already exists. ";
                echo ' <br/> <a href="pictures.php"> Back</a> ';
                }
                else
                {  //move_uploaded_file function will upload your image.  if you want to resize image before uploading see this link http://b2atutorials.blogspot.com/2013/06/how-to-upload-and-resize-image-for.html
                        if(move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$dbusername."/". $_FILES["file"]["name"]))
                        {
                        // If file has uploaded successfully, store its name in data base4
                           // echo "File Name:".$_FILES['file']['name'];
                            $fnm=$_FILES['file']['name']; 
                            $absolutepath=  realpath(dirname(__FILE__));
                            //echo 'Absolute Path'.$absolutepath;
                            //echo 'email'.$emailid.$dbusername;
                            $path='img/'.$dbusername."/".$fnm;
                            if(mysqli_query($con, "insert into user values('$emailid','$path')"))
         {
                                echo "Stored in: " . "img/" .$dbusername."/". $_FILES["file"]["name"];
                                
                                ?>
                              <br/>
                             click 
<a href="slideShow.php"> Show Slide</a><?php
                              }
                            else
                            {
                              echo 'File name not stored in database';
                            }
                         }
                    }

                }
          }
        }
?>
</center>
</body>
</html>