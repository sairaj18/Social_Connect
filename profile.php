<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" type="text/css" href="static/profile.css">
</head>
<body data-spy="scroll" date-target=".navbar" data-offset="50">
	<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
				<div class="container">
				  <a class="navbar-brand" href="#"><?php echo 'USER NAME : '.$_SESSION["user"];?></a>
				  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav ml-lg-auto">
				      <li class="nav-item">
				        <a class="nav-link" href="friends.php">FRIENDS<span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <?php if($_SESSION["user"]){echo '<a class="nav-link" href="logout.php">LOGOUT</a>';}
				        else{ header('Location:index.php');}?>
				      </li>
				    </ul>
				  </div>
				</div>
			</nav>
		</header>
		<section class="logincontact">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="content">
							<?php
								include 'php/db.inc.php';
								$sql = "SELECT friend_name from friends_details where username='".$_SESSION["user"]."'";
								$result = $conn->query($sql);
								while($row = $result->fetch_row())
								{
									$sql = "SELECT content from posts_details where author='".$row[0]."' order by cur_time DESC";
									$result1 = $conn->query($sql);
									$row1 = $result1->fetch_row();
									echo '<h5> ***********Update from '.$row[0].'***********</h3>';
									echo '<h5> '.$row1[0].'</h4><br><br>'; 
								}
							?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="headerText text-center">
							<h5>Post a new update</h5>			
						</div>
						<form>
							<div class="form-group">
								<textarea class="from-control" id="myupdate"></textarea>
							</div>
							<div class="form-group">
								<button class="btn btnd4" id="post">POST</button>
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
		$(document).ready(function(){


			$("#post").click(function(){

				var up = document.getElementById("myupdate").value;
				if(up=="")
				{
					alert("post cannot be empty");
				}
				else
				{
					$.ajax({
			        
			        	type: "POST",
			        	url: 'php/posts.php',
			        	data: {
			          			myupdate: $("#myupdate").val()
			        		},
			        	success:function(data)
			        	{
			        		if (data == "success")
			        		{
			        			alert('post updated');
			        			window.location.replace('profile.php');
			        		}
			        		else
			        		{
			        			alert('post not updated');
			        		}
			        	}
			    	});
				}
			});
		});
	</script>
</body>
</html>