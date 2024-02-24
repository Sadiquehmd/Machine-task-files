<?php
function passwordGenerator(){//fuction to generate a 8 digit numeric password
    $digit="0123456789";
    $password="";
    for($i=0;$i<8;$i++){
        $password.=$digit[rand(0,strlen($digit)-1)];
    
    }
    return $password;
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "dbconfig.php";
    $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $unsafeEmail=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $email=filter_var($unsafeEmail, FILTER_VALIDATE_EMAIL);
    $rollno=filter_var($_POST['rollno'], FILTER_SANITIZE_STRING);
$pass=passwordGenerator();
$sqlSelect="SELECT * FROM students WHERE email='$email' OR roll_number='$rollno'";//Checking if user has already registered
$existResult=mysqli_query($conn,$sqlSelect);
$num=mysqli_num_rows($existResult);
$data=mysqli_fetch_assoc($existResult);
if($num>0){
    echo 'Account Already Exist! <a href="login.php">LogIn</a>';
}
else {
$sql= "INSERT INTO `students`(`name`, `email`, `roll_number`, `password`) VALUES ('$name','$email','$rollno','$pass')";
$result=mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn)){
    echo "Your Roll number is : " .$rollno." "."Your Password is : ".$pass .'  '.'<a href="login.php">LogIn</a>  !!! Redirecting to login panel in 8 seconds';
    header("refresh:8;url=login.php");
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="assets/style.css" />
  </head>

  <body>
    <div class="container">
      <form action="register.php" method="post">
        <div class="form-wrapper">
          <div class="form-heading">register student</div>
          <div>
            <input type="text" name="name" id="name" placeholder="Full Name" required/>
          </div>
          <div>
            <input type="email" name="email" id="email" placeholder="Email Address" required/>
          </div>
          <div>
            <input type="text" name="rollno" id="rollno" placeholder="Roll No." required/>
          </div>

          <div>
            <input type="Submit" id="submit" name="submit" value="Sign Up" />
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
