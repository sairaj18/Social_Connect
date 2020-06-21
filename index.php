<?php
	session_start();
	if(isset($_SESSION["user"]))
	{
		header('Location:profile.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP MySQL</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" type="text/css" href="static/index.css">
</head>
<body>
	<section class="logincontact" id="login">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="headerText text-center">
						<h2>LOGIN-REGISTER</h2>
					</div>
				</div>
			</div>
			<div class="row clearfix">
				<div class="offset-sm-2 col-sm-8">
					<form method="POST">
							<div class="form-group">
								<label>User Name</label>
								<input class="form-control" type="text" name="username" id="username"><br>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" type="password" name="password" id="password"><br>
							</div>
						</fieldset>
						<div class="form-group text-center">
							<button class="btn btnd4" id="btn1">REGISTER</button>
							<button class="btn btnd4"id="btn2">LOGIN</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ul class="sci">
						<li>
							<a href="#">
								<i class="fa fa-facebook"></i><!--use fontawesome icon -->
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-twitter"></i><!--use fontawesome icon -->
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-google-plus"></i><!--use fontawesome icon -->
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-linkedin"></i><!--use fontawesome icon -->
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-instagram"></i><!--use fontawesome icon -->
							</a>
						</li>
					</ul>
					<p class="cpryt">© Copyright 2020 AMFR | Template by <a href="#">sairaj</a></p>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript">
			
			$("#btn1").click(function(){
				var userName = document.getElementById("username").value;
				var pass = document.getElementById("password").value;
				if(userName=="" || pass=="")
				{
					var msg="Requried fields ";
					if(userName=="")
					{
						msg=msg.concat("UserName ");
					}
					if(pass=="")
					{
						msg=msg.concat("Password ");
					}
					alert(msg);
				}
				else
				{

					$.ajax({
			        
			        	type: "POST",
			        	url: 'php/register.php',
			        	data: {
			          			username: $("#username").val(),
			          			password: $("#password").val()
			        		},
			        	success:function(data)
			        	{
			        		if (data == "success	")
			        		{
			        			window.location.replace('profile.php');
			        		}
			        		else
			        		{
			        			alert('UserName already exist. Enter new UserName!!');
			        		}
			        	}
			    	});
				}
			});
			$("#btn2").click(function(){

				var userName = document.getElementById("username").value;
				var pass = document.getElementById("password").value;
				if(userName=="" || pass=="")
				{
					var msg="Requried fields ";
					if(userName=="")
					{
						msg=msg.concat("UserName ");
					}
					if(pass=="")
					{
						msg=msg.concat("Password ");
					}
					alert(msg);
				}
				else
				{
					$.ajax({
				        
				        type: "POST",
				        url: 'php/login.php',
				        data: {
				          username: $("#username").val(),
				          password: $("#password").val()
				        },
				        success: function(data)
			        	{
					          if (data === 'success!!') 
					          {
					          	window.location.replace('profile.php');
					          }
					          else 
					          {
					            alert("Wrong combination of username and password!");
					          }
			        	}
			    	});
				}
			});
	</script>
</body>
</html>