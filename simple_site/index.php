<?php require ('Dolly.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MySite</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="style.css">	
</head>
<body>

	<header>
		<div class="header-container">
			<div class="logo">
				<img src="img/bolt.jpg" alt="KV-logo">
			</div>
			<input type="checkbox"  id="menu-checkbox">
			<nav role="navigation">
				<label for="menu-checkbox" class="toggle-button" data-open="MENU" data-close="CLOSE" onclick></label>
				<ul class="main-menu">
					<li><a href="#">HOME</a></li>
					<li><a href="#">PORTFOLIO</a></li>
					<li><a href="#">BLOG</a></li>
					<li><a href="#">ABOUT AS</a></li>
					<li><a href="#">CONTACT</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main>
		<section class="top-slide">
			<div class="top-container">
				<div><h1>I BELIEVE IN</h1></div>
				<div><h1>READY-MADE .PSD</h1></div>
				<div><p>DO WHAT YOU CAN, WITH WHAT </p></div>
				<div><p>YOU HAVE, WHERE YOU ARE</p></div>
				<div><p>Theodore Rooseveld</p></div>
			</div>
		</section>

		<section class="specialize">
			<div class="specialize-container">
				<h3>This is a project for demonstration</h3>
				<p>MADE IN USSR / KALANDARISHVILI V.V.</p>
				<div class="specialize-cards">
					
					<div class="card">
						<div class="topcard" >
						</div>
						<div class="botton-card">
							<p class="first-p">INTERFACE<br>  With PHP</p>
						</div>
					</div>
					<div class="card">
						<div class="topcard" >
						</div>
						<div class="botton-card">
							<p class="first-p">THROW<br>  With PHP</p>
						</div>
					</div>
					<div class="card">
						<div class="topcard" >
						</div>
						<div class="botton-card">
							<p class="first-p">PATTERN<br>  With PHP</p>
						</div>
					</div>
					<div class="card">
						<div class="topcard" >
						</div>
						<div class="botton-card">
							<p class="first-p">TRAIT<br>  With PHP</p>
						</div>
					</div>

				</div>
			</div>
		</section>
		<section class="portfolio">
			<h4>MY WORK</h4>
			<p><?php  Dolly::get_dolly();?></p>
			<div class="toggles">
			  <button id="all">SHOW ALL</button>
			  <button id="scr">JAVASCRIPT</button>
			  <button id="php">PHP & SQL</button>
			  <button id="css">HTML & CSS</button>
		  </div>
		  <div class="posts">
		  	<div class="post scr"><img src="img/seat_src.jpg" alt=""></div>
		  	<div class="post php"><img src="img/seat_php.jpg" alt=""></div>
		  	<div class="post scr"><img src="img/seat_src.jpg" alt=""></div>
		  	<div class="post css"><img src="img/seat_css.jpg" alt=""></div>
		  	<div class="post php"><img src="img/seat_php.jpg" alt=""></div>
		  	<div class="post css"><img src="img/seat_css.jpg" alt=""></div>

		  </div>
		</section>

		<sectiom class="brand-slider">
			<h4>SLIDER</h4>
			<p>Silence is golden.Silence is golden.Silence is golden.
			Silence is golden.Silence is golden.Silence is golden.</p>
			<div class="owl-carousel">
				<!-- owlcarousel2 -->
				<div><img src="img/Client-1.png" alt=""></div>
				<div><img src="img/Client-2.png" alt=""></div>
				<div><img src="img/Client-3.png" alt=""></div>
				<div><img src="img/Client-4.png" alt=""></div>
				<div><img src="img/Client-5.png" alt=""></div>
				<div><img src="img/Client-1.png" alt=""></div>
				<div><img src="img/Client-2.png" alt=""></div>
				<div><img src="img/Client-3.png" alt=""></div>
				<div><img src="img/Client-4.png" alt=""></div>
				<div><img src="img/Client-5.png" alt=""></div>
				<div><img src="img/Client-1.png" alt=""></div>
				<div><img src="img/Client-2.png" alt=""></div>
				<div><img src="img/Client-3.png" alt=""></div>
				<div><img src="img/Client-4.png" alt=""></div>
				<div><img src="img/Client-5.png" alt=""></div>
				
			</div>
		</sectiom>
		
	</main>

	<footer>
		<div class="footer-container">
			<div class="about-us">
				<h4>About us</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ipsa dolores libero cum illum. Vel cumque doloribus voluptatibus eaque!</p>
				<a href="#">News</a>
				<h4>Photo Stream</h4>
				<div class="images">
					<img src="img/p-1.png" alt="">
					<img src="img/p-2.png" alt="">
					<img src="img/p-3.png" alt="">
					<img src="img/p-4.png" alt="">
				</div>
			</div>
			<div class="tweets">
				<h4>Lattest Tweets</h4>
				<p><img src="img/Twitter-icon.png" alt=""><span>Silence</span> is golden.Silence is golden.</p>
				<p><img src="img/Twitter-icon.png" alt="">Silence <span>is golden</span>.Silence is golden.</p>
				<p><img src="img/Twitter-icon.png" alt="">Silence is golden.Silence is golden.</p>
				<p><img src="img/Twitter-icon.png" alt="">Silence <span>is golden</span>.Silence is golden.</p>
				<p><img src="img/Twitter-icon.png" alt="">Silence is golden.<span>Silence is</span> golden.</p>
				<h4>Social Connecting</h4>
				<p>
					<img src="img/twitter.png" alt="">
					<img src="img/google-plus.png" alt="">
					<img src="img/facebook.png" alt="">
				</p>
			</div>
			<div class="contacts">
				<h4>Contact info</h4>
			</div>
		</div>
	</footer>
	
	
  
	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="owlcarousel/owl.carousel.min.js"></script>
	<script src="js/script.js"></script>
	
</body>
</html>