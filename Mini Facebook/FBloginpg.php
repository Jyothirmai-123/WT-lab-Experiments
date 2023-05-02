<?php

        session_start();
        ?>
  <html>
    <head>
        <title>Facebook login or signup</title>
        <link rel ="shortcut icon" type="image/x-icon" href="C:\Users\jyoth\Downloads\fb icon.png">
        <style>
        input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  
}
input[type=submit]{
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
</style>
    </head>
    <body>
    
    <div style="position: relative; right:-15%;">
                
                <?php
// Connect to the MySQL database
$host = 'localhost';
$username = 'root';
$password = " ";
$dbname = 'form';

$conn = mysqli_connect($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the top 5 liked posts from the database
$sql = "SELECT name, post, likes FROM fbposts GROUP BY post ORDER BY likes DESC LIMIT 5";
$result = $conn->query($sql);

// Display the results
if ($result->num_rows > 0) {
  echo "<br><br><ol>";
  while($row = $result->fetch_assoc()) {
    echo "<li>Posted by ".$row["name"]. "- Post ID: " . $row["post"]." - Likes: " . $row["likes"]. "</li>";
    $imgURL ='uploads/'.$row['post'];
     echo '<img height="100px" width="100px" src="'.$imgURL.'">';
    //echo '<img src="'.$row['post'].'"alt="'.$row['post'].'">';
    
  }
  echo "</ol>";
} else {
  echo "No results found.";
}

// Close the database connection
$conn->close();
?>

    </div>
    
    <div style = "float:right; position: relative;margin-top: -35%;left:-15%;">
        
    <img src="uploads/facebook copy.png" style="position: relative;margin-top: -15%;">
                <p style="font-size:20px;" >Facebook helps you connect and share with the <br>people in your life.</style></p>
                <br><br>
        <form method ='POST'>
            <center>
               
        <h1>Welcome to login page</h1>
        
            <div class="log">
            <table cellspacing="10">
                <div><tr><td>User name:</td><td><input type='text' name = 'name'></td></div> <br>
                 <div><tr><td>Password:</td><td><input type='password' name= 'pwd'></td></div> <br> 
            </table>
                 <div><input type='submit' name='submit' value="LOGIN"></div>
                 <p>Don't have an account, u can <a href="FBSignUp.html" style="color:dodgerblue">Sign Up</a> here<p>
            
            </div> 
        
        </center>
        </form>
        
        <?php
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'form';
        
            $conn = mysqli_connect($host, $username, $password, $dbname);
        
            
            
            if(isset($_POST['submit']))
            {  
                 //session_start();
                $uname = $_POST['name'];
                $pwd = $_POST['pwd'];
                
                $sql= "select * from fbtable where name = '$uname' and password = '$pwd'";
                $upload = mysqli_query($conn,$sql);
                
                if(mysqli_num_rows($upload)>0)
                {
                    $row = mysqli_fetch_assoc($upload);
                    if($upload){
                        $users = "INSERT INTO fbusers(name,password)
                                VALUES ('$uname','$pwd')";
                        $_SESSION['name']=$uname;
                        $_SESSION['surname']=$row['surname'];
                        $_SESSION['email']=$row['email'];
                        $_SESSION['date']=$row['date'];
                        $_SESSION['gender']=$row['gender'];
                        $_SESSION['pwd']=$row['password'];
                        echo "{$uname}";
                        echo "congrats, login successful";
                        if ($conn->query($users) === TRUE) {
                        header("Location:FBMainprofile.php");   
                        } 
                    }
                }   
                else{
                       ?>
                        <script>alert("sorry ,user credentials didn't match")</script> <?php
                        /*header("Location:FBSignUp.html");*/
                        
                    }
            }
            ?>
            </div>
        
        </body>
        
</html>

