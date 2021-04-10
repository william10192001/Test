<?php
 $con=mysqli_connect("localhost","root","","project") or die("Connection Failed");
 session_start();
 if(isset($_SESSION['id']))
 {
	 $id=$_SESSION['id'];
	 $username=$_SESSION['username'];
 }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facility Booking</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
	ul{
	margin-left:80%;
	}
	.logo img{
		width:90px;
		height:70px;
		margin-left:110px;
		padding:5px 5px;
	}
	.HFB{
		margin-left:-20px;
		font-size:55px;
		font-family:Alegreya;
		color:goldenrod;
	}
	.hades{
		margin-top:-2px;
		margin-left:10px;
		line-height:20px;
	}
	.jumbotron{
		height:200px;
		background-color:#FDFDFD;
		box-shadow:2px 2px 5px 3px #ebedee;
	}
	.bg-light{
		margin-top:-30px;
		box-shadow:inset 0px 0px 20px 10px #ebedee;
	}
	.display-4{
		margin-top:-40px;
	}
	.table-active{
		background-color:#C9C9C9;
		text-align:center;
		color:white;
		font-family:aleo;
		font-size:17px;
		width:80%;
		margin-left:10%;
	}
	
	.col1{
		color:#b3b3b3;
		margin-left:-130px;
		font-size:20px;
	}
	.col2{
		color:#ff5252;
		margin-top:-30px;
		font-size:50px;
	}
	.col3{
		color:#b3b3b3;
		margin-top:-30px;
		margin-right:-135px;
		font-size:20px;
	}
	.btn-danger{
		background-color:white;
		padding:8px;
		width:80%;
		box-shadow:inset 0px 0px 8px 3px #ebedee;
	
	}
	.btnfont{
		font-size:20px;
		background: -webkit-linear-gradient(#B78628,#FCC201);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
	}
	h5{
		color:#bebebe;
		float:left;
		font-size:18px;
	}
	.btn:hover{
		opacity:0.8;
	}
	.modal-title{
		color:black;
		font-size:30px;
	}
	.btn-light{
		background-color:white;
		margin:0% 2%;
		padding:2% 6%;
		box-shadow:inset 0px 0px 8px 3px #ebedee;
	}
	#white{
		color:white;
	}
	.bookingdate,.bookingtime{
		float:left;
	}
	.dropdown {
		position: absolute;
		display: inline-block;
	}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  z-index: 1;
  margin-left:-122px;
  font-size:14px;
}

.dropdown-content a {
  color: black;
  text-decoration: none;
  display: block;
}

.button2 {
  background-color:white;
  color: black;
  padding: 13px;
  font-size: 16px;
  border:none;
  outline: none;
}
.button2:hover{
		opacity:0.7;
		background-color:#2196F3;
	}

.dropdown-content a:hover {background-color: #ddd}

.dropdown:hover .dropdown-content {
  display: block;
}
.a{
  position: relative;
  animation: mymove;
  animation-duration: 0.2s;
}
.b{
  position: relative;
  animation: mymove;
  animation-duration: 0.5s;
}
.c{
  position: relative;
  animation: mymove;
  animation-duration: 0.8s;
}
.d{
  position: relative;
  animation: mymove;
  animation-duration: 1.1s;
}
@keyframes mymove {
  from {top: 200px;}
  to {top: 0px;}
}
	</style>
	
</head>

<body>
	<ul class="nav nav-tabs"> 
	<li>
	   <a class="nav-link" href="#"><?php echo $username;?></a>
	   </li>
	   
	   <li>
	 	<div class="dropdown">
		<button class="button2"><i class="fa fa-caret-down"></i></button>
		<div class="dropdown-content">
			<a class="nav-link" href="7.Edit Page.php?id=<?php echo $id?>">Change Password</a>
			<a class="nav-link" href="0.home page.html">Sign out</a>
		</div>
	   </div>
	</li> 
	</ul>
	
	<div class="a">
	<div class="jumbotron">
	<table>

	<tr>
		<td><div class="logo"><img src="logo.png" alt="Logo"></div></td>
 
		<td><div class="HFB"><b>HFB</b></div></td>
 
		<td><div class="hades"><b>HADES FACILITY BOOKING</b><br>MALAYSIA</div></td>
	</tr>
	</table>
	</div>
	</div>

	<div class="b">
	<div class="jumbotron text-center bg-light">
		<h1 class="display-4">Rent our Facilities</h1>
		<p>Thank you very much for your interest in reserving room space at the Hades Facility Booking Malaysia, Johor.<br>  We welcome groups to our facilities for hosting meetings and conferences.</p>
	</div>
	</div>
	
	<div class="container">
	<div class="c">
	 <table class="table table-active table-bordered">
	 <div class="c">
    <thead>
	<?php
	$id1="SELECT * FROM facility WHERE id='1'";
	$id2="SELECT * FROM facility WHERE id='2'";
	$id3="SELECT * FROM facility WHERE id='3'";
	$query1=mysqli_query($con,$id1);
	$query2=mysqli_query($con,$id2);
	$query3=mysqli_query($con,$id3);
	$row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
	$row2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
	$row3=mysqli_fetch_array($query3,MYSQLI_ASSOC);
	?>
      <tr>
        <th><?php echo $row1['item'];?><br> <?php echo $row1['pax']?></th>
        <th><?php echo $row2['item'];?><br> <?php echo $row2['pax']?></th>
        <th><?php echo $row3['item'];?><br> <?php echo $row3['pax']?></th>
      </tr>
    </thead>
    <tbody>
      <tr class="table-light">
        <td><div class="col1">RM</div><div class="col2"><?php echo $row1['price']?></div><div class="col3">/Day</div></td>
        <td><div class="col1">RM</div><div class="col2"><?php echo $row2['price']?></div><div class="col3">/Day</div></td>
        <td><div class="col1">RM</div><div class="col2"><?php echo $row3['price']?></div><div class="col3">/Day</div></td>
      </tr>
      <tr>
        <td><p><?php echo $row1['description']?></p>
			<p><?php echo $row1['provide']?></p></td>
        <td><p><?php echo $row2['description']?></p>
			<p><?php echo $row2['provide']?></p></td>
        <td><p><?php echo $row3['description']?></p>
			<p><?php echo $row3['provide']?></p></td>
      </tr>
      <tr>
        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><div class="btnfont"><div class="btnfont">Gallery</div></button></div>
			<div class="modal fade" id="myModal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $row1['item'];?></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

			<div class="modal-body">
				<img src="DewanBanquet.jpg" width="400px" height="200px" alt="Dewan Banquet">
			</div>
        
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal"><div class="btnfont">Close</div></button>
			</div>
        
					</div>
				</div>
			</div>
		</td>
		
		<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2"><div class="btnfont"><div class="btnfont">Gallery</div></button></div>
			<div class="modal fade" id="myModal2">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $row2['item'];?></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

			<div class="modal-body">
				<img src="DewanAbdullah.jpg" width="100%" height="200px" alt="Dewan Tan Sri Abdullah">
			</div>
        
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal"><div class="btnfont">Close</div></button>
			</div>
        
					</div>
				</div>
			</div>
		</td>
		
        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal3"><div class="btnfont"><div class="btnfont">Gallery</div></button></div>
			<div class="modal fade" id="myModal3">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $row3['item'];?></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

			<div class="modal-body">
				<img src="DewanJumaah.jpg" width="100%" height="200px" alt="Dewan Jumaah">
			</div>
        
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal"><div class="btnfont">Close</div></button>
			</div>
        
					</div>
				</div>
			</div>
		</td>
		
		<tr>
			<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal7"><div class="btnfont"><div class="btnfont">Book</div></button></div>
			<div class="modal fade" id="myModal7">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $row1['item'];?></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

			<div class="modal-body">
				<h5>Please select your booking date.</h5>
				<br>
				<br>
				<input class="bookingdate" type="date" id="bookingdate" name="bookingdate">
				<br>
				<br>
				<input class="bookingtime" type="time" id="bookingtime" name="bookingtime">
			</div>
        
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="funcBook1()">Done</button>
				<button type="button" class="btn btn-warning" id="white" data-dismiss="modal">Close</button>
				
				
				
				<?php
				
				echo"<script>
				function funcBook1()
				{
				 var date=document.getElementById('bookingdate').value;
				 var time=document.getElementById('bookingtime').value;
				 if(date==''||time=='')
				 {
				  Swal.fire({icon:'error',type:'error',title:'Error',text:'Please insert booking details'});
				 }
				 else
				 {";
			      $item=$row1['item'];
			      $price=$row1['price'];
				  $page="username=$username&item=$item&price=$price&date='+date+'&time='+time+'";
				  echo"
				  location='4.payment page.php?$page';
				 }
				}
				</script>";?>
			</div>
					</div>
				</div>
			</div></td>
			
			<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal8"><div class="btnfont"><div class="btnfont">Book</div></button></div>
			<div class="modal fade" id="myModal8">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $row2['item'];?></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

			<div class="modal-body">
				<h5>Please select your booking date.</h5>
				<br>
				<br>
				<input class="bookingdate" type="date" id="bookingdate2" name="bookingdate">
				<br>
				<br>
				<input class="bookingtime" type="time" id="bookingtime2" name="bookingtime">
			</div>
        
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="funcBook2()">Done</button>
				<button type="button" class="btn btn-warning" id="white" data-dismiss="modal">Close</button>
				
				
				
				<?php
				echo"<script>
				function funcBook2()
				{
				 var date=document.getElementById('bookingdate2').value;
				 var time=document.getElementById('bookingtime2').value;
				 if(date==''||time=='')
				 {
				  Swal.fire({icon:'error',type:'error',title:'Error',text:'Please insert booking details'});
				 }
				 else
				 {";
			      $item=$row2['item'];
			      $price=$row2['price'];
				  $page="username=$username&item=$item&price=$price&date='+date+'&time='+time+'";
				  echo"
				  location='4.payment page.php?$page';
				 }
				}
				</script>";?>
			</div>
        
					</div>
				</div>
			</div></td>
			
			<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal9"><div class="btnfont"><div class="btnfont">Book</div></button></div>
			<div class="modal fade" id="myModal9">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $row3['item'];?></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

			<div class="modal-body">
				<h5>Please select your booking date.</h5>
				<br>
				<br>
				<input class="bookingdate" type="date" id="bookingdate3" name="bookingdate">
				<br>
				<br>
				<input class="bookingtime" type="time" id="bookingtime3" name="bookingtime">
			</div>
        
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="funcBook3()">Done</button>
				<button type="button" class="btn btn-warning" id="white" data-dismiss="modal">Close</button>
				
				
				
				<?php
				echo"<script>
				function funcBook3()
				{
				 var date=document.getElementById('bookingdate3').value;
				 var time=document.getElementById('bookingtime3').value;
				 if(date==''||time=='')
				 {
				  Swal.fire({icon:'error',type:'error',title:'Error',text:'Please insert booking details'});
				 }
				 else
				 {";
				  $item=$row2['item'];
			      $price=$row2['price'];
				  $page="username=$username&item=$item&price=$price&date='+date+'&time='+time+'";
				  echo"
				  location='4.payment page.php?$page';
				 }
				}
				</script>";?>
			</div>
        
					</div>
				</div>
			</div></td>
		</tr>
      </div>
	  </tr>
    </tbody>
  </table>
  </div>
<?php/*——————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————*/?>
	<br>
	<div class="d">
	 <table class="table table-active table-bordered">
    <thead>
      <tr>
        <th>Foyer Dewan Banquet<br> 40 Pax</th>
        <th>Bilik Gerakan<br>18 Pax</th>
        <th>Bilik LPU<br>20 Pax</th>
      </tr>
    </thead>
    <tbody>
      <tr class="table-light">
        <td><div class="col1">RM</div><div class="col2">250</div><div class="col3">/Day</div></td>
        <td><div class="col1">RM</div><div class="col2">210</div><div class="col3">/Day</div></td>
        <td><div class="col1">RM</div><div class="col2">300</div><div class="col3">/Day</div></td>
      </tr>
      <tr>
        <td><p>Suitable for sit-down meal area</p>
			<p>Aircond, +Banquet Chair, +Round Table<p></td>
        <td><p>Suitable for medium size meeting group</p>
			<p>Aircond, +PA System, +Projector</p></td>
        <td><p>Suitable for meeting, and presentation</p>
			<p>Aircond, +PA System, +Projector</p></td>
      </tr>
      <tr>
        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal4"><div class="btnfont"><div class="btnfont">Gallery</div></button></div>
			<div class="modal fade" id="myModal4">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Foyer Dewan Banquet</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

			<div class="modal-body">
				<img src="FoyerDewanBanquet.jpg" width="100%" height="200px" alt="Foyer Dewan Banquet">
			</div>
        
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal"><div class="btnfont">Close</div></button>
			</div>
        
					</div>
				</div>
			</div>
		</td>
		
		<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal5"><div class="btnfont"><div class="btnfont">Gallery</div></button></div>
			<div class="modal fade" id="myModal5">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Bilik Gerakan</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

			<div class="modal-body">
				<img src="BilikGerakan.jpg" width="100%" height="200px" alt="Bilik Gerakan">
			</div>
        
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal"><div class="btnfont">Close</div></button>
			</div>
        
					</div>
				</div>
			</div>
		</td>
		
        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal6"><div class="btnfont"><div class="btnfont">Gallery</div></button></div>
			<div class="modal fade" id="myModal6">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Bilik LPU (AL-Ghazali)</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

			<div class="modal-body">
				<img src="BilikLPU.jpg" width="100%" height="200px" alt="Bilik LPU">
			</div>
        
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal"><div class="btnfont">Close</div></button>
			</div>
        
					</div>
				</div>
			</div>
		</td>
      
	  </tr>
    </tbody>
  </table>
  </div>
</div>
</body>
</html>