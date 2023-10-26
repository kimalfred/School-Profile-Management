<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $course = mysqli_real_escape_string($conn, $_POST['course']);
   $year = mysqli_real_escape_string($conn, $_POST['year']);
   $pnum = mysqli_real_escape_string($conn, $_POST['pnum']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM student WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
   integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <style>
      .form-container {
         background-image: url('tcu.jpg'); 
         background-size: cover; 
         background-repeat: no-repeat; 
         background-position: center; 
      }
   </style>
   
</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register now</a></p>

      <div class="social-icons">
      <p>For More Update Follow Us On:</p>
      <a href=""><i class="fa-brands fa-facebook" style="color:rgb(56, 67, 221)"></i></a>
      <a href=""><i class="fa-brands fa-instagram" style="color:rgb(212, 67, 9)"></i></a>
      <a href=""><i class="fa-brands fa-x-twitter" style="color:rgb(0, 0, 0)"></i></a>
      <a href=""><i class="fa-solid fa-envelope" style="color:rgb(255, 105, 180)"></i></a>
      </div>
   </form>

</div>

</body>
</html>