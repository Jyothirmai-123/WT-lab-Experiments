
<?php
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "form";

$conn = mysqli_connect($servername, $username, $password, $dbname);
      if(isset($_POST['submit']))
            {  
                 session_start();
                 $name = $_POST["n"];  
                 $sname = $_POST["sn"];
                 $email = $_POST["em"];
                 $date = $_POST["date"];
                 $gender = $_POST["gen"];
                 $pwd = $_POST["pwd"];
                
                $sql= "select * from fbtable where email='$email'";
                $upload = mysqli_query($conn,$sql);
                
                if(mysqli_num_rows($upload)>0)
                {
                  header("Location:FBloginpg.php");   
                    /*if($upload){
                        header("Location:FBProfilepg.php");    
                    }*/
                }   
                else{
                       
                  $sql = "INSERT INTO fbtable(name,surname, email,date,gender,password)
                  VALUES ('$name','$sname','$email','$date','$gender','$pwd')";
                  
                
                  if ($conn->query($sql) === TRUE) {
                    echo "<b>New record created successfully</b><br>";
                    header("Location:FBMainprofile.php"); 
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                        
                    }
            }
 
  
 
  
/*session_start();
  $result = "select * from fbtable";
  $rows = mysqli_query($conn,$result);
  ?>
  <?php
  while($row = mysqli_fetch_assoc($rows))
  {
    echo $row["name"].",".$row["surname"]."<br>";
  }*/
  $conn->close();
  $_SESSION['name']=$name;
  $_SESSION['surname']=$sname;
  $_SESSION['email']=$email;
  $_SESSION['date']=$date;
  $_SESSION['gender']=$gender;
  $_SESSION['pwd']=$pwd;
  
?>
