<?php 
session_start();
$uname=$_SESSION['name'];
$idsc=500;
$butid=2000;
$commid=3000;
$conn=mysqli_connect('localhost','root','','form');
if(!$conn){
   die("Connection Unsuccesfull");
}
$sql="select * from fbposts";
$z=mysqli_query($conn,$sql);
$cnt=mysqli_num_rows($z);

for($i=1;$i<=$cnt;$i++){
    if(isset($_POST[strval($butid)])){

        $sql="select * from liketab where uname='$uname' and imgno='$i'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0){
            $sql="UPDATE fbposts SET likes=likes+1 WHERE imgno='$i'";
            $x=mysqli_query($conn,$sql);
            $sql="INSERT INTO liketab(uname, imgno) VALUES ('$uname','$i')";
            $x=mysqli_query($conn,$sql);
        }else{
            $sql="UPDATE fbposts SET likes=likes-1 WHERE imgno='$i'";
            $x=mysqli_query($conn,$sql);
            $sql="DELETE FROM liketab WHERE imgno='$i'";
            $x=mysqli_query($conn,$sql);
        }
        header("Location:FBOthersposts.php");
        break;
    }
    $butid+=1;
}
header("Location:FBOthersposts.php");?>
