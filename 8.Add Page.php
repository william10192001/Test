<?php
$con=mysqli_connect("localhost","root","","project") or die("Connection Failed");
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

#Fname ,#pax ,#price, #description, #provide{
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

<script>
  function showImage(input)
  {
   if (input.files && input.files[0])
   {
    var reader=new FileReader();
    reader.onload=function(e){$('#image').attr('src', e.target.result).width(200).height(200);};
    reader.readAsDataURL(input.files[0]);
   }
  }
  </script>

</head>

<body>
<div class="input-field">
<form method="post" enctype="multipart/form-data" autocomplete="off">
<div class="login-div">
<div class="input-field col s6">

  <table align="center">
   <tr>
	<td align="center" colspan="2">
	 <input type='file' id="file" name="file" accept="image/*" onchange="showImage(this)" style="visibility:hidden"/>
	 <p align="center"><button id="button" onclick="document.getElementById('file').click();return false;" style="visibility:hidden"><img src="add.png" id="image" style="width:100px;height:100px;visibility:visible"/></button></p>
	</td>
   </tr>
  </table>



<input type="text" id="Fname" name="Fname" placeholder="Facility Name">
<input type="text" id="pax" name="pax" placeholder="Pax"> 
<input type="text" id="price" name="price" placeholder="Price">
<input type="text" id="description" name="description" placeholder="Description">
<input type="text" id="provide" name="provide" placeholder="Provide">

 <br>
 <input type="submit" class="button" id="add" name="add" value="Add">
		</div>
	</div>
</div>
</form>
</div>

<?php
if(isset($_POST['add']))
{
 	$Fname=$_POST['Fname'];
 	$pax=$_POST['pax'];
 	$price=$_POST['price'];
 	$description=$_POST['description'];
 	$provide=$_POST['provide'];
 
 	$dup1="SELECT * FROM facility WHERE item='$Fname'";
 	$query1=mysqli_query($con,$dup1);
 
	if(mysqli_num_rows($query1)>0)
 	{
  	 echo"<script>Swal.fire({icon:'error',type:'error',title:'Error',text:'Data Exist'})</script>";
 	}
	else
 	{
	 $sql = "INSERT INTO facility(item,pax,price,description,provide) VALUES ('$Fname','$pax','$price','$description','$provide')";
	 $query2=mysqli_query($con,$sql);
	 if($query2)
	 {
	  echo"
	  <script>
	  Swal.fire({icon:'success',type:'success',title:'Congratulation',text:'The data have been inserted',timer:5000});
	  setTimeout(function()
	  {
	   location='5.Admin page.php';
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