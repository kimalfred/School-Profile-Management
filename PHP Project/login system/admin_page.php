<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Hi, <span>Admin</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>This is an Admin page</p>
      <a href="welcomepage.html" class="btn">Website</a>
      <a href="schoolweb.html" class="btn">School Website</a>
      <a href="data_stud.php" class="btn">Student List</a>
      <a href="logout.php" class="btn">Logout</a>
   </div>

</div>

</body>
</html>
