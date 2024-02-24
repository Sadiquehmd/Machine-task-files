<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    session_start();
    $id=$_SESSION['id'];
    include "dbconfig.php";
       $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
       $desc=filter_var($_POST['desc'], FILTER_SANITIZE_STRING);
       $fileName=$_FILES['img']['name'];
       $tempName=$_FILES['img']['tmp_name'];
       $folder="images/".$fileName;
       $imageType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
       if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg"){
    echo "Please Choose only JPG, JPEG, PNG files.";
    header("refresh:5;url=index.php");  
}else{
        $sql="INSERT INTO `blogs`(`title`, `description`, `image`, `userid`) VALUES ('$title','$desc','$fileName','$id')";
        $result=mysqli_query($conn,$sql);

        if(mysqli_affected_rows($conn)){
            if(move_uploaded_file($tempName,$folder)){
            header("location:index.php");
        }
    }

}
}

?>