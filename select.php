<?php
if(isset($_REQUEST['message']))
{ 
    session_start();
    $message=$_REQUEST['message'];
   $username=$_SESSION['u'];
$con=mysqli_connect('localhost','root','','chat');
$q="insert into dashboard values ('','$message','$username')";
$res=mysqli_query($con,$q);
// if($res)
// {
//     echo"<script>alert('Updated')</script>";
// }
// else{
//     echo"<script>alert('Failed')</script>";
// }
session_abort();
}

?>

<?php
if(isset($_REQUEST['no'])){
session_start();
$last=$_REQUEST['last'];
$con=mysqli_connect('localhost','root','','chat');
$q="select * from dashboard where chat_id > '$last'";
$res=mysqli_query($con,$q);
while($row=mysqli_fetch_array($res))
{   
   
    if($row['sentby']==$_SESSION['u'])
    {echo"<p  id='$row[chat_id]' class='right'><span style='color:pink;font-size: 14px;'>$row[sentby]</span><br> $row[message]</p><br>";}
       else{
        echo"<p  id='$row[chat_id]' class='left'><span style='color:pink;font-size: 14px;'>$row[sentby]</span><br> $row[message]</p><br>";
       };
}
session_abort();
}
?>


<?php
if(isset($_REQUEST['yes']))
{session_start();
$con=mysqli_connect('localhost','root','','chat');
$q="select * from online";
$res=mysqli_query($con,$q);
while($row=mysqli_fetch_array($res))
{    if($row['username']==$_SESSION['u'])
    {

    }
    else{
        echo"<p id='one'>";
        echo"<p>$row[username]</p><br>";
        echo"</p>";
       };
}
session_abort();
}
?>


<?php
if(isset($_REQUEST['message1']))
{ 
    session_start();
    $message=$_REQUEST['message1'];
   $username=$_SESSION['u'];
$con=mysqli_connect('localhost','root','','chat');
$q="insert into dashboard values ('','$message','$username')";
$res=mysqli_query($con,$q);
if($res)
{
    echo"Updated";
}
else{
    echo"Failed";
}
session_abort();
}

?>

<?php
if(isset($_REQUEST['contact']))
{session_start();
 
$con=mysqli_connect('localhost','root','','chat');
$q="select * from login";
$res=mysqli_query($con,$q);
while($row=mysqli_fetch_array($res))
{    if($row['username']==$_SESSION['u'])
    {

    }
    else{
        echo"<p id='$row[id]'>$row[username]</p><br>";
       };
}
session_abort();
}
?>

<?php
if(isset($_REQUEST['sendto']))
{session_start();
    $sendto=$_REQUEST['sendto'];
    $message=$_REQUEST['message'];
$con=mysqli_connect('localhost','root','','chat');
$q="insert into  personal values ('','$message','$_SESSION[u]','$sendto',1) ";
$res=mysqli_query($con,$q);
session_abort();
}
?>


<?php
if(isset($_REQUEST['sendto1'])){
session_start();
$sendto=$_REQUEST['sendto1'];
$con=mysqli_connect('localhost','root','','chat');
$q="select * from personal where sendto='$sendto' and sendby='$_SESSION[u]' or sendby='$sendto' and sendto='$_SESSION[u]'  ";
$res=mysqli_query($con,$q);
while($row=mysqli_fetch_array($res))
 { 
        // if($row['seen']==1){
//       echo'<script>alert("not seen")</script>';
// }
    if($row['sendby']==$_SESSION['u'])
    {echo"<p id='$row[id]' class='right'><span style='color:pink;font-size: 14px;'>$row[sendby]</span><br> $row[message]</p><br>";}
       else{
        echo"<p id='$row[id]' class='left' ><span style='color:yellow;font-size: 14px;'>$row[sendby]</span><br> $row[message]</p><br>";
       };
}
session_abort();
}
?>
