<?php
session_start();
if(isset($_SESSION['u']))
{
    
}
else{
    echo"<script>window.location.href='login.php'</script>";
}
session_abort();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Beth+Ellen|Roboto&display=swap" rel="stylesheet">
    <title>Document</title>
    <script src='../jquery/jquery-3.4.1.min.js'></script>
    <style>
        *{
         
            margin:0px;
        }
        body{
            background: url('rose.svg');
            background-repeat:no-repeat;
            background-position:center;
            background-size:cover;
        }
    .main-body{
        color:darkblue;
        background:url('p1.jpg');
        width:94%;
        background-repeat: no-repeat;
        background-size:cover;
        background-attachment: fixed;
        background-position: center;
        font-family:'Roboto', sans-serif;

        border-bottom:2px solid red;
        padding:3%;
    }
    .second-block{
        width:100%;
        
    }
    .online-box{
        margin-left:3%;
        margin-right:3%;
        padding:20px;
        margin-top:50px;
        height:400px;
        width:20%;
        background:transparent;
        background:rgba(0,0,0,0.2);
        color:honeydew;
        font-size: 20px;
        border:2px solid white;
        float:left;
    }
    .online-box p{
        margin-left:5%;
    }
    .block{
        width:70%;
        float:left;
      
    }
    #sendto{
        margin-left:25%;
        margin-top:20px;
        margin-right:25%;
        font-weight:200;
        text-align:center;
        font-family:sans-serif;
        color:white;
        background:url('kk.jpg');
        background-repeat:no-repeat;
        border-radius:20px; 
    }
    .part1{
        padding-top:20px;
        width:50%;
        margin:auto;      
        border-radius:10px;
        height:400px;
        max-height:450px;
        overflow-X:hidden;
        overflow-Y:scroll;
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

   
    #online p:hover{
        color:rgba(255,0,0,0.5);
        font-size:20px;

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
             width:70%;
            margin-left:5%;
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
         #kar{
          background  :rgba(255,0,0, 0.8);
        text-decoration: none;
        color:white;
        font-size:13px;
        margin-left:10px;margin-top:-10px;
        padding:6px;
        text-align: center;
        border:2px solid white;
         }
     }
    </style>
</head>
<body >
    <div class="main-body">
    <div class="title-bar">
        <div class="title-container" ><div class="font"><h1 class='title'>Random personal chat</h1></div></div>
    </div>
    </div>
    <a href='group.php'  style='right:75px;' id='btn'>Group chat</a>
    <a href='logout.php' id='btn' style='right:5px;'>Logout</a>
    <div class="second-block" >
    <div class="row1">
    <div class="online-box">
    <div style='text-align:center;'><span><img style='padding-right:10px;' src='contract.png' height=40px width=40px></span><span style='position:relative;top:-12px;'>Your Contacts</span></div>
    <p style='border-top:2px solid white;padding-top:10px;margin-top:10px;'></p>
    <p id='online'>
    </p>
  
    </div>
    <div class='k'><input type='button' value='see online chart' style='display:none;' id='kar' onclick='$(`.online-box`).show();$(`#kar`).hide(200);'></div>
    <div class="block" style='display:none;' >
   <h1  id='sendto'></h1>
   <div class="part1" id='p' >
   </div>
   <div class="part2" >
   <input type='text' placeholder='Enter your Message Here' id='msg' class='message-box'>
   <input type='button' value='Send' id='send'  class='send'>
   </div>
   </div> 
   </div>
   </div>
   

   <script>
   $(document).ready(function(){

  setInterval(function(){
      var $sendto=$('#sendto').text();
       $.ajax({
       url:'select.php',
       method:'get',
       data:{'sendto1':$sendto},
       success:function(data){
              $('#p').html(data)
       }})
   },1000);
   
$('#send').on('click',function(){
    var message=$('#msg').val();
    if(message){
    var $sendto=$('#sendto').text();
    $.ajax({
        url:'select.php',
        method:'post',
        data:{'sendto':$sendto,'message':message},
        success:function(data){

             }
            });
    }
});


setInterval(function(){
       $.ajax({
       url:'select.php',
       method:'get',
       data:{'contact':'contact'},
       success:function(data){
              $('#online').html(data)
       }})
   },1000);

var x=window.matchMedia("(max-width:425px)")
if( x.matches){
$('body').on('click','#online p',function(e){
    
       let main=$(this);
    $('.block').hide(2000);
    $('.online-box').hide(1000);
    $sendto=$(this).attr('id');
    $('.block').show(100,function(){
        $('#sendto').html(main.text()).append("<img src='checked.png' style='background:transparent;' width='30px' height='30px' >");
    });
    $('#kar').show();
    
    });
}
else{

    $('body').on('click','#online p',function(e){
       let main=$(this);
    $('.block').hide(200);
    $sendto=$(this).attr('id');
    $('.block').show(100,function(){
        $('#sendto').html(main.text()).append("<img src='checked.png' style='background:transparent;' width='30px' height='30px' >");
    });
});
}
 });
   </script>
</body>
</html>