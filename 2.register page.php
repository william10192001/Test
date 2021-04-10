<?php
$con=mysqli_connect("localhost","root","","project") or die("Connection Failed");
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register Now</title>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>
body{background-image: linear-gradient(45deg,#ebedee,#fdfbfb);justify-content:center;display:flex;font-family:Georgia}
h1{
	text-align:center;
	margin-top:20%;
}
form{
	background-image:linear-gradient(180deg,#F5FCFF,#DBF3FA);
	margin-top:10%;
}
#login-div2{
	background-image:linear-gradient(130deg,#DBF3FA 10%,#F5FCFF);
	margin-top:25px;
}
.shadow{box-shadow:3px 3px 30px 5px #ebedee; background-color:white}

#username ,#password ,#email ,#phonenumber{
	width: 76%;
    color: rgb(38, 50, 56);
    font-size: 15px;
    letter-spacing: 1px;
    background:white;
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
	box-shadow:1px 1px 1px 1px #ebedee;
}
#male ,#female{
	margin:5px 50px;
}
.button{
	width:75%;
	background-image:linear-gradient(45deg,#96deda,#50c9c3);
	color:white;
	margin:8px 50px;
	border:none;
	cursor:pointer;
	box-shadow:2px 2px 5px 3px #ebedee;
	cursor: pointer;
    border-radius: 5em;
    padding-bottom: 10px;
    padding-top: 10px;
	font-size:18px;
	}
.button:hover {opacity:0.9;}

.login {
	width:75%;
	background-color:#f44336;
	color:white;
	margin:8px 50px;
	border:none;
	box-shadow:2px 2px 5px 1px #ebedee;
	cursor:pointer;
	border-radius: 5em;
	padding:10px 15px;
	font-size:18px;
	}
.login:hover {opacity:0.9;color:white;text-decoration:none}

.login-div{
	max-width:500px;
	padding:30px;
	border:1px solid #ddd;
	border-radius:15px;
	}
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
<div class="input-field">
<h1>Create your Account</h1>
<form autocomplete="off" method="post">
<div class="w3-animate-zoom">
<div class="login-div">
<h4 style="text-align:center">Sign in</h4>

<div class="login-div" id="login-div2">
<div class="input-field col s6">

<input type="text" id="username" name="username" placeholder="Username" oninput="funcName(this);" oninvalid="funcName(this);" onkeypress="return(event.charCode>=32&&event.charCode<=32)||(event.charCode>=65&&event.charCode<=90)||(event.charCode>=97&&event.charCode<=122)" title="Please fill out your name" autofocus required> 
 
<script>
     function toUpperCase(str){return str.split(/\s+/).map(s=>s.charAt(0).toUpperCase()+s.substring(1).toLowerCase()).join(" ");}
     $('#username').on('keyup', function(event)
	 {	
      var upper=$(this);
      upper.val(toUpperCase(upper.val()));
     });
     $('#usermane').select(function()
	 {
		 this.selectionStart=this.selectionEnd;
		 return false;
	 });
	 function funcName(names)
	 {
	  var alphabet=/^[A-Za-z]+$/;
      var RegName=document.getElementById('username').value;
	  if(RegName==''){names.setCustomValidity('Please fill out your english name');}
  	  else if(RegName.match(alphabet)){names.setCustomValidity('');}
	  else{names.setCustomValidity('Please enter english only');}
	 }
</script>

 
<input type="password" id="password" name="password" placeholder="Password" oninput="funcPass(this);" oninvalid="funcPass(this);" title="Please fill out your password" required>
<i class="fa fa-eye-slash showpwd" style="font-size:16px;color:grey" onClick="showPwd('passwd', this)"></i> 
 
<script>
	 function funcPass(passes)
	 {
	  	var password=document.getElementById('password').value;
	  	if(password.length<8){passes.setCustomValidity('Please enter more than 8 password');}
	  	else if(password==""){passes.setCustomValidity('Please enter your password');}
	  	else{passes.setCustomValidity('');}
	 }
</script>

 
 <input type="text" id="email" name="email" placeholder="Email" oninput="funcEmail(this);" oninvalid="funcEmail(this);" title="Please fill out your Email" required> 
 
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

 
 <input type="text" id="phonenumber" name="phonenumber" placeholder="Number Phone" oninput="funcPhone(this);" oninvalid="funcPhone(this);" onkeypress="return(event.charCode>=48&&event.charCode<=57)" title="Please fill out your phone number" required> 
 
<script>
     function funcPhone(phones)
	 {
      	var numeric=/^[0-9]+$/;
	  	var phone=document.getElementById('phonenumber').value;
	  	if(phone==''){phones.setCustomValidity('Please fill out your phone number');}
  	 	else if(phone.match(numeric)){phones.setCustomValidity('');}
	 	else{phones.setCustomValidity('Please enter number only');}
	 }
</script>

 
 
<label for="male"><input type="radio" name="gender" id="male" value="male" required/>Male</label>
<label for="female"><input type="radio" name="gender" id="female" value="female" required/>Female</label>
 
 <br>
 <input type="submit" class="button" id="submit" name="submit" value="Register">
 <br>
 <a href="1.login page.php"><input type="button" class="login" value="Login"/></a>
		</div>
	</div>
</div>
</div>
</form>
</div>


<?php
if(isset($_POST['submit']))
{
 	$username=$_POST['username'];
 	$password=$_POST['password'];
 	$email=$_POST['email'];
 	$phonenumber=$_POST['phonenumber'];
 	$gender=$_POST['gender'];
 
 		$dup1="SELECT * FROM admin WHERE email='$email'";
 		$dup2="SELECT * FROM user WHERE email='$email'";
 		$query1=mysqli_query($con,$dup1);
 		$query2=mysqli_query($con,$dup2);
 
		 if(mysqli_num_rows($query1)>0||mysqli_num_rows($query2)>0)
 			{
  				echo"<script>Swal.fire({icon:'error',type:'error',title:'Error',text:'Data Exist'})</script>";
 			}
 		
			 else
 				{
					$sql = "INSERT INTO user (username,password,email,phonenumber,gender) VALUES ('$username','$password','$email','$phonenumber','$gender')";
					$query3=mysqli_query($con,$sql);
	
		if($query3)
			{
				echo"
				<script>
				Swal.fire({icon:'success',type:'success',title:'Congratulation',text:'The data have been inserted',timer:5000});
				setTimeout(function()
				{
		 			location='1.login page.php';
				},1000);
				</script>";
			}
			else
				{
					echo"<script>Swal.fire({icon:'error',type:'error',title:'Error',text:'System problem, please insert data is insert error!'})</script>";
				}
 				}
}
?>
</body>
</html>