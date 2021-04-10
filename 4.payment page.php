<?php
$con=mysqli_connect("localhost","root","","project") or die("Connection Failed");
session_start();
if(isset($_GET['username']))
{
 $username=$_GET['username'];
 $item=$_GET['item'];
 $price=$_GET['price'];
 $date=$_GET['date'];
 $time=$_GET['time'];
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
  margin-top:3%;
  margin-left:20%;
  margin-right:20%;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%;
  flex: 75%;
}

.col-50 {
  -ms-flex: 50%;
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%;
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 12px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 80%;
  border-radius: 5px;
  cursor: pointer;
  font-size: 17px;
  float:center;
  margin-left:10%;
}

.btn:hover {
	opacity:0.8;
  background-color: darkgreen;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
}
</style>
</head>
<body>
<h2>Payment</h2>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form autocomplete="off" method="post">
        <div class="row">
          <div class="col-50">
		  <div class="w3-animate-top">
			<h3>Booking Detail:</h3>
			<?php echo "$username" ?>
			<br>
			<?php echo "Booking Date $date" ?>
			<br>
			<?php echo "Booking Time $time" ?>
	`		</div>
			<br>
			<div class="w3-animate-right">
			<h3>Billing Address:</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="James Bond" title="Please fill out your full name" 
				   oninput="funcName(this);" oninvalid="funcName(this);" onkeypress="return(event.charCode>=32&&
				   event.charCode<=32)||(event.charCode>=65&&event.charCode<=90)||(event.charCode>=97&&event.charCode<=122)" autofocus required>
			
			<script>
			function toUpperCase(str){return str.split(/\s+/).map(s=>s.charAt(0).toUpperCase()+s.substring(1).toLowerCase()).join(" ");}
			$('#fname').on('keyup', function(event)
			{	
				var upper=$(this);
				upper.val(toUpperCase(upper.val()));
			});
			$('#fname').select(function()
			{
				this.selectionStart=this.selectionEnd;
				return false;
			});
		
			function funcName(names)
			{
				var alphabet=/^[A-Za-z]+$/;
				var fname=document.getElementById('fname').value;
				if(fname==''){names.setCustomValidity('Please fill out your english name');}
				else if(fname.match(alphabet)){names.setCustomValidity('');}
				else{names.setCustomValidity('Please enter english only');}
			}
			</script>
			
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="JamesBond@example.com" required/>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="xx, Jalan x/xx, Taman Bunga" required/>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Kuala Lumpur" required/>

            <div class="row">
              <div class="col-50">
                <label for="postcode">Postcode</label>
                <input type="text" id="postcode" name="postcode" placeholder="86000" required/>
              </div>
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Johor" required/>
              </div>
            </div>
			<label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="012-345 6789" required/>
          </div>
		  </div>

          <div class="col-50">
		   <div class="w3-animate-bottom">
            <h3>Credit Cards</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
			<input type="radio" id="visa" name="credit" value="Visa" required/>
			<label for="visa"><i class="fa fa-cc-visa" style="color:navy;"></i></label>
			
			<input type="radio" id="amex" name="credit" value="Amex" required/>
			<label for="amex"><i class="fa fa-cc-amex" style="color:blue;"></i></label>
			
			<input type="radio" id="mastercard" name="credit" value="Master card" required/>
			<label for="mastercard"><i class="fa fa-cc-mastercard" style="color:red;"></i></label>
  
            <input type="radio" id="discover" name="credit" value="Discover" required/>
			<label for="discover"><i class="fa fa-cc-discover" style="color:orange;"></i></label>
            </div>
			</div>
			
			 <div class="w3-animate-left">
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="James Bond" required/>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required/>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" required/>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018" required/>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="123" required/>
              </div>
            </div>
          </div>
		  </div>
          
        </div>
		 <div class="w3-animate-right">
        <label>
          <input type="checkbox" checked="checked" name="sameadr"/> Shipping address same as billing
        </label>
        <input type="submit" name="submit" value="Continue to checkout" class="btn"/>
      </form>
	  </div>
    </div>
  </div>
  
  <div class="col-25">
    <div class="container">
	  <div class="w3-animate-bottom">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
	  <p><?php echo "$item"?> <span class="price" style="color:black"><?php echo "<b>RM $price/Day</b>"?></span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><?php echo "<b>RM $price/Day</b>"?></span></p>
	 </div>
   </div>
  </div>
  
</div>


<?php
if(isset($_POST['submit']))
{
 $firstname=$_POST['firstname'];
 $email=$_POST['email'];
 $address=$_POST['address'];
 $city=$_POST['city'];
 $postcode=$_POST['postcode'];
 $state=$_POST['state'];
 $phone=$_POST['phone'];
 $credit=$_POST['credit'];
 $cardname=$_POST['cardname'];
 $cardnumber=$_POST['cardnumber'];
 $expmonth=$_POST['expmonth'];
 $expyear=$_POST['expyear'];
 $cvv=$_POST['cvv'];
 
 $dup1="SELECT * FROM payment WHERE cardnumber='$cardnumber' and cardname='$cardname'";
 $query1=mysqli_query($con,$dup1);
 if(mysqli_num_rows($query1)>0)
 {
  echo"<script>Swal.fire({icon:'error',type:'error',title:'Error',text:'Data Exist!'})</script>";
 }
 else
 {
 $sql = "INSERT INTO payment (firstname,email,address,city,postcode,state,phone,credit,cardname,cardnumber,expmonth,expyear,cvv)
 VALUES ('$firstname','$email','$address','$city','$postcode','$state','$phone','$credit', '$cardname', '$cardnumber', '$expmonth', '$expyear', '$cvv')";
 $query2=mysqli_query($con,$sql);
	if($query2)
	{
		echo"
				<script>
				Swal.fire({icon:'success',type:'success',title:'Successful',text:'Your payment has been completed!',timer:5000});
				setTimeout(function()
				{
		 			location='3.facility booking system.php';
				},2500);
				</script>";
			}

	else
	{
		echo"<script>Swal.fire({icon:'error',type:'error',title:'Error',text:'Please Insert Information!'})</script>";
	}
 }
}
?>

</body>
</html>