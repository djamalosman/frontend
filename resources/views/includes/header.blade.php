 <!-- Preloader Start -->
 <div id="preloader-active">
	<div class="preloader d-flex align-items-center justify-content-center">
		<div class="preloader-inner position-relative">
			<div class="text-center">
				<img src="{{ asset('assets/imgs/theme/loading.gif')}}" alt="jobhub" />
			</div>
		</div>
	</div>
</div>
<header class="header sticky-bar">
	<div class="container">
		<div class="main-header">
			<div class="header-left">
				<div class="header-logo">
					<a href="index.html" class="d-flex"><img alt="jobhub" src="{{ asset('assets/imgs/theme/jobhub-logo.svg')}}" /></a>
				</div>
				<div class="header-nav">
					<nav class="nav-main-menu d-none d-xl-block">
						<ul class="main-menu">
							<li class="has">
								<a class="active" href="{{route('welcome')}}">Home</a>
							</li>
							<li class="has">
								<a href="{{route('companybrief')}}">Company brief</a>
							</li>
							<li class="has">
								<a href="{{route('visimisi')}}">Vision and mission</a>
							</li>
							<li class="has">
                                <a href="{{route('traningcourse')}}">Training / Course</a>
							</li>
							<li class="has">
								<a href="{{route('jobvacancy')}}">Browse Jobs</a>
							</li>
							<li class="has">
								<a href="employers-grid.html">News & Update</a>
							</li>
							<li class="has">
								<a href="employers-grid.html">Contact</a>
							</li>
						</ul>
					</nav>
					<div class="burger-icon burger-icon-white">
						<span class="burger-icon-top"></span>
						<span class="burger-icon-mid"></span>
						<span class="burger-icon-bottom"></span>
					</div>
				</div>
			</div>

		</div>
	</div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
	<div class="mobile-header-wrapper-inner">
		<div class="mobile-header-top">
			<div class="user-account">
				<img src="{{ asset('assets/imgs/avatar/ava_1.png')}}" alt="jobhub" />
				<div class="content">
					<h6 class="user-name">Howdy, <span class="text-brand">AliThemes</span></h6>
					<p class="font-xs text-muted">You have 2 new messages</p>
				</div>
			</div>
			<div class="burger-icon burger-icon-white">
				<span class="burger-icon-top"></span>
				<span class="burger-icon-mid"></span>
				<span class="burger-icon-bottom"></span>
			</div>
		</div>
		<div class="mobile-header-content-area">
			<div class="perfect-scroll">

				<div class="mobile-menu-wrap mobile-header-border">
					<!-- mobile menu start -->
					<nav>
						<ul class="mobile-menu font-heading">
							<li class="has">
								<a class="active" href="{{route('welcome')}}">Home</a>
							</li>
							<li class="has">
								<a href="employers-grid.html">About Us</a>
							</li>
							<li class="has">
								<a href="{{route('visimisi')}}">Vision and mission</a>
							</li>
							<li class="has">
								<a href="{{route('traningcourse')}}">Training / Course</a>
							</li>
							<li class="has">
								<a href="{{route('jobvacancy')}}">Browse Jobs</a>
							</li>
							<li class="has">
								<a href="employers-grid.html">News & Update</a>
							</li>
							<li class="has">
								<a href="employers-grid.html">Contact</a>
							</li>
						</ul>
					</nav>
					<!-- mobile menu end -->
				</div>
				<div class="mobile-account">
					<h6 class="mb-10">Your Account</h6>
					<ul class="mobile-menu font-heading">
						<li><a href="#">Profile</a></li>
						<li><a href="#">Work Preferences</a></li>
						<li><a href="#">My Boosted Shots</a></li>
						<li><a href="#">My Collections</a></li>
						<li><a href="#">Account Settings</a></li>
						<li><a href="#">Go Pro</a></li>
						<li><a href="#">Sign Out</a></li>
					</ul>
				</div>
				<div class="mobile-social-icon mb-50">
					<h6 class="mb-25">Follow Us</h6>
					<a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt="jobhub" /></a>
					<a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg')}}" alt="jobhub" /></a>
					<a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt="jobhub" /></a>
					<a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest.svg')}}" alt="jobhub" /></a>
					<a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-youtube.svg')}}" alt="jobhub" /></a>
				</div>
				<div class="site-copyright">Copyright 2022 © JobHub. <br />Designed by AliThemes.</div>
			</div>
		</div>
	</div>
</div>
<!--End header-->
