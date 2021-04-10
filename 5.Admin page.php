<?php
$con=mysqli_connect("localhost","root","","project") or die("Connection Failed");
session_start();
if(isset($_SESSION['username']))
{$username=$_SESSION['username'];}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/924e911748.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<style>
 html{scroll-behavior:smooth;}
 body{font-family:Arial,Helvetica,sans-serif;margin:0}
 .topbar{background:linear-gradient(200deg,#926000,goldenrod);box-shadow:0px 1px 10px 5px #878787;position:fixed;text-align:center;width:100%;z-index:1}
 .sidebar{background:linear-gradient(#926000,goldenrod);position:fixed;top:90px;transition:0.3s;max-width:300px;height:100%;z-index:1}
 .theme{color:white;font-size:20px;font-weight:bold;padding:10px;text-align:center;transition:1s;width:auto}
 .side-datatype{background:none;border:none;color:white;cursor:pointer;font-size:13px;font-weight:bold;outline:none;padding:20px;text-align:left;text-shadow:2px 2px 10px black;transition:0.3s}
 .side-datatype.active,.side-datatype:hover{background:gainsboro;color:#FCC201;text-shadow:2px 2px 10px #ffffff}
 #sideopt1:before{content:"Facility"}
 #sideopt2:before{content:"Customer"}
 #sideopt3:before{content:"Rental"}
 #sideopt4:before{content:"Sign Out"}
 .tab-content{display:none;margin-left:120px;position:relative;top:90px;transition:0.3s}
 .tab-search{background:white;box-shadow:0px 2px 10px 5px #bebebe;padding:20px;min-width:1324px}
 #srhname1,#srhmail1,#srhname2,#srhmail2,#srhname3,#srhtact3,#srhmail3{border-radius:5px;font-size:13px;padding:5px}
 .addA,.delU,.editU{background:red;border:none;border-radius:5px;box-shadow:1px 1px 2px black;color:white;cursor:pointer;font-weight:bold;outline:none;padding:10px;width:110px}
 .addA{width:60px}
 .addA:active,.delU:active{background:darkred}
 .editU{background:dodgerblue;color:white}
 .editU:active{background:blue}
 .fa-user-plus,.fa-trash-alt{background:red;color:white;font-size:13px;text-shadow:1px 1px 1px black}
 #facility{display:block}
 #down0,#down1,#down2,#down3,#down4,#down5,#down6,#down7,#down8,#down9,#down10{cursor:pointer;text-shadow:1px 1px 3px grey;transition:.5s}
 #factable,#ustable,#rentable{background:white;border:3px solid black;border-collapse:collapse;margin:auto;position:relative;top:30px}
 th,td{background:gainsboro;border:1px solid black;font-size:12px}
 
 


 
 #chatemail,#chatpass{background:none;border:none;border-radius:5px;display:none;font-size:13px;outline:none;padding:5px}
 .clearU,.movU,.checkB,.checkReg{border:none;border-radius:5px;box-shadow:1px 1px 4px black;cursor:pointer;font-weight:bold;outline:none;padding:10px;width:110px}
 .clearU{background:grey;color:white}
 .clearU:active{background:black}
 .movU{background:orchid;color:white}
 .movU:active{background:purple}
 
 @media only screen and (max-width:1400px)
 {
  .theme{font-size:17px}
  #sideopt1:before,#sideopt2:before,#sideopt3:before,#sideopt4:before{content:""}
  .side-datatype{font-size:18px;text-align:center}
  .tab-content{margin-left:110px}
 }
</style>
</head>
<body>
 <div class="topbar">
  <a href="1.login page.php" title="" class="logo"><img src="logo.png" width="130px" height="90px" alt="logo"></a>
 </div>
 <div class="sidebar">
  <div class="theme">Information</div>
  <div class="side-datatype active" onclick="openTab(event,'facility')"><i class="fa fa-building-o" title="Facility"></i> <span id="sideopt1"></span></div>
  <div class="side-datatype" onclick="openTab(event,'customer')"><i class="fas fa-user" title="Customer"></i> <span id="sideopt2"></span></div>
  <div class="side-datatype" onclick="openTab(event,'rental')"><i class="fa fa-money" title="Register Blackboard Account"></i> <span id="sideopt3"></span></div>
  <div class="side-datatype" onclick="signoutalt()"><i class="fas fa-sign-out-alt fa-flip-horizontal" title="Sign Out"></i> <span id="sideopt4"></span></div>
 </div>
 <script>
 function openTab(evt,data)
 {
  var a;
  var tabcontent=document.getElementsByClassName("tab-content");
  for(a=0;a<tabcontent.length;a++)
  {
   tabcontent[a].style.display="none";tabcontent[a].style.opacity="0";
  }
  var sidedatatype=document.getElementsByClassName("side-datatype");
  for(a=0;a<sidedatatype.length;a++)
  {
   sidedatatype[a].className=sidedatatype[a].className.replace(" active", "");
  }
  document.getElementById(data).style.display="block";
  document.getElementById(data).style.opacity="1";
  evt.currentTarget.className+=" active";
 }
 
 function signoutalt()
 {
  Swal.fire({title:'Sign Out',text:'Do you want to sign out?',icon:'question',
             showCancelButton:true,confirmButtonColor:'red',cancelButtonColor:'black',confirmButtonText:'Sure',cancelButtonText:'No'})
  .then((result)=>{
   if(result.value)
   {
    location='devsemadcheck.php?id=1&opt=signout';
   }
  })
 }
 </script>
 
 <div class="tab-content" id="facility">
  <div class="tab-search">
   Search Name: <input type="text" id="srhname1" onkeyup='srh1()' placeholder='Search Name...'>
   <span style="position:relative;left:50px"><button class="addA" onclick="funcAdd()" title="Add Facility"><i class='fas fa-user-plus' title="Add Facility"></i></button></span>
  </div>
  <script>
  function funcAdd()
  {
   location='8.Add Page.php';
  }
  
  function srh1()
  {
   var srhname=document.getElementById('srhname1');
   var filter1=srhname.value.toUpperCase();
   var faclist=document.getElementsByClassName('faclist');
   var facname=document.getElementsByClassName('facname');
   var txtValue1;
	
   for(var a=0;a<facname.length;a++)
   {
    txtValue1=facname[a].textContent||facname[a].innerText;
    if(txtValue1.toUpperCase().indexOf(filter1)>-1)
    {
     faclist[a].style.display="";
    }
    else
    {
     faclist[a].style.display="none";
    }
   }
  }
  
  function sortTable1(n)
  {
   var table,switching,dir,rows,i,shouldSwitch,x,y,switchcount=0;
   table=document.getElementById("factable");
   switching=true;
   dir="asc";
   while(switching)
   {
    switching=false;
    rows=table.rows;
    for(i=1;i<(rows.length-1);i++)
    {
     shouldSwitch = false;
     x=rows[i].getElementsByTagName("TD")[n];
     y=rows[i+1].getElementsByTagName("TD")[n];
     if(dir=="asc")
     {
      if(x.innerHTML.toLowerCase()>y.innerHTML.toLowerCase())
      {
       shouldSwitch=true;
       break;
      }
     }
     else if(dir=="desc")
     {
      if(x.innerHTML.toLowerCase()<y.innerHTML.toLowerCase())
	  {
       shouldSwitch=true;
       break;
      }
     }
    }
    if(shouldSwitch)
    {
     rows[i].parentNode.insertBefore(rows[i+1],rows[i]);
     switching=true;
     switchcount++;      
    }
    else
    {
     if(switchcount==0&&dir=="asc")
     {
      dir="desc";
      switching=true;
     }
    }
   }
  }
  </script>
  <?php
  echo"
  <table id='factable' cellpadding='10px' cellspacing='15px'>
   <tr>
    <th>No.</th>
    <th>Facility Name <i class='fas fa-chevron-down' onclick='sortTable1(1)' id='down1'></i></th>
    <th>Pax</th>
    <th>Price</th>
    <th>Description</th>
    <th>Provide</th>
    <th>Gallery</th>
    <th>Remove Facility</th>
    <th>Update Facility</th>
   </tr>
  ";
  $no1=1;
  $select1="select * from facility order by id ASC";
  $query1=mysqli_query($con,$select1);
  while($row1=mysqli_fetch_array($query1,MYSQLI_ASSOC))
  {
   $facility="facility";
   $id=$row1['id'];
   $item=$row1['item'];
   $pax=$row1['pax'];
   $price=$row1['price'];
   $description=$row1['description'];
   $provide=$row1['provide'];
   $gallery=$row1['gallery'];
   echo"
   <tr class='faclist'>
    <td>$no1</td>
    <td class='facname'>$item</td>
    <td>$pax</td>
    <td>$price</td>
    <td>$description</td>
    <td>$provide</td>
    <td><img src='data:image/*;base64,".base64_encode($gallery)."' style='width:100;height:100'/></td>
	<td align='center'><button class='delU' onclick='funcFDel(".$id.")'><i class='fas fa-trash-alt'></i></button></td>
	<td align='center'><button class='editU' onclick='funcFEdit(".$id.")'><i class='fas fa-edit'></i></button></td>
   </tr>
   
   <script>
   function funcFDel(ids)
   {
	location='6.Delete F Page.php?id='+ids;
   }
   
   function funcFEdit(ids)
   {
	location='7.Edit F Page.php?id='+ids;
   }
   </script>
   ";
   $no1++;
  }?>
  </table>
  
  <table id="factable" cellpadding="10px" cellspacing="15px">
  
  </table>
 </div>
 
 <div class="tab-content" id="customer">
  <div class="tab-search">
   Search Name: <input type="text" id="srhname2" onkeyup='srh2()' placeholder='Search Name...'>
   <span style="position:relative;left:20px">Search Email: <input type="text" id="srhmail2" onkeyup='srh2()' placeholder='Search Email...'></span>
  </div>
  <script>
  function srh2()
  {
   var srhname=document.getElementById('srhname2');
   var filter1=srhname.value.toUpperCase();
   var uslist=document.getElementsByClassName('uslist');
   var usname=document.getElementsByClassName('usname');
   var txtValue1;

   var srhmail=document.getElementById('srhmail2');
   var filter2=srhmail.value.toUpperCase();
   var usmail=document.getElementsByClassName('usmail');
   var txtValue2;
	
   for(var a=0;a<usname.length;a++)
   {
    txtValue1=usname[a].textContent||usname[a].innerText;
    txtValue2=usmail[a].textContent||usmail[a].innerText;
    if(txtValue1.toUpperCase().indexOf(filter1)>-1&&txtValue2.toUpperCase().indexOf(filter2)>-1)
    {
     uslist[a].style.display="";
    }
    else
    {
     uslist[a].style.display="none";
    }
   }
  }
  
  function sortTable2(n)
  {
   var table,switching,dir,rows,i,shouldSwitch,x,y,switchcount=0;
   table=document.getElementById("ustable");
   switching=true;
   dir="asc";
   while(switching)
   {
    switching=false;
    rows=table.rows;
    for(i=1;i<(rows.length-1);i++)
    {
     shouldSwitch = false;
     x=rows[i].getElementsByTagName("TD")[n];
     y=rows[i+1].getElementsByTagName("TD")[n];
     if(dir=="asc")
     {
      if(x.innerHTML.toLowerCase()>y.innerHTML.toLowerCase())
      {
       shouldSwitch=true;
       break;
      }
     }
     else if(dir=="desc")
     {
      if(x.innerHTML.toLowerCase()<y.innerHTML.toLowerCase())
	  {
       shouldSwitch=true;
       break;
      }
     }
    }
    if(shouldSwitch)
    {
     rows[i].parentNode.insertBefore(rows[i+1],rows[i]);
     switching=true;
     switchcount++;      
    }
    else
    {
     if(switchcount==0&&dir=="asc")
     {
      dir="desc";
      switching=true;
     }
    }
   }
  }
  </script>
  <?php
  echo"
  <table id='ustable' cellpadding='10px' cellspacing='15px'>
   <tr>
    <th>No.</th>
    <th>Customer Name <i class='fas fa-chevron-down' onclick='sortTable2(1)' id='down2'></i></th>
    <th>Email Address <i class='fas fa-chevron-down' onclick='sortTable2(2)' id='down3'></i></th>
    <th>Password</th>
    <th>Phone Number</th>
    <th>Gender</th>
    <th>Remove Account</th>
    <th>Update Account</th>
   </tr>
  ";
  $no2=1;
  $select2="select * from user order by id ASC";
  $query2=mysqli_query($con,$select2);
  while($row2=mysqli_fetch_array($query2,MYSQLI_ASSOC))
  {
   $user='user';
   $id=$row2['id'];
   $username=$row2['username'];
   $password=$row2['password'];
   $email=$row2['email'];
   $phonenumber=$row2['phonenumber'];
   $gender=$row2['gender'];
   echo"
   <tr class='uslist'>
    <td>$no1</td>
    <td class='usname'>$username</td>
    <td class='usmail'>$email</td>
    <td>$password</td>
    <td>$phonenumber</td>
    <td>$gender</td>
	<td align='center'><button class='delU' onclick='funcUDel(".$id.")'><i class='fas fa-trash-alt'></i></button></td>
	<td align='center'><button class='editU' onclick='funcUEdit(".$id.")'><i class='fas fa-edit'></i></button></td>
   </tr>
   
   <script>
   function funcUDel(ids)
   {
	location='6.Delete U Page.php?id='+ids;
   }
   
   function funcUEdit(ids)
   {
	location='7.Edit Page.php?id='+ids;
   }
   </script>
   ";
   $no1++;
  }?>
  </table>
 </div>
 <div class="tab-content" id="rental">
  <div class="tab-search">
   <span>Search Name: <input type="text" id="srhname3" onkeyup='srh3()' placeholder='Search Name...'></span>
   <span style="position:relative;left:20px">Search Contact: <input type="text" id="srhtact3" onkeyup='srh3()' placeholder='Search Contact...'></span>
   <span style="position:relative;left:40px">Search Email: <input type="text" id="srhmail3" onkeyup='srh3()' placeholder='Search Email...'></span>
   <span style="position:relative;left:60px"><input type="button" id="clear3" onclick="clear3()" value="clear"></span>
  </div>
  <table id="regtable" cellpadding="10px" cellspacing="15px">
  </table>
 </div>
 <script>
 $('.fa-chevron-down').click(function(){$('.fa-chevron-down').css('text-shadow','1px 1px 3px grey');$(this).css('text-shadow','1px 1px 5px #830F3E');});
 </script>
</body>
</html>