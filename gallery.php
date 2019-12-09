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
	include "imageC.php";
	$imageC=new imageC();
$image_list =$imageC->view_image();
$id_event1=$_POST['id_event'];
$nom_event=$_POST['nom'];
$date_event=$_POST['date'];


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
	<header class="header-section hs-border">
		<div class="header-warp">
			<a href="index.html" class="site-logo">
				<img width="150" height="100" src="img/logo1.png" alt="">
			</a>
			<ul class="main-menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="inc/profile.php">Profile</a></li>
				<li><a href="inc/logout.php">Logout</a></li>
				
			</ul>
		</div>
	</header>
	<!-- header section end -->


	
	<!-- Gallery slider section -->
	<section class="gallery-slider-section">
		<div class="sp-container">
			<h2 class="gallery-title"><?php echo $nom_event; ?></h2>
		</div>
		

		<div class="gallery-slider owl-carousel">
		<?php
		 
         foreach ($image_list as $row){
			
			if($row['id_event']===$id_event1)
			{
			    $imt =$row['lien'];
				$im = imagecreatefrompng($imt);
				
				
				$stamp= imagecreatefrompng('img/watermark.png');
				
				// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);


$imgx = imagesx($im);
$imgy = imagesy($im);
$centerX=round($imgx/2);
$centerY=round($imgy/2);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 

imagecopy($im, $stamp, (imagesx($im) - $sx)/2, (imagesy($im) - $sy)/2, 0, 0, imagesx($stamp), imagesy($stamp));



// Output and free memory
$f='img/'.$row['id_image'].'.png'; 

imagepng($im,$f);
imagedestroy($im);	




				
				
			
			

              
			?>
			
			
			
			<form id ="myForm" action="comment.php" method="POST">
			<input type="hidden" name="id_image" value="<?php echo $row['id_image']; ?>"  />
			<input type="hidden" name="lien" value="<?php echo $f ?>"  />
			<a href="#" onclick="document.getElementById('myForm').submit();">
			<div class="gallery-item">
		     
			
			    <img src="<?php echo $f; ?>" alt=""/>
				
				<h4><?php echo $row['nom']; ?> </h4>
				<p><br><?php echo $date_event; ?> </p>
				
				
				
				
				
			</div>
			</a>
			</form>
		<?php }} ?>
			
		</div>
	</section>
	<!-- Gallery slider section end -->

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
			<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
