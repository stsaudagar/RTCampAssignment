<?php
   session_start();
   $emailid=$_SESSION['emailid'];    
    echo 'Welcome '.$emailid;  

?>

<html lang="en">
<head>
<title> Slide Show</title>
 
<style>
body {font-family:Arial, Helvetica, sans-serif; font-size:12px;}
 
.fadein { 
position:absolute; height:1080px; width:1920px; margin:0 auto;
background: url("slideshow-bg.png") repeat-x scroll left top transparent;
padding: 10px;
 }
.fadein img { position:absolute; left:10px; top:10px; }
</style>
 
<script src="Jquery/jquery-1.8.0.min.js"></script>
<script>
$(function(){
	$('.fadein img:gt(0)').hide();
	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});
</script>
</head>
<body>

    
    
    <?php 
        $con=mysqli_connect("localhost","root","","fb");         
 
       
              $query=  mysqli_query($con,"select * from user where Email_id='$emailid'");
              ?>
         
    <?php
              
    
    
                while ($row = mysqli_fetch_array($query)) 
                {
                    ?>
                   
                      <div class="fadein">  
                          
                                    
                    <img src="<?php echo $row["imagePath"]?> ">  
       
                </div>
                 <?php
                 
                }            
                
                ?>  
   
    
</body>
</html>
