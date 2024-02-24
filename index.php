<?php
session_start();
$username = $sid = "";
if (!isset($_SESSION['login']) || $_SESSION['login'] != "true") {
  header('location:login.php');
  exit();
} else {
  $username = $_SESSION['username'];
  $id = $_SESSION['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog</title>
  <link rel="stylesheet" href="assets/style.css" />
</head>

<body>
  <nav>
    <div class="user-details"><b>&#9733</b> Student Name : <span>
        <?php echo $username ?>
      </span></div>
    <a href="logout.php">Logout</a>
  </nav>
  <div class="container index">
    <form action="handleBlog.php" method="post" enctype="multipart/form-data">

      <fieldset class="form-wrapper index">

        <div class="post-blog">Post Your Blog</div>
        <div>
          <input type="text" name="title" id="title" placeholder="Title. . ." required />
        </div>
        <div>
          <textarea name="desc" id="desc" placeholder="Discription. . ." required></textarea>
        </div>
        <div>
          <input class="img" type="file" name="img" id="file" required>
        </div>
        <div>
          <input style="margin-bottom: 30px;" type="Submit" name="submit" id="submit" value="Submit" />
        </div>
      </fieldset>
    </form>

    <div class="blogs">
      <?php
      include "dbconfig.php";
      $blogSql = "SELECT * FROM `blogs` WHERE userid='$id'";
      $res = mysqli_query($conn, $blogSql);
      $num = mysqli_num_rows($res);
      if ($num > 0) {
        echo "<h1 class='blog-head'>Blogs posted by you !</h1>";
        while ($blog = mysqli_fetch_assoc($res)) {
          echo
            '
 <div class="card">
<div class="card-img">
<img src="images/' . $blog['image'] . '"></div>
<div class="card-title">
  ' . $blog['title'] . '
</div> 
 <div class="card-dis-title">
 <div> Discription</div>
 <div>&#8942;</div>
</div>
<div class="card-discription">
 ' . $blog['description'] . '
</div>
</div>';
        }
      } else {
        echo "<h1> Haven't Posted anything try posting one!</h1>";
      }
      ?>
    </div>

</body>

</html>