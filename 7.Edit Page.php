<?php
$con=mysqli_connect("localhost","root","","project") or die("Connection Failed");
if(isset($_GET['id']))
{
 $id=$_GET['id'];
}
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<head>
<style>
body{background-image: linear-gradient(45deg,#ebedee,#fdfbfb);justify-content:center;display:flex;font-family:Georgia}
form{
	margin-top:20%;
  box-shadow:inset 1px 1px 20px 5px #ebedee;
  background-color:white;

}
.shadow{box-shadow:3px 3px 30px 5px #ebedee; background-color:white}

#oldname, #newname, #oldpass, #newpass{
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

.login-div{
	max-width:500px;
	padding:30px;
	border:1px solid #ddd;
	border-radius:15px;
	}
</style>

</head>

<body>
<div class="input-field">
<form method="post" enctype="multipart/form-data" autocomplete="off">
<div class="login-div">
<div class="input-field col s6">

<?php
$select="SELECT * FROM user WHERE id='$id'";
$query=mysqli_query($con,$select);
$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
$name=$row['username'];
$pass=$row['password'];
echo"
<input type='text' id='oldname' name='oldname' value='$name' disabled>
"?>

<?php echo"<input type='text' id='oldpass' name='oldpass' value='$pass' disabled>"?>

<input type="text" id="newpass" name="newpass" placeholder="New Password" oninput="funcPass(this);" oninvalid="funcPass(this);" title="Please fill out your new password" required>
 
<script>
	 function funcPass(passes)
	 {
	  	var password=document.getElementById('newpass').value;
	  	if(password.length<8){passes.setCustomValidity('Please enter more than 8 password');}
	  	else if(password==""){passes.setCustomValidity('Please enter your password');}
	  	else{passes.setCustomValidity('');}
	 }
</script>

 <br>
 <input type="submit" class="button" id="update" name="update" value="Update">
		</div>
	</div>
</div>
</form>
</div>

<?php
if(isset($_POST['update']))
{
 	$newpass=$_POST['newpass'];
	
	$update="update user set password='$newpass' where id=$id";
    $query=mysqli_query($con,$update);
 
	if($query)
 	{
  	 echo"
	  <script>
	  Swal.fire({icon:'success',type:'success',title:'Congratulation',text:'The data have been inserted',timer:5000});
	  setTimeout(function()
	  {
	   location='3.facility booking system.php';
	  },2500);
	  </script>";
    }
	 else
	 {
	  echo"<script>Swal.fire({icon:'error',type:'error',title:'Error',text:'System problem, please insert data is insert error!'})</script>";
	 }
}
?>

</body>
</html>