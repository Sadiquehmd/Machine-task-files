<?php
$server="127.0.0.1";
$username="root";
$password="";
$database="student_data";
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    echo 'Error in connecting database';
}
