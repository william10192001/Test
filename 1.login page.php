<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>
body{
	font-family:Arial;
	margin-top:160;
	margin-left:130;
	margin-right:130;
	background-image:url(Bb.jpg);
	background-size: cover;
}
.content
{
    width: 450px;
    height: auto;
    background: RGBA(255, 255, 255,0.4);
    border-radius: 4%;
    display: table;
    box-shadow:0px 0px 2px 1px #939393;
	padding:16px 16px;
	min-height: 55%;
}
form{
	float:center;
}

.img{
	float:center;
}
label{font-size:14px;margin:8px 3px;color:#666666}
input[type=text], input[type=password] {width:100%;padding:12px 20px;margin:8px 0;display:inline-block;border:1px solid #ccc;box-sizing:border-box;}
img.user {width: 25%;border-radius: 50%;}
.imgcontainer {text-align:center;margin:24px 0 12px 0;}
.container {margin-right:-45px;padding: 16px;}
.button {
	background-image:linear-gradient(45deg,#B78628,#FCC201);
	color:white;
	padding:14px 20px;
	border:none;
	width:99%;
	box-shadow:0px 0px 10px 1px #ebedee;
	display:block;
	margin:auto auto;
	cursor:pointer;
	outline:none;
}
.button:hover,.register:hover {opacity:0.8}
.register{background-image:linear-gradient(45deg,#B78628,#FCC201);color:white;padding:14px 20px;border:none;width:99%;box-shadow:0px 0px 10px 1px #ebedee;display:block;margin:auto auto;text-align:center;text-decoration:none}

</style>

<script type="text/javascript">
function showPwd(id, el) {
  let x = document.getElementById("password");
  
  if (x.type === "password") {
    x.type = "text";
    el.className = 'fa fa-eye showpwd';
  } else {
    x.type = "password";
    el.className = 'fa fa-eye-slash showpwd';
  }
}
</script>

</head>

<body>

<form autocomplete="off" method="post">
<div class="container">
<div class="w3-animate-top">
    <div class="content">
<div class="imgcontainer"><img src="logo.png" alt="Logo" class="user"></div>

<label for="email"><b>Email</b></label>
<input type="text" id="email" name="email" placeholder="Email" oninput="funcEmail(this);" oninvalid="funcEmail(this);" title="Please fill out your Email" autofocus required>
<script>
     function funcEmail(emails)
	 {
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	  var email=document.getElementById('email').value;
	  if(email==''){emails.setCustomValidity('Please fill out your Email');}
  	  else if(email.match(mailformat)){emails.setCustomValidity('');}
	  else{emails.setCustomValidity('Please enter proper email');}
	 }
</script>

<label for="password"><b>Password</b></label>
<p><input type="password" id="password" name="password" placeholder="Enter Password" required>
<i class="fa fa-eye-slash showpwd" style="font-size:16px;color:grey" onClick="showPwd('passwd', this)"></i></p>
<script>
	 function funcPass(passes)
	 {
	  var password=document.getElementById('password').value;
	  if(password.length<8){passes.setCustomValidity('Please enter more than 8 password');}
	  else if(password==""){passes.setCustomValidity('Please enter your password');}
	  else{passes.setCustomValidity('');}
	 }
</script>

<input type="submit" class="button" id="btn" name="submit" value="Login">
<br>
<a href="2.register page.php" class="register">Register Now</a>
</div>
</div>
</div>
</form>


<?php
$con=mysqli_connect("localhost","root","","project") or die("Connection Failed");
if(isset($_POST['submit']))
{
 session_start();
 $email=$_POST['email'];
 $password=$_POST['password'];
 $select1="SELECT * FROM admin WHERE email='$email' and password='$password'";
 $select2="SELECT * FROM user WHERE email='$email' and password='$password'";
 $query1=mysqli_query($con,$select1);
 $query2=mysqli_query($con,$select2);
 if(mysqli_num_rows($query1)>0)
 {
  $row=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  $_SESSION['username']=$row['username'];
  header('Location: 5.Admin page.php');
 }
 else if(mysqli_num_rows($query2)>0)
 {
  $row=mysqli_fetch_array($query2,MYSQLI_ASSOC);
  $_SESSION['id']=$row['id'];
  $_SESSION['username']=$row['username'];
  header('Location: 3.facility booking system.php');
 }
 else
 {
  echo "<script>Swal.fire({icon:'error',type:'error',title:'Error',text:'Wrong username or password'})</script>";
 }
}
?>

</body>
</html>