<?php
	session_start();
//	phpinfo();
	//ini_set('session.save_path','/tmp/');
	//ini_set('session.gc_maxlifetime',21600);
	//echo md5('4M?c@3f&=XC#m?AS');
	 
	$maxlifetime = ini_get("session.gc_maxlifetime");

//echo $maxlifetime;
?>
<!DOCTYPE html>
<?php

	$error="";
	include("config.php");
	


	if(isset($_POST["username"])){

		if(empty($_POST["username"])||empty($_POST["password"]))
		{
			$error = "The username or password is empty";
		}
		else
		{
			$username=addslashes($_POST["username"]);
			$password=md5($_POST["password"]);
			$_SESSION["uname"]=$_POST["username"];


			//retrieve the real name
			/*$ret_sql="select telemarketer.first_name,telemarketer.last_name from telemarketer,station_details where telemarketer.station=station_details.station_id and station_details.username='".$_POST["username"]."'";
			$ret_result=mysql_query($ret_sql);
			$row=mysql_fetch_row($ret_result);
			$_SESSION["fname"]=$row[0]." ".$row[1];*/
			//validation for username and password
			 $sql="SELECT * FROM user WHERE username='$username' and password='$password' and status='active'";
			$result=mysql_query($sql);
			$row=mysql_fetch_row($result);
			$count=mysql_num_rows($result);
			//echo $row[1].$row[2];
		//	echo $count;



			//$_SESSION[uname]="3";

			 if($count==1)
			{
				if($row[3]=="telemarketer")
				{
					$url="main.php";
				}
				else if($row[3]=="approval")
				{
					$url="approval.php";
				}
				else if($row[3]=="external")
				{
					$url="verification.php";
				}
				else if($row[3]=="confirmation")
				{
					$url="confirmation.php";
					//$url="404";
				}
				else if($row[3]=="allocation")
				{
					$url="allocation.php";
				}

				else if($row[3]=="super")
				{
					$url="super_telemarketer.php";
				}
				else if($row[3]=="admin")
				{
					$url="admin.php";
				}
				else if($row[3]=="manager")
				{
					$url="manager.php";
				}
				/*else if($row[3]=="senior")
				{
					$url="seniorAllocation.php";
				}*/
				else if($row[3]=="credit")
				{
					$url="credit_manager_main";
					//$url="404";
				}
				else if($row[3]=="qa")
				{
					$url="qa_main";
					//$url="404";
				}
				else if($row[3]=="report")
				{
					$url="master_query";
				}
				else if($row[3]=="sourcedata")
				{
					$url="sourcedata_main";
				}
				else if($row[3]=="propertyadmin")
				{
					$url="stocklist_main";
				}
				else if($row[3]=="propertymanager")
				{
					$url="propertyManager_main";
					//$url="404";
				}
				else if($row[3]=="media")
				{
					$url="media_main";
				}
				else if ($row[3]=="junioradmin")
				{
					$url="juniorAdmin_main";
				}
				else if ($row[3]=="senioradmin")
				{
					$url="seniorAdmin_main";
				}
				else if ($row[3]=="seniormanager")
				{
					$url="seniorManager_main";
				}
				else if ($row[3]=="coordinator")
				{
					$url="coordinator_main";
				}
				else if ($row[3]=="creditsupport")
				{
					$url="refinance_dashboard_main";
				}
				else if ($row[3]=="quantum")
				{
					$url="quantum_main";
				}
				else if ($row[3]=="secondreview")
				{
					$url="secondReview_add_main";
				}
				else if ($row[3]=="preallocatormatrix")
				{
					$url="smsf_preAllocation";
				}
				else if ($row[3]=="allocatormatrix")
				{
					$url="smsf_allocation";
					//$url='404';
				}
				else if ($row[3]=="verificationmatrix")
				{
					$url="confirmation_smsf";
					//$url='404';
				}
				else if ($row[3]=="matrixadmin")
				{
					$url="matrixAdmin_main";
					//$url="404";
				}




				echo "<script>";
				echo "window.location.href='$url'";
				echo "</script>";
			}
			else
			{
				$error="The username or password is invalid";
				//echo "<script>get_redirect();</script>";
			}
		}



	}

?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<script src="jquery-1.11.3.js" type="text/javascript"></script>
		<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="jquery-addresspicker-master/src/jquery.ui.addresspicker.js"></script>
		<script src="jquery-ui/jquery-ui.js" type="text/javascript"></script>
		<script src="jquery-addresspicker-master/src/jquery.ui.addresspicker.js" type="text/javascript"></script>
		<script src='perfect-scrollbar/js/perfect-scrollbar.jquery.js'></script>
		<script src='clockpicker-gh-pages/clockpicker-gh-pages/dist/jquery-clockpicker.js'></script>
		<script src="autoNumeric/autoNumeric-2.0-BETA.js" type=text/javascript> </script>
		<script src="script.js" type="text/javascript"></script>
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css" />
		<link rel="stylesheet" href="jquery-ui/jquery-ui.css" type="text/css" />
		<link rel='stylesheet' href='perfect-scrollbar/css/perfect-scrollbar.css' />
		<link rel='stylesheet' href='clockpicker-gh-pages/clockpicker-gh-pages/dist/jquery-clockpicker.css' />
		<link rel="stylesheet" href="jquery-addresspicker-master/demos/themes/base/jquery.ui.all.css">
		<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
		<link rel="stylesheet" type="text/css" href="sweetalert2/dist/sweetalert2.css">
		<link rel="stylesheet" href="style.css" type="text/css" />
		<title>
			Pipeline
		</title>
		<script>
			$(document).ready(function(){
			//swal("We are moving forward!", "This website will be no longer available next week. All information will be tranferred to a new website to replace. Please seek your admin for help if you cannot remember your password ", "info");
		 });
		</script>
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
				<form method="post" action="index.php">
					<table>
						<tr>
							<td>Username</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="username" value=""/>
							</td>
						</tr>
						<tr>
							<td>Password</td>
						</tr>
						<tr>
							<td>
								<input type="password" name="password" value=""/>
							</td>
						</tr>
						<tr class="error-msg">
							<td>
								<?php echo $error;?>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="Sign in" class="all_button"/>

							</td>
						</tr>
						<tr style="height:32px;color:#4090fe;text-align:center">
							<td>
								<a href="telemarketer" target="_blank">Sign in as a telemarketer</a>
							</td>
						</tr>
						<tr style="height:32px;color:#4090fe;text-align:center">
							<td>
								<a href="pra" target="_blank">Sign in as a pra</a>
							</td>
						</tr>
						<tr style="height:32px;color:#4090fe;text-align:center">
							<td>
								<a href="senior" target="_blank">Sign in as a senior consultant</a>
							</td>
						</tr>
						<tr style="height:32px;color:#4090fe;text-align:center">
							<td>
								<a href="credit_login" target="_blank">Sign in as a credit officer</a>
							</td>
						</tr>
						<tr style="height:32px;color:#4090fe;text-align:center">
							<td>
								<a href="allocator_login" target="_blank">Sign in as an allocator</a>
							</td>
						</tr>
						<tr style="height:32px;color:#4090fe;text-align:center">
							<td>
								<a href="smsf_temporary_login" target="_blank">SMSF Workshop sign in</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
	</body>
</html>
