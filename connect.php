<html>
<head>
	<title>FOOD DONATION SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	<header class="header">
	<nav class="navbar navbar-style">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gn">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a href=""><img class="logo" src="logo.PNG">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: darkorange; font-size:74px">NO HUNGER</b></a>
			</div>
			<div class="collapse navbar-collapse" id="gn">

			<ul class="nav navbar-nav navbar-right" style="margin-top: 35px">

			<li role="presentation" class="active"><a href="index.html"><b>Home</b></a></li>
			<li role="presentation"><a href="searching_food.php"><b>Searching Food</b></a></li>
			
			<li role="presentation"><a href="food_donation.php"><b>Food Donation</b></a></li>
			<li role="presentation"><a href="contact_us.html"><b>contact us</b></a></li>
			</ul>

		</div>
	</div>
</nav>

<?php 
if(isset($_POST['sub']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$state=$_POST['state'];
	$district=$_POST['district'];
	$address=$_POST['address'];
	$foodtype=$_POST['foodtype'];

	$conn = new mysqli('localhost','root','','food_donation');
	if ($conn->connect_error) 
	{
		# code...
		die('connection Failed :'.$conn->connect_error);
	}
	else
	{
		$stmt=$conn->prepare("insert into donar(name,email,state,district,address,foodtype) values(?,?,?,?,?,?)");
		$stmt->bind_param("ssssss",$name, $email, $state, $district, $address, $foodtype);
		$stmt->execute();
	?>
		<h3><center><p><b>Thanks for providing foods to us.....your donated food is sends for needers</b></p></center></h3>
	<?php
		$stmt->close();
		$conn->close();
	}
}
?>