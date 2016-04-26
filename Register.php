<html>
    <body>
        <p style="text-align: right"><a href="log.php">Login</a></p>
    <center>
        
        <h1 style="color:brown">Facebook Registration</h1>     
       <form action="" method="POST" >
            <table style="background: aqua">
                <tr>
                    <td>
                        Enter First Name:
                    </td>
                    <td><input type="Text" name="fnm"></td>
                </tr>
                 <tr>
                    <td>
                        Enter Last Name:
                    </td>
                    <td><input type="Text" name="lnm"></td>
                </tr>
                 <tr>
                    <td>
                        Enter Password:
                    </td>
                    <td><input type="password" name="epass"></td>
                </tr>
             <tr>
                    <td>
                        Confirm Password:
                    </td>
                    <td><input type="password" name="cpass"></td>
                </tr>
                <tr>
                    <td>
                        Enter Email id:
                    </td>
                    <td><input type="text" name="emailid"></td>
                </tr>
             
                 <tr>
                    <td>
                        Click on Gender:
                    </td>
                    <td><input type="radio" name="gen" value="Male"> Male</td>
                  </tr>
                <tr> <td><td><input type="radio" name="gen" value="Male"> Female</td>
                </tr>                
                 <tr>
                    <td>
                        Enter Date of birth:
                    </td>
                    <td><input type="date" name="dob"></td>
                </tr>
                          <tr>               
                     <td><input type="checkbox" name="checked"></td>
   
                        <td> All Fill information are correct.</td>
                </tr>
                <tr>                 
                     <td><input type="submit" name="submit" value="submit"></td>
                     <td><input type="reset" name="reset"></td>
                </tr>            
            </table>        
        </form> 
          </center>
        
       <?php
        
        if(isset($_POST['submit']))
        {
            $fnm=$_POST['fnm'];
            $lnm=$_POST['lnm'];
            $epass=$_POST['epass'];
            $cpass=$_POST['cpass'];
            $gen=$_POST['gen'];
            $dob=$_POST['dob'];
            $emailid=$_POST['emailid'];
          // echo 'ENTERED'.$fnm.$lnm.$epass.$cpass.$gen.$dob.$emailid;
            if(strlen($epass)>=8)
            {
            
            if($epass==$cpass)
            {
                $con=  mysqli_connect("localhost", "root", "", "fb");
                
                if(mysqli_connect_errno())
                {
                    echo'Error'.mysqli_connect_error();
                }
                else
                    {
                     $result=  mysqli_query($con,"select * from account where Email_id='$emailid'");   
                                     
                     $rows=  mysqli_num_rows($result);
                     echo 'Rows'.$rows;
                     
                     if($rows>0)
                     {
                         echo'Email id already is used';
                     }
                     else
                     {
                         if(mysqli_query($con, "insert into account(Id,Fname,Lname,Password,Email_id,Gender,Dob)values('NULL','$fnm','$lnm','$epass','$emailid','$gen','$dob')"))
                         {
                             echo 'Data inserted successful';
    
                              
                                ?>
                      
    
                             
                            <script type="text/javascript">
                            window.location.href = 'log.php';
                            </script>
                            <?php

                             
                         }
                         else {
                               echo 'error'.mysqli_connect_error();
                        }
                         
                     }
                     
                     
                    }
                
                
            }  else {
                
                echo 'Password does not match';
            }
            
            }
            else 
                {
                echo " Password must greater than 8 character";
                }
            
            
        }else
        {
            echo '<center>*Fill Information</center>';
        }
       
       ?>
       
       
       
        </body>      
</html>