<?php 
include("FBProfilepg.php");

?>

<head>
<style>
.box {
  background-color: lightgrey;
  width: 300px;
  border: 15px solid green;
  padding: 40px;
  margin-top: 100px;
  margin-left: 600px;
}
</style>
</head>

<div class="box">
<table>
    
    <tr>
        <td>Name:</td>
        <td><?php echo $_SESSION['name'];?></td>
    </tr>
    <tr>
        <td>Surname:</td>
        <td><?php echo $_SESSION['surname'];?></td>
    </tr>
    <tr>
        <td>email:</td>
        <td><?php echo $_SESSION['email'];?></td>
    </tr>
    <tr>
        <td>Date:</td>
        <td><?php echo $_SESSION['date'];?></td>
    </tr>
    <tr>
        <td>Gender:</td>
        <td><?php echo $_SESSION['gender'];?></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><?php echo $_SESSION['pwd'];?></td>
    </tr>
    
</table>
</div>

