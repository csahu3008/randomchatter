
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
    *{
        margin:0px;
        
    }
    body{
        background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url('21.jpg');
        background-size:cover;
        background-position:center;
        color:white;
        background-repeat: no-repeat;
    }
    .slide{
        width:100%;
        height:500px;
    }
    .item{
        width:100%;
        height:500px;
    }
    </style>
</head>
<body>
    
<nav class="navbar" style='background-color:grey;'>
    <div class="container-fluid" style="font-size: 16px;">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" style="border: 1px solid white;" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar" style="background-color:white;"></span>
          <span class="icon-bar"  style="background-color:white;"></span>
          <span class="icon-bar"  style="background-color:white;"></span>                        
        </button>
        <a class="navbar-brand" style="color:white;font-size:30px;" href="group.php">RandomChatter</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="login.php" style="color:orange;">Home</a></li>
          <li><a href="login.php" style="color:orange;">Login</a></li>
         </div>
            </div></div></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
  <div class="row" style='height:300px;'></div>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6 ">
    <form method='POST'  class='form-group border border-primary' onsubmit="return check()">
    <table class="table table-hover " style='color:red;font-size: 18px;'>
    <h2 class='text  text-center' style="color:white;">Signup</h2>
   
       <tr><td>Username</td><td><input type="text" name="username" id="username" class="form-control"></td></tr>
       <tr><td>Name</td><td><input type="text" name="name" id="name" class="form-control"></td></tr>
       <tr><td>Email</td><td><input type="email" name="email" id="email" class="form-control"></td></tr>
       <tr><td>Password</td><td><input type="password" name="password1" id="password1" class="form-control"></td></tr>
       <tr><td>Confirm Password</td><td><input type="password" name="password2" id="password2" class="form-control"></td></tr>
    </table>
   <div class="row"><div class="col-md-4"></div><div class="col-md-4"><input type='submit' class="form-control btn btn-primary col-md-3" value='Signup'></div></div>
   </form>
</div>

</div>
</div>
<script>
    var check=function()
    {
       var  password1=document.getElementById('password1').value;
      var   password2=document.getElementById('password2').value;
        if(password1!=password2)
        {      alert('passwords donot match');
            document.getElementById('password1').value='';
            document.getElementById('password2').value='';
            document.getElementById('email').value='';
            document.getElementById('name').value='';
            document.getElementById('username').value='';
              return false;
              
        }
        else
        {
            document.getElementById('password1').value='';
            document.getElementById('password2').value='';
            document.getElementById('email').value='';
            document.getElementById('name').value='';
            document.getElementById('username').value='';
            return true;
        }
    }
</script>
<?php

if(isset($_REQUEST['username']))
{
 $username=$_REQUEST['username'];
 $password=$_REQUEST['password1'];
 $email=$_REQUEST['email'];
 $name=$_REQUEST['name'];
 echo"$username,$password,$email,$name";
session_start();
 $con=mysqli_connect('localhost','root','','chat');
 $q="insert into login values ('','$username','$password','$email','$name')";
 $res=mysqli_query($con,$q);
   if($res)
   {
     echo"<h1>Logged In successfully</h1>";
       $_SESSION['u']=$username; 
       $q="insert into online values ('','$_SESSION[u]')";
       $res=mysqli_query($con,$q);
       echo"<script>window.location.href='group.php'</script>";
   }
   else
   {
     echo"<h1>Signup Failed</h1>";
   }
  
 
}
?>