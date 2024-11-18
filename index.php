<?php
include 'includes/connect.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>Health Mate</title>
		
		<!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="css/nice-select.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- icofont CSS -->
	<link rel="stylesheet" href="css/icofont.css">
	<!-- Slicknav -->
	<link rel="stylesheet" href="css/slicknav.min.css">
	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Datepicker CSS -->
	<link rel="stylesheet" href="css/datepicker.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="css/animate.min.css">
	<!-- Magnific Popup CSS -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Medipro CSS -->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/responsive.css">

</head>

<body>

	<!-- Preloader -->
	<div class="preloader">
		<div class="loader">
			<div class="loader-outter"></div>
			<div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
	
		<!-- Header Area -->
		<header class="header" >
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-5 col-12">
							<!-- Contact -->
							<ul class="top-link">
								<li><a href="#">About</a></li>
								<li><a href="#">Doctors</a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
							<!-- End Contact -->
						</div>
						<div class="col-lg-6 col-md-7 col-12">
							<!-- Top Contact -->
							<ul class="top-contact">
								<li><i class="fa fa-phone"></i><a href="tel:+254792314330">0792 314 330</a></li>
								<li><i class="fa fa-envelope"></i><a href="mailto:devsolutions023@gmail.com">devsolutions023@gmail.com</a></li>
							</ul>
							<!-- End Top Contact -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<span class="blue">health</span><span class="black">mate</span>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li class="active"><a href="#">Home <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="index.html">Home Page</a></li>
												</ul>
											</li>
											<li><a href="#">Doctors </a></li>
											
											<li><a href="#">Blogs <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="blog-single.html">Blog Details</a></li>
												</ul>
											</li>
											<li><a href="contact.php">Contact Us</a></li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
							<div class="col-lg-2 col-12">
								<div class="get-quote">
									<a href="login.php" class="btn">Log In / Sign Up</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
		
		<!-- Slider Area -->
		<section class="slider">
			<div class="hero-slider">
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('img/slider2.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Get any <span>Treatment</span> At Your Own <span>Convinience!</span></h1>
									<p>Health Mate brings quality medical care to your home, offering convenient access to treatment without the need for clinic visits. From check-ups to specialized care, our service ensures you receive safe, personalized healthcare right at your doorstep.</p>
									<div class="button">
										<a href="register.php" class="btn">Join Us Today</a>
										<a href="#" class="btn primary">Learn More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('img/slider.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Get Your <span>Emergency</span> Responded To In <span>Seconds!</span></h1>
									<p>Our medical practitioners are always readdy on call to help you deal with your medical emergency. </p>
									<div class="button">
										<a href="register.php" class="btn">Join Us Today</a>
										<a href="#" class="btn primary">Learn More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Start End Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('img/slider3.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Your <span>Health</span> Delivered Fast And With <span>Care!</span></h1>
									<p>
									At Health Mate, your health is our priority. We deliver fast, reliable medical care directly to you, ensuring you receive the attention you need without delay. Our team combines efficiency with compassion, providing expert treatment in the comfort of your own home. Your health, delivered fast and with care.</p>
								<div class="button">
									<a href="register.php" class="btn">Join Us Today</a>
									<a href="#" class="btn primary">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slider -->
		</div>
	</section>
	<!--/ End Slider Area -->

	<!-- Start Schedule Area -->
	<section class="schedule">
		<div class="container">
			<div class="schedule-inner">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-12 ">
						<!-- single-schedule -->
						<div class="single-schedule first">
							<div class="inner">
								<div class="icon">
									<i class="fa fa-ambulance"></i>
								</div>
								<div class="single-content">
									<h4>Emergency Medical Response</h4>
									<p>Access immediate, professional medical help when you need it most. Our emergency team is on standby to provide fast responses, ensuring critical care reaches you in time.</p>
									<a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- single-schedule -->
						<div class="single-schedule middle">
							<div class="inner">
								<div class="icon">
									<i class="icofont-prescription"></i>
								</div>
								<div class="single-content">
									<h4>Online Consultations</h4>
									<p>Consult with certified healthcare professionals from the comfort of your home. Whether you need advice, a diagnosis, or follow-up care, our online platform brings expert care to your fingertips</p>
									<a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-12">
						<!-- single-schedule -->
						<div class="single-schedule last">
							<div class="inner">
								<div class="icon">
									<i class="icofont-ui-clock"></i>
								</div>
								<div class="single-content">
									<h4>Prescription & Medication Management</h4>
									<p>Manage all your prescriptions in one place. Request refills, track medication, and get reminders – all designed to make managing your health easier and stress-free.</p>
									<a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/End Start schedule Area -->

	<!-- Start Feautes -->
	<section class="Feautes section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>We Are Always Ready to Help You & Your Family</h2>
						<img src="img/section-img.png" alt="#">
						<p>Our services are available to fit your schedule. See our operational hours and reach out whenever you need support – our team is here for you.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-12">
					<!-- Start Single features -->
					<div class="single-features">
						<div class="signle-icon">
							<i class="icofont icofont-ambulance-cross"></i>
						</div>
						<h3>Emergency Help</h3>
						<p>Instant access to medical assistance for urgent needs. Our team is ready to respond to emergencies quickly and efficiently.</p>
					</div>
					<!-- End Single features -->
				</div>
				<div class="col-lg-4 col-12">
					<!-- Start Single features -->
					<div class="single-features">
						<div class="signle-icon">
							<i class="icofont icofont-medical-sign-alt"></i>
						</div>
						<h3>Enriched Pharmecy</h3>
						<p>Easily manage your prescriptions online. Get refills and updates directly through our platform.</p>
					</div>
					<!-- End Single features -->
				</div>
				<div class="col-lg-4 col-12">
					<!-- Start Single features -->
					<div class="single-features last">
						<div class="signle-icon">
							<i class="icofont icofont-stethoscope"></i>
						</div>
						<h3>Medical Treatment</h3>
						<p>Connect with healthcare professionals from anywhere. Schedule virtual consultations at your convenience.</p>
					</div>
					<!-- End Single features -->
				</div>
			</div>
		</div>
	</section>
	<!--/ End Feautes -->

	<!-- Start Fun-facts -->
	<div id="fun-facts" class="fun-facts section overlay">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Fun -->
					<div class="single-fun">
						<i class="icofont icofont-home"></i>
						<div class="content">
							<span class="counter">3468</span>
							<p>Hospital Rooms</p>
						</div>
					</div>
					<!-- End Single Fun -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Fun -->
					<div class="single-fun">
						<i class="icofont icofont-user-alt-3"></i>
						<div class="content">
							<span class="counter">557</span>
							<p>Specialist Doctors</p>
						</div>
					</div>
					<!-- End Single Fun -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Fun -->
					<div class="single-fun">
						<i class="icofont-simple-smile"></i>
						<div class="content">
							<span class="counter">4379</span>
							<p>Happy Patients</p>
						</div>
					</div>
					<!-- End Single Fun -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Fun -->
					<div class="single-fun">
						<i class="icofont icofont-table"></i>
						<div class="content">
							<span class="counter">32</span>
							<p>Years of Experience</p>
						</div>
					</div>
					<!-- End Single Fun -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Fun-facts -->

	<!-- Start Why choose -->
	<section class="why-choose section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>We Offer Different Services To Improve Your Health</h2>
						<img src="img/section-img.png" alt="#">
						<p>Health Mate offers accessible, comprehensive healthcare services, allowing you to consult doctors, manage prescriptions, order medications, and receive emergency assistance—all from home. Our platform enhances your experience with real-time insights, easy booking, and efficient communication tools.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-12">
					<!-- Start Choose Left -->
					<div class="choose-left">
						<h3>Who We Are</h3>
						<p>At Health Mate, we are committed to revolutionizing healthcare by combining cutting-edge technology with compassionate care. Our mission is to empower patients by providing easy access to essential medical services and to support healthcare professionals with efficient tools for managing patient needs. By integrating everything from consultations to emergency responses in one user-friendly platform, we ensure a seamless, holistic approach to healthcare.</p>
						<div class="row">
							<div class="col-lg-6">
								<ul class="list">
									<li><i class="fa fa-caret-right"></i>Emergency Assistance</li>
									<li><i class="fa fa-caret-right"></i>Virtual Consultations </li>
									<li><i class="fa fa-caret-right"></i>Prescription Management </li>
								</ul>
							</div>
							<div class="col-lg-6">
								<ul class="list">
									<li><i class="fa fa-caret-right"></i>Medication Delivery </li>
									<li><i class="fa fa-caret-right"></i>Real-time Health Insights </li>
									<li><i class="fa fa-caret-right"></i>User-Friendly Platform </li>
								</ul>
							</div>
						</div>
					</div>
					<!-- End Choose Left -->
				</div>
				<div class="col-lg-6 col-12">
					<!-- Start Choose Rights -->
					<div class="choose-right">
						<div class="video-image">
							<!-- Video Animation -->
							<div class="promo-video">
								<div class="waves-block">
									<div class="waves wave-1"></div>
									<div class="waves wave-2"></div>
									<div class="waves wave-3"></div>
								</div>
							</div>
							<!--/ End Video Animation -->
							<a href="https://www.youtube.com/watch?v=RFVXy6CRVR4" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
						</div>
					</div>
					<!-- End Choose Rights -->
				</div>
			</div>
		</div>
	</section>
	<!--/ End Why choose -->

	<!-- Start Call to action -->
	<section class="call-action overlay" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="content">
						<h2>Do you need Emergency Medical Care? Call 0792 314 330</h2>
						<p>Are you or your loved one in the need for urgent dire help. Reach out to us today via the hotline above !</p>
						<div class="button">
							<a href="tel:+254792314330" class="btn">Call Us Now</a>
							<a href="#" class="btn second">Learn More<i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Call to action -->

	<!-- Start portfolio -->
	<section class="portfolio section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>We Maintain Cleanliness Rules Inside Our Hospital</h2>
						<img src="img/section-img.png" alt="#">
						<p>Overall cleanliness is a matter of utmost importance in our institution</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-12">
					<div class="owl-carousel portfolio-slider">
						<div class="single-pf">
							<img src="img/pf1.jpg" alt="#">
							<a href="portfolio-details.html" class="btn">View Details</a>
						</div>
						<div class="single-pf">
							<img src="img/pf2.jpg" alt="#">
							<a href="portfolio-details.html" class="btn">View Details</a>
						</div>
						<div class="single-pf">
							<img src="img/pf3.jpg" alt="#">
							<a href="portfolio-details.html" class="btn">View Details</a>
						</div>
						<div class="single-pf">
							<img src="img/pf4.jpg" alt="#">
							<a href="portfolio-details.html" class="btn">View Details</a>
						</div>
						<div class="single-pf">
							<img src="img/pf1.jpg" alt="#">
							<a href="portfolio-details.html" class="btn">View Details</a>
						</div>
						<div class="single-pf">
							<img src="img/pf2.jpg" alt="#">
							<a href="portfolio-details.html" class="btn">View Details</a>
						</div>
						<div class="single-pf">
							<img src="img/pf3.jpg" alt="#">
							<a href="portfolio-details.html" class="btn">View Details</a>
						</div>
						<div class="single-pf">
							<img src="img/pf4.jpg" alt="#">
							<a href="portfolio-details.html" class="btn">View Details</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End portfolio -->

	<!-- Start service -->
	<section class="services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>We Offer Different Services To Improve Your Health</h2>
						<img src="img/section-img.png" alt="#">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="icofont icofont-ambulance-cross"></i>
						<h4><a href="service-details.html">Emergency Medical Response</a></h4>
						<p>Access immediate, professional medical help when you need it most. Our emergency team is on standby to provide fast responses, ensuring critical care reaches you in time.</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="icofont icofont-eye-alt"></i>
						<h4><a href="service-details.html">Online Consultations</a></h4>
						<p>Consult with certified healthcare professionals from the comfort of your home. Whether you need advice, a diagnosis, or follow-up care, our online platform brings expert care to your fingertips. </p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="icofont icofont-heart-alt"></i>
						<h4><a href="service-details.html">Prescription & Medication Management</a></h4>
						<p>Manage all your prescriptions in one place. Request refills, track medication, and get reminders – all designed to make managing your health easier and stress-free.</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="icofont icofont-prescription"></i>
						<h4><a href="service-details.html">Pharmacy & Delivery Services</a></h4>
						<p>Order medications with ease and have them delivered directly to your home. Our seamless pharmacy service ensures that essential treatments are just a few clicks away.</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="icofont icofont-stethoscope"></i>
						<h4><a href="service-details.html">Doctors' Schedule & Booking</a></h4>
						<p>Check availability and book appointments with our healthcare professionals. Our user-friendly scheduling system makes it easy to find the right time for your consultations.</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="icofont icofont-blood"></i>
						<h4><a href="service-details.html">Personalized Health Insights</a></h4>
						<p>Receive tailored health updates and insights directly on our platform. Stay informed and proactive about your health with data-driven, personalized care information.</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!--/ End service -->

	<!-- Pricing Table -->
	<section class="pricing-table section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>We Provide You The Best Treatment In Resonable Price</h2>
						<img src="img/section-img.png" alt="#">
						<p>At Healthmate we believe in making heatlthcare easily accessible to the general public</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- Single Table -->
				<div class="col-lg-4 col-md-12 col-12">
					<div class="single-table">
						<!-- Table Head -->
						<div class="table-head">
							<div class="icon">
								<i class="icofont icofont-stethoscope"></i>
							</div>
							<h4 class="title">General Consultations</h4>
							<div class="price">
								<p class="amount">1000<span>/ Per Visit</span></p>
							</div>
						</div>
						<!-- Table List -->
						<ul class="table-list">
							<li><i class="icofont icofont-ui-check"></i>Consultation call</li>
							<li><i class="icofont icofont-ui-check"></i>Prescription Allocation</li>
							<li class="cross"><i class="icofont icofont-ui-close"></i>Prescription Delivery</li>
							<li class="cross"><i class="icofont icofont-ui-close"></i>In-house visits</li>
						</ul>
						<div class="table-bottom">
							<a class="btn" href="#">Book Now</a>
						</div>
						<!-- Table Bottom -->
					</div>
				</div>
				<!-- End Single Table-->
				<!-- Single Table -->
				<div class="col-lg-4 col-md-12 col-12">
					<div class="single-table">
						<!-- Table Head -->
						<div class="table-head">
							<div class="icon">
								<i class="icofont icofont-blood"></i>
							</div>
							<h4 class="title">Specialized Consultation</h4>
							<div class="price">
								<p class="amount">2000<span>/ Per Visit</span></p>
							</div>
						</div>
						<!-- Table List -->
						<ul class="table-list">
							<li><i class="icofont icofont-ui-check"></i>Consultation call</li>
							<li><i class="icofont icofont-ui-check"></i>Prescription Allocation</li>
							<li><i class="icofont icofont-ui-check"></i>Prescription Delivery</li>
							<li class="cross"><i class="icofont icofont-ui-close"></i>In-house visits</li>
						</ul>
						<div class="table-bottom">
							<a class="btn" href="#">Book Now</a>
						</div>
						<!-- Table Bottom -->
					</div>
				</div>
				<!-- End Single Table-->
				<!-- Single Table -->
				<div class="col-lg-4 col-md-12 col-12">
					<div class="single-table">
						<!-- Table Head -->
						<div class="table-head">
							<div class="icon">
								<i class="icofont-heart-beat"></i>
							</div>
							<h4 class="title">One on One</h4>
							<div class="price">
								<p class="amount">4000<span>/ Per Visit</span></p>
							</div>
						</div>
						<!-- Table List -->
						<ul class="table-list">
							<li><i class="icofont icofont-ui-check"></i>Consultation call</li>
							<li><i class="icofont icofont-ui-check"></i>Prescription Allocation</li>
							<li><i class="icofont icofont-ui-check"></i>Prescription Delivery</li>
							<li><i class="icofont icofont-ui-check"></i>In-house visits</li>
						</ul>
						<div class="table-bottom">
							<a class="btn" href="#">Book Now</a>
						</div>
						<!-- Table Bottom -->
					</div>
				</div>
				<!-- End Single Table-->
			</div>
		</div>
	</section>
	<!--/ End Pricing Table -->



	<!-- Start Blog Area -->
	<section class="blog section" id="blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>Keep up with Our Most Recent Medical News.</h2>
						<img src="img/section-img.png" alt="#">
						<p>Get to read about our latest advancements and achievements in transforming the medical field</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Single Blog -->
					<div class="single-news">
						<div class="news-head">
							<img src="img/blog3.jpg" alt="#">
						</div>
						<div class="news-body">
							<div class="news-content">
								<div class="date">19 Nov, 2024</div>
								<h2><a href="blog-single.html">We have annnocuced our new product.</a></h2>
								<p class="text">You can finally get to enjoy our Web application that we have been working on for the past year. This is just to make access to medical personnel easier</p>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Single Blog -->
					<div class="single-news">
						<div class="news-head">
							<img src="img/blog2.jpg" alt="#">
						</div>
						<div class="news-body">
							<div class="news-content">
								<div class="date">15 Oct, 2024</div>
								<h2><a href="blog-single.html">Top five way for solving teeth problems.</a></h2>
								<p class="text">
									Top solutions for teeth problems: brush twice daily, floss regularly, limit sugar, visit dentist, and use mouthwash.</p>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Single Blog -->
					<div class="single-news">
						<div class="news-head">
							<img src="img/blog1.jpg" alt="#">
						</div>
						<div class="news-body">
							<div class="news-content">
								<div class="date">05 Aug, 2024</div>
								<h2><a href="blog-single.html">We provide highly needed health solutions.</a></h2>
								<p class="text">We provide essential health solutions with easy online access, ensuring convenience and quick support.</p>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Blog Area -->

	<!-- Start clients -->
	<div class="clients overlay">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="owl-carousel clients-slider">
						<div class="single-clients">
							<img src="img/client1.png" alt="#">
						</div>
						<div class="single-clients">
							<img src="img/client2.png" alt="#">
						</div>
						<div class="single-clients">
							<img src="img/client3.png" alt="#">
						</div>
						<div class="single-clients">
							<img src="img/client4.png" alt="#">
						</div>
						<div class="single-clients">
							<img src="img/client5.png" alt="#">
						</div>
						<div class="single-clients">
							<img src="img/client1.png" alt="#">
						</div>
						<div class="single-clients">
							<img src="img/client2.png" alt="#">
						</div>
						<div class="single-clients">
							<img src="img/client3.png" alt="#">
						</div>
						<div class="single-clients">
							<img src="img/client4.png" alt="#">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/Ens clients -->

	<!-- Start Appointment -->
	<section class="appointment">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>We Are Always Ready to Help You. Book An Appointment</h2>
						<img src="img/section-img.png" alt="#">
						<p>Fill in the form describing your concern and we will get back to you as soon as possible</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-12 col-12">
					<form class="form" action="processes.php" method="POST">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<input name="name" type="text" placeholder="Name">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<input name="email" type="email" placeholder="Email">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<input name="phone" type="text" placeholder="Phone">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<select name="department_id" id="department" class="form-control" onchange="filterDoctors()">
										<option value="">Select Department</option>
										<?php
										// Fetch departments from the database
										$sql = "SELECT DepartmentID, DepartmentName FROM departments";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
												echo "<option value='" . $row['DepartmentID'] . "'>" . $row['DepartmentName'] . "</option>";
											}
										}
										?>
									</select>
								</div>
							</div>

							<!-- Doctor Select -->
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<select name="doctor_id" id="doctor" class="form-control" onchange="selectDepartment()">
										<option value="">Select Doctor</option>
										<?php
										$sql = "SELECT doctors.DoctorID, doctors.DoctorName, departments.DepartmentName 
												FROM doctors 
												INNER JOIN departments ON doctors.DepartmentID = departments.DepartmentID";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
												echo "<option value='" . $row['DoctorID'] . "' data-department='" . $row['DepartmentID'] . "'>" . $row['DoctorName'] . "</option>";
											}
										}
										?>
									</select>
								</div>
							</div>

							<!-- Date Input -->
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<input type="text" name="date" placeholder="Date" id="datepicker">
								</div>
							</div>

							<!-- Message Input -->
							<div class="col-lg-12 col-md-12 col-12">
								<div class="form-group">
									<textarea name="message" placeholder="Write Your Message Here....."></textarea>
								</div>
							</div>

							<!-- Submit Button -->
							<div class="row">
								<div class="col-lg-5 col-md-4 col-12">
									<div class="form-group">
										<div class="button">
											<input name="submit-appointment" type="submit" class="btn" value="Get In Touch">
										</div>
									</div>
								</div>
								<div class="col-lg-7 col-md-8 col-12">
									<p>( We will confirm by a Text Message )</p>
								</div>
							</div>
						</div>
					</form>

					</div>
					<div class="col-lg-6 col-md-12 ">
						<div class="appointment-image">
							<img src="img/contact-img.png" alt="#">
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Appointment -->
		
		<?php
			include 'footer.php';
		?>
		
		<!-- jquery Min JS -->
        <script src="js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="js/easing.js"></script>
		<!-- Color JS -->
		<script src="js/colors.js"></script>
		<!-- Popper JS -->
		<script src="js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="js/steller.js"></script>
		<!-- Wow JS -->
		<script src="js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="js/main.js"></script>
		<script>
			function filterDoctors() {
    const departmentId = document.getElementById("department").value;

			// AJAX request to get doctors based on department
			fetch(`get_doctors.php?department_id=${departmentId}`)
				.then((response) => response.json())
				.then((data) => {
					const doctorSelect = document.getElementById("doctor");
					doctorSelect.innerHTML = '<option value="">Select Doctor</option>'; // Reset options
					data.forEach((doctor) => {
						doctorSelect.innerHTML += `<option value="${doctor.DoctorID}" data-department="${doctor.DepartmentID}">${doctor.DoctorName}</option>`;
					});
				});
		}

		function selectDepartment() {
			const doctorSelect = document.getElementById("doctor");
			const selectedDoctor = doctorSelect.options[doctorSelect.selectedIndex];
			const departmentId = selectedDoctor.getAttribute("data-department");

			// Auto-select the department
			const departmentSelect = document.getElementById("department");
			departmentSelect.value = departmentId;
		}
	</script>
</body>

</html>