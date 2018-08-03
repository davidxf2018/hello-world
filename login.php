<?php
	session_start();
//	phpinfo();
	//ini_set('session.save_path','/tmp/');
	//ini_set('session.gc_maxlifetime',21600);
?>
<!DOCTYPE html>
<?php
	
	$error="";
	include("config.php");

	
	
	if(isset($_POST["telename"]))
	{

		$_SESSION["telename"]=$_POST["telename"];	 
		echo "<script>";  
		echo "window.location.href='main.php'";
		echo "</script>";
	}
	
		
		 
	
	
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		
		
		<link rel="stylesheet" href="style.css" type="text/css" />
		<title>
			Pipeline
		</title>
		
	</head>
	<body>

<?php 

?>
	
		<div id="signin-main">
			<div id="logo">
				<img width="300px" height="180px" src="img/wealthfirstgrouplogo.jpg"/>
			</div>
			<div>
				<h2> Welcome to pipeline CRM system</h1>
			</div>
			<div id="form">
				<form method="post" action="">
					<table>
						<tr>
							<td>Login as:</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="telename" value=""/>
							</td>
						</tr>
						
						<tr>
							<td>
								<input type="submit" value="Log in" id="signin_submit""/>
								
							</td>
						</tr>
					</table>
				</form>
			</div>
	</body>
</html>