<?php
   session_start();
   ?>
<html>
    <body >
         <center> 
             <p style="text-align: right"><a href="Register.php">Register</a></p>
            
        <h1 style="color:brown">Facebook Login</h1>  
        <form action="" method="POST" >
                     
            <table style="background: aqua" >
                 <tr style="color: blue">
                    <td>
                        Enter Email id/Mobile No:
                    </td>
                    <td><input type="text" name="emailid"></td>
                </tr>
             
                <tr style="color: blue">
                    <td>
                        Enter Password:
                    </td>
                    <td><input type="password" name="epass"></td>
                </tr>
             <tr>
                 <td><input type="submit" name="submit" value="submit" onclick="read_folder_directory(img)"></td>
                     <td><input type="reset" name="reset"></td>
                                                     </tr>                             
           </table>
            </center>
             
    
<?php 
if(isset($_POST['submit']))
{
                $emailid=$_POST['emailid'];
                $epass=$_POST['epass'];
                 $con=  mysqli_connect("localhost", "root", "", "fb");
     
                if(mysqli_connect_errno())
                {
                    echo 'Error'.  mysqli_connect_error();
                }
                $query=  mysqli_query($con,"select * from account where Email_id='$emailid'&&Password='$epass'");
                $count=  mysqli_num_rows($query);
            //   echo 'Count'.$count;

                        while ($row = mysqli_fetch_assoc($query))
                        {
                            $dbusername=$row['Fname'];?>              
                         <a href="">Dowland</a><?php        
                }   
               if($count==0)
               {
                   echo '<center> <p style="color: red">Login is failed.Try after <p><a href="Reg.php">Register</a></center>';
               }
             else {
                  // echo 'Your login successful.Click here <a href="imageFolder.php">Next</a>'
                 ?>
            <script type="text/javascript">
            window.location.href = 'pictures.php';
            </script>
              <?php 
                  $thisdir = getcwd(); 

                  mkdir($thisdir . "/img/" . $dbusername, 0777);//Create Directory after login if it is not existing.
                    //header("refresh:5;memeber.php");
                    //exit;
                    //echo 'Login is successful <a href="member.php">Next</a>';
                    $_SESSION['emailid']=$emailid;
                    $_SESSION['pass']=$epass;       
              }
     
   
}  
 else 
{
     echo '<center>* Fill the information</center>';
}
?>

 </body>              
       
    </html>