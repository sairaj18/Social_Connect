<?php
function dash()
{
	include 'php/db.inc.php';
	$str='';

	$str.='<h2>Friends:</h2>';

	$sql = "SELECT friend_name from friends_details where username='".$_SESSION["user"]."'";
	$result = $conn->query($sql);
	while($row = $result->fetch_row())
	{
		$str.='<h4>'.$row[0].'</h4><br>';
	}

	$str.='<br><h2>Friend Requests:</h2>';
	$sql = "SELECT requester from request_details where requestee='".$_SESSION["user"]."'";
	$result1 = $conn->query($sql);
	while($row = $result1->fetch_row())
	{
		$str.='<h4>'.$row[0].'</h4>';
		$str.='<input type="submit" value="YES" name="yesbtn_'.$row[0].'" id="yesbtn_'.$row[0].'"/>&nbsp';
		$str.='<input type="submit" value="NO" name="nobtn_'.$row[0].'" id="nobtn_'.$row[0].'"/><br>';
	}
	$result1 = $conn->query($sql);
	while($row = $result1->fetch_row())
	{
		if(isset($_POST['yesbtn_'.$row[0]]))
		{
			$rqtr = $_SESSION["user"];
			$rqtr = mysqli_real_escape_string($conn,$rqtr);
			$rqtr = htmlentities($rqtr);

			$sql = "INSERT into friends_details(username,friend_name) VALUES('$rqtr','$row[0]')";
			$result = $conn->query($sql);
			$sql = "INSERT into friends_details(username,friend_name) VALUES('$row[0]','$rqtr')";
			$result = $conn->query($sql);
			$sql = "DELETE from request_details where requester='".$row[0]."' and requestee='".$_SESSION["user"]."'";
			$result = $conn->query($sql);
			header('Location:friends.php');
			break;
		}
		if(isset($_POST['nobtn_'.$row[0]]))
		{
			$sql = "DELETE from request_details where requester='".$row[0]."' and requestee='".$_SESSION["user"]."'";
			$result = $conn->query($sql);
			header('Location:friends.php');
			break;
		}
	}
	$str.='<br><h2>All Users:</h2>';
	$sql = "SELECT username from user_details where username not in(SELECT friend_name from friends_details  where username='".$_SESSION["user"]."' UNION SELECT requester from request_details where requestee='".$_SESSION["user"]."' UNION SELECT requestee from request_details where requester='".$_SESSION["user"]."') and username not in('".$_SESSION["user"]."')";
	$result = $conn->query($sql);
	while($row = $result->fetch_row())
	{
		$str.='<h4>'.$row[0].'</h4>';
		$str.='<input type="submit" value="ADD" name="btn_'.$row[0].'" id="btn_'.$row[0].'"/><br><br>';
	}
	$result = $conn->query($sql);
	while($row = $result->fetch_row())
	{
		if(isset($_POST['btn_'.$row[0]]))
		{
			$rqtr = $_SESSION["user"];
			$rqtr = mysqli_real_escape_string($conn,$rqtr);
			$rqtr = htmlentities($rqtr);

			$rqte = $row[0];
			$rqte = mysqli_real_escape_string($conn,$rqte);
			$rqte = htmlentities($rqte);
			$sql = "INSERT into request_details (requester, requestee) VALUES('$rqtr','$rqte')";
			$result = $conn->query($sql);
			header('Location:friends.php');
			break;
		}
	}

	return $str;
}
?>
<!Doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>friends Page</title>
</head>
<body>
	<h3>User Name :<?php session_start();echo $_SESSION["user"];?></h3>
<form method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class ="  row box col-md-4" >
<div style="color:black"><?php echo dash();?></div>
<div><?php if($_SESSION["user"]){?> <br>Click here to <a href="logout.php"><input type="button" value="LOGOUT" name="logout"></a>
	<?php
	}else echo "<h1>Please login first.</h1>";
	?></div>
	<div>
		<br><a href="profile.php"><input type="button" value="PROFILE"></a>
	</div>
</div>
</form>
</body>
</html>