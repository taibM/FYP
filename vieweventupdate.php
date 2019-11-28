<!DOCTYPE html>
<html lang="zxx">
<head>
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: inc/index.html');
	exit();
	
}
?>
<?PHP



include "eventC.php";

 $id_event=$_POST['id_event'];
 $nom=$_POST['nom'];
 $code=$_POST['code'];
 $date=$_POST['date'];
 $lieu=$_POST['lieu'];

 $eventC1=new eventC();
 $eventC1->update_event($id,$nom,$code,$date,$lieu);
 $eventC=new eventC();

$event_list =$eventC->view_event();
?>
	<title>The Look - Photo Gallery Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="Instyle Fashion HTML Template">
	<meta name="keywords" content="instyle, fashion, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>


	<!-- header section -->
	<header class="header-section">
		<div class="header-warp">
			<a href="index.html" class="site-logo">
				<img src="img/logo.png" alt="">
			</a>
			<ul class="main-menu">
                <li><a href="viewevent.php">Events</a></li>
                <li><a href="viewimage.php">Images</a></li>
				<li><a href="inc/profile.php">Profile</a></li>
				<li><a href="inc/logout.php">Logout</a></li>
				
			</ul>
		</div>
	</header>
	<!-- header section end -->

	<table border="1">
<td>event ID</td>
<td>Name </td>
<td>Code</td>
<td>Date</td>
<td>Place</td>
<td>Delete</td>
<td>Update</td>

<?php
    foreach ($event_list as $row){
?>
<tr>
    <td> <?PHP     echo $row['id_event']  ;   ?></td>
    <td> <?PHP     echo $row['nom']  ;   ?></td>
    <td> <?PHP     echo $row['code']  ;   ?></td>
    <td> <?PHP     echo $row['date']  ;   ?></td>
    <td> <?PHP     echo $row['lieu']  ;   ?></td>
    <td> <form method="POST" action="deleteevent.PHP" >         
            <input class="btn btn-primary"    type ="submit"  name="Submit" value="Delete"  >
            <input     type ="hidden" name="id_event" value="<?PHP  echo $row ['id_event'] ?> "  >
    </form>
</td>
            <td> <a class="site-btn" href="updateevent.php?CIN=<?PHP  echo $row ['id_event'] ;?>"> Update <img src="img/icons/arrow-right-black.png" alt=""></a></td>

            

</tr>

<?PHP 
}
?>
</table>

		



	

	

	<!-- Footer section  -->
	<footer class="footer-section spad">
		<div class="sp-container">
			<div class="row m-0">
				<div class="col-lg-4 footer-text">
					<h2>Get in touch</h2>
					<p>Pellentesque dictum nisl in nibh dictum volutpat nec a quam. Vivamus suscipit nisl quis nulla pretium, vitae ornare leo sollic itudin. Aenean quis velit pulvinar, pellentesque neque vel, laoreet orci. Suspendisse potenti. </p>
				</div>
				<div class="col-lg-8">
					<form class="contact-form">
						<div class="row">
							<div class="col-lg-4">
								<input type="text" placeholder="Your Name">
							</div>
							<div class="col-lg-4">
								<input type="text" placeholder="Your Email">
							</div>
							<div class="col-lg-4">
								<input type="text" placeholder="Subject">
							</div>
							<div class="col-lg-12">
								<textarea placeholder="Message"></textarea>
								<button class="site-btn sb-light" type="submit">send message <img src="img/icons/arrow-right-white.png" alt=""></button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="copyright">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
		</div>
	</footer>
	<!-- Footer section end -->
	
	
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>


	</body>
</html>
