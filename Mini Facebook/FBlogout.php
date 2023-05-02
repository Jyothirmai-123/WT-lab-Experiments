<?php
 session_start();
 session_destroy();
 echo '<script>alert("logged out successfully")</script>';
 header("Location:FBloginpg.php");
 ?>