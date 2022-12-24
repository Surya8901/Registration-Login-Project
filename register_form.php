<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
   $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $address= mysqli_real_escape_string($conn, $_POST['address']);
   $gender = $_POST['gender'];
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE first_name = '$first_name' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(first_name, last_name, email, password, address, gender, user_type) VALUES('$first_name', '$last_name', '$email', '$pass', '$address','$gender','$user_type' )";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="form-container">
   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="first_name" required class="force-opaque" placeholder="FirstName">
      <input type="text" name="last_name" required placeholder="LastName">
      <input type="email" name="email" required placeholder="Email">
      <input type="password" name="password" required placeholder="Password">
      <input type="password" name="cpassword" required placeholder="Confirm Password">
      <input type="text" name="address" required placeholder="Address">
      <select name="gender">
         <option value="Male" style="background-color: white;">Male</option>
         <option value="Female" style="background-color: white;">Female</option>
         </select>
         <select name="user_type">
         <option value="user" style="background-color: white;" >user</option>
         <option value="admin" style="background-color: white;">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>
</body>
</html>