<?php
session_start();
?>
<html>
    <head>
    <form method="post" action = "FBsignupphp.php">
    <style>
        .topdiv{
            
            background-image:url("uploads/Fb bg.jpeg");
            background-size: cover;
            text-align:center;
        }
        #vertical-line{
            width:1px;
            height:500px;
            background-color:black;
        }
        .logout{
  background-color: #E21818;
  color: white;
  padding: 10px 20px;
  margin: 8px 0;
  border: none;
  width: 100%;
  position:relative;
  right:-47%;
  
}
        a{
  background-color: #04AA6D;
  color: black;
  padding: 10px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

    
    .btn{
  
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 10%;
        opacity: 0.9;
}
.white-box {
    
    background-color: white;
    width:210px;
    height:250px;
    padding:20px;
    border:5px solid #000000;
    float:left;
    margin:10px;
}

.container{
    border:3px solid #000000;
    background-color:lightblue;
    /*background-image:url("uploads/login bg.jpeg");*/
}
.file{
    
  color: black;
  padding: 5px 20px;
  margin: 5px 0;
  border: none;
  width: 100%;
  position:relative;
  right:-85%; 
  
}



    </style>
    
    </head>
    
    
    <div class="topdiv">
    <center>
    <p style="font-size:60px;color:blue;margin-bottom: -15px;"><strong>FACEBOOK </strong></style></p>
    <h2>Hi <?php echo $_SESSION['name'];?>, WELCOME to your Profile</h2>
    
    <a class="logout" href='FBlogout.php'> logout </a>
        
  
    <br>
    <hr>
    </center>
    </div>
    <center>
    <div id="vertical-line" style="width:200px;float:left;">
    <br><br><br><br><a href="FBMainprofile.php">Home</a><br><br><br><br>
    <a href="FBOthersposts.php">Suggested Feed</a><br><br><br><br>
    <a href="posts.php">My Posts</a><br><br><br><br>
    <!--<a href="#">Friends</a><br><br><br><br>-->
    <a href="FBaccount.php">My account</a><br><br>

</center>
    </div>
    <div style = "float:right; position: relative;margin-top: -9%;left:-15%;">
    
    </div>