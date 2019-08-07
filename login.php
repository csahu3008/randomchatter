<?php
session_start();
if(isset($_SESSION['u']))
{
  echo"<script>window.location.href='group.php'</script>";
}
else{
  
}
?>
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
    @media screen and (max-width:425px)
    {
      body{
        background-position:center;
        background-size:cover;
      }
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
          <li><a href="signup.php" style="color:orange;">Signup</a></li>
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
    <form method='POST'  class='form-group border border-primary'>
    <table class="table table-hover " style='color:red;font-size: 18px;'>
    <h2 class='text  text-center' style="color:white;">Login</h2>
   
       <tr><td>Username</td><td><input type="text" name="username" id="username" class="form-control"></td></tr>
       <tr><td>Password</td><td><input type="password" name="password" id="password" class="form-control"></td></tr>
    </table>
   <div class="row"><div class="col-md-4"></div><div class="col-md-4"><input type='submit' class="form-control btn btn-primary col-md-3" value='Login'></div></div>
   </form>
</div>

</div>
</div>
<?php
if(isset($_SESSION['u'])){
  echo"<h1>you are already logged in</h1>";
  echo"<script>window.location.href='login.php'</script>"  ;
}
else{
if(isset($_REQUEST['username']))
{
 $username=$_REQUEST['username'];
 $password=$_REQUEST['password'];
 $con=mysqli_connect('localhost','root','','chat');
 $q="select *  from login where username='$username'";
 $res=mysqli_query($con,$q);
 session_start();
 while($row=mysqli_fetch_array($res))
 {
   if($row['password']==$password)
   {
     echo"<h1>Authenticated successfully</h1>";
       $_SESSION['u']=$username; 
       $q="insert into online values ('','$_SESSION[u]')";
       $res=mysqli_query($con,$q);
       echo"<script>window.location.href='group.php'</script>";
   }
   else
   {
     echo"<h1>Invalid login id or password</h1>";
   }
 }   
}}


?>