<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Facebook profile page</title>
<style>
    
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
    /*width:210px;
    height:300px;*/
    padding:20px;
    border:5px solid #000000;
    float:left;
    margin:10px;
    box-sizing:border-box;
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
a{
  background-color: #E21818;
        color: white;
        padding: 14px 10px;
        margin: 1px 0;
        border: none;
        cursor: pointer;
        text-decoration:none;
        width: 6%;
        opacity: 0.9;
        float:left;
        margin-top:-65px;
        margin-left:-86%;
}
#like-button {
        background-color: blue;
        color: white;
    }

    #comment-button {
        background-color: green;
        color: white;
    }
    button{
      margin-bottom:-40px;
      
    }


</style>
</head>
<body>
  <div class="container">
    
    <center>
  <h2>Hi <?php echo $_SESSION['name'];?>, your posts are here</h2>
</center>
  <form method="POST" action="" enctype="multipart/form-data">
    <div class="file">
    <center>
  <a href="FBMainprofile.php">Home</a>
  </center>
  	  	<br>
  	  <input type="file" name="image">  
      <br>
      <br>	
  	  <button type="submit" class="btn" name="upload">Upload Image</button>
</div>
  </form>
  
  <?php
  // database connection
  $conn = mysqli_connect("localhost", "root", " ", "form");
  
  if (isset($_POST['upload'])) {
	  
  	
  	$Get_image_name = $_FILES['image']['name'];
  	
  	
  	$image_Path = "images/".basename($Get_image_name);
    $nam = $_SESSION['name'];

  	$sql = "INSERT INTO fbposts (name, post,likes) VALUES ('$nam','$Get_image_name','0')";
  	
	
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)) {
  		/*echo "Your Image uploaded successfully";*/
  	}else{
  		echo  "Not Insert Image";
  	}
  }
  
  
  
  #$img = mysqli_query($conn, "SELECT * FROM fbposts");
  $na = $_SESSION['name'];
  $img = "SELECT * FROM fbposts";
  //$result = $conn->query($img);
  $result=mysqli_query($conn,$img);
  //if ($result->num_rows > 0) {   
  $butid = 2000;     
  $ids=1; 
  $commid=3000; 
  $idsc=500; 
  while ($row = mysqli_fetch_assoc($result))  {
    if ($row['name']==$na){
    echo "<div class='white-box'>";
    #$na = $_SESSION['name'];
    //$sn = $_SESSION['surname'];
    echo "<small>Posted by: <strong>" . $row["name"] . "</strong></small><hr>";
    echo "<img src='images/".$row['post']."'style='width:200px;height:200px;'>"; ?>
    <form action="like.php" method="post">
    <button name="<?php echo $butid;?>" type="submit"  id="like-button">Like</button></form>

    <h4><?php echo $row['likes']."  likes"; ?></h4>
    <?php    
                    $sql="SELECT  * from comtab where imgno='$ids'";
                    $resii=mysqli_query($conn,$sql);
                    while($comrow=mysqli_fetch_assoc($resii)){

                    

                    ?>
                    <nav class="nene">
                        <h4 style="display: inline-block; margin-bottom:-60px;" id="<?php echo $idssch;?>"><?php echo "Commented by:  ".$comrow['com']?> </h4>
                        <p style="padding-left:0px" id="<?php echo $idscp;?>"><?php echo $comrow['comm'];?></p>
                    </nav>

<?php }?>
    <?php
    
  }
  echo "</div>"; 
  $butid += 1;
  $idsc+=1;
                
  //$cnt+=1;
  
  
$butid += 1;
$commid += 1;
$ids+=1;
 } 

             
?>
</div>
</body>
</html>




