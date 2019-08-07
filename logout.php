<?php
include('login.php');
session_start();
if(isset($_SESSION['u']))
{    
    $con=mysqli_connect('localhost','root','','chat');
    $q="delete from online where username='$_SESSION[u]' ";
    $res=mysqli_query($con,$q);
   
    unset($_SESSION['u']);
    echo"<h4>Yoy are logged out successfully</h4>";
       
}

?>