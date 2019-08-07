<?php
session_start();
if(isset($_SESSION['u']))
{
    
}
else{
    echo"<script>window.location.href='login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src='../jquery/jquery-3.4.1.min.js'></script>
    <style>
        *{
          
            margin:0px;
        }
        body{
            background: url('rose.svg');
            background-repeat:no-repeat;
            background-size:cover;
             background-position:center;
           overflow:auto;
            
        }
    .main-body{
        color:darkblue;
        background:url('p1.jpg');
        background-position:center;
        background-size: cover;
        width:94%;
        font-family:sans-serif;
        border-bottom:2px solid red;
        padding:3%;
        
    }
    .second-block{
        width:100%;
        
    }
    .online-box{
        margin-left:4%;
        margin-right:5%;
        margin-top:50px;
        border:2px solid white;
        border-top:0px;
        width:20%;
        background:url('2.jpg');
        color:ghostwhite;
        font-size: 20px;
        float:left;
    }
    .online-box p{
        margin-left:5%;
        font-size: 14px;
    }
    .online-box p:hover{
        
    }
    .block{
        width:70%;
        float:left;
      
    }
    .part1{
        padding-top:20px;
        width:50%;
        margin:auto;
        margin-top:50px;
        border-radius:10px;
       
        max-height:450px;
        overflow-X:hidden;
        overflow-Y:scroll;
     
        scroll-behavior: smooth;
        scroll-margin: 0px;
        scroll-padding: -12px;
        background:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.5)),url('kl.jpg');
        background-position: center;
        background-size:cover;
    }
    .part2{
        width:50%;
        margin:auto;
        }
    .message-box{
        width:70%;
        float:left;
        min-height:30px;
        border:2px solid blue;
        outline:0px;
        font-size:16px;
        box-shadow: 10px 2px 10px black;
        padding-left:20px;
        padding-right:20px;
        border-radius:15px;
         }
    .send{
        width:20%;
        padding:8px;
        height:40px;
        border:0px;
        outline:0px;
        border-radius:360px;
    }
    .right{
        width:50%;
        margin-left:45%;
        word-wrap: break-word;
        padding:5px;
        background:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4));
        border:1px solid  red;
        color:white;    
            }
    .left{
        width:50%;
        margin-left:3%;
        background:linear-gradient(rgba(255,0,0,0.2),rgba(255,0,0,0.2));
        word-wrap: break-word;
        padding:5px;
        border:1px solid blue;
        color:white;    
     }
     #btn{
        position:absolute;
        top:40px;
        background:rgba(255,0,0, 0.8);
        text-decoration: none;
        color:white;
        padding:6px;
        text-align: center;
        border:2px solid white;
     }
     @media screen and (max-width:425px)
     {
         body,.second-block{
             width:100%;
         }
         .block,.row1{
             width:100%;
             margin:auto;
             margin-top:20px;
             
         }
         .online-box{
             width:80%;
            margin-left:10%;
         }
         .part2,.part1,#sendto{
            width:100%;
            margin-left:10%;
            border-radius:0px;
             margin:auto;
         }
         #msg{
             float:left;
             width:45%;
         }
         #send{
            float:right;
             width: 30%;
             
         }
         .title{
             font-size:28px;
         }
         #btn{
             top:70px;
         }

     }
    
    </style>

</head>
<body>
    <div class="main-body">
    <div class="title-bar">
        <div class="title-container" ><div class="font"><h1 class='title'>Random Group chat</h1></div></div>
       
    </div>
    </div>
    <a href='personal.php'  style='right:100px;' id='btn'>Personal chat</a>
    <a href='logout.php' id='btn' style='right:10px;'>Logout</a>
    <div class="second-block">
    <div class="row1">
    <div class="online-box">
    <h3 style='text-align:center;margin-bottom:12px;border:1px solid white;'>Online</h3>
    <p id='online' >
    </p>
    </div>    
   <div class="block" >
   <div class="part1" id='p'>
        <?php
        
        $con=mysqli_connect('localhost','root','','chat');
        $q="select * from dashboard";
        $res=mysqli_query($con,$q);
        while($row=mysqli_fetch_array($res))
        {   
            if($row['sentby']==$_SESSION['u'])
            {echo"<p id='$row[chat_id]' class='right' ><span style='color:pink;font-size: 14px;'>$row[sentby]</span><br> $row[message]</p><br>";}
            else{
                echo"<p  id='$row[chat_id]' class='left'><span style='color:yellow;font-size: 14px;'>$row[sentby]</span><br> $row[message]</p><br>";
            };
            
        }
        ?>
    </div>
   <div class="part2" >
   <input type='text' placeholder='Enter your Message Here' id='msg' class='message-box'>
   <input type='button' value='Send' id='send' class='send'>
   </div>
   </div> 
   </div>
   </div>

   <script>
   $(document).ready(function(){
  setInterval(function(){
       var last=parseInt($('#p').children('p').last().attr('id'));
       if(isNaN(last)){
       }
       else{
       $.ajax({
       url:'select.php',
       method:'get',
       data:{'no':'no','last':last},
       success:function(data){
              $('#p').append(data)
       }})}
   },1000);
   
$('#send').on('click',function(){
    var message=$('#msg').val();
    if(message){
        $.ajax({
        url:'select.php',
        method:'post',
        data:{'message':message},
        success:function(data){
        }
            });    
    }
    
});

setInterval(function(){
       $.ajax({
       url:'select.php',
       method:'get',
       data:{'yes':'yes'},
       success:function(data){
              $('#online').html(data)
       }})
   },1000);

   

   });
   </script>
</body>
</html>