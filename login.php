<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'dbconfig.php';
    $rollno=$_POST['rollno'];
    $pass=$_POST['pass'];
    $sql="SELECT *FROM students WHERE roll_number='$rollno'";//matching rollno in database
    $result=mysqli_query($conn,$sql);
    if($userdata=mysqli_fetch_assoc($result)){
    if($pass==$userdata['password']){//checking password
        session_start();
        $_SESSION['login']="true";
        $_SESSION['username']=$userdata['name'];
        $_SESSION['id']=$userdata['s_id'];
          header("Location:index.php");//if login successfull then redirecting to index Or main
    }else{
        echo "Incorrect Password!";
    }}else{
      echo 'Account does not exists! Try register one  <a href="register.php">Register Here</a>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LogIn</title>
    <link rel="stylesheet" href="assets/style.css" />
  </head>

  <body>
    <div class="container">
      <form action="login.php" method="post">
        <div class="form-wrapper">
          <div class="form-heading">Log In</div>
          <div>
            <input
              type="text"
              name="rollno"
              id="rollno"
              placeholder="Roll No." required
            />
          </div>
          <div>
            <input
              type="password"
              name="pass"
              id="pass"
              placeholder="password" required
            />
          </div>

          <div>
            <input type="Submit" id="submit" name="submit" value="Log In" />
          </div>
          <div style="margin-bottom:10px">
            <span>Don't have an account </span><a href="register.php">Register here?</a>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
