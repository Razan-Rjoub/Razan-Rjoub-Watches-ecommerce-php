<?php
// Start or resume the session
session_start();
?>
<header>
	<!-- Header desktop -->
	<div class="container-menu-desktop">
		<!-- Topbar -->
		<!-- <div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a>
					</div>
				</div>
			</div> -->

		<div class="wrap-menu-desktop">
			<nav class="limiter-menu-desktop container">

				<!-- Logo desktop -->
				<a href="#" class="logo">
				<img src="../watch2.png" alt="IMG-LOGO">
				</a>

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li >
							<a href="../yousef/home.php">Home</a>
							<!-- <ul class="sub-menu">
									<li><a href="index.html">Homepage 1</a></li>
									<li><a href="home-02.html">Homepage 2</a></li>
									<li><a href="home-03.html">Homepage 3</a></li>
								</ul> -->
						</li>

						<li class="active-menu">
							<a href="product_copy.php">Shop</a>
						</li>

						<!-- <li class="label1" data-label1="hot">
								<a href="shoping-cart.html">Features</a>
							</li> -->

						<!-- <li>
								<a href="blog.html">Blog</a>
							</li> -->

						<li>
							<a href="../yousef/about.php">About</a>
						</li>

						<li>
							<a href="../yousef/contact.php">Contact</a>
						</li>
					</ul>
				</div>

				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m">
					<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div> -->
					<a href="../cart/shoping-cart.php">
					<?php

// Check if the user is logged in
// if (isset($_SESSION['loginstatus']) && $_SESSION['loginstatus'] == 1) {
	// User is logged in, check if userid cookie is set
	if (isset($_COOKIE['userid'])) {
		$user_id = $_COOKIE['userid'];

		// Fetch cart count from the database
		$query = "SELECT COUNT(*) AS cart_count FROM cart WHERE customerid = ?";
		$stmt = $pdo->prepare($query);
		$stmt->bindParam(1, $user_id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		$cart_count = $result['cart_count'];
	} else {
		// User is logged in but userid cookie is not set, handle accordingly
		$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
	}
// } else {
// 	// User is not logged in, get cart count from session
// 	$cart_count = isset($_SESSION['session_id_cart']) ? count($_SESSION['session_id_cart']) : 0;
// }

// Display the cart count
?>

<!-- Icon header -->
<div class="wrap-icon-header flex-w flex-r-m">
	<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search" data-notify="2">
			<i class="zmdi zmdi-search"></i>
		</div> -->
	<a href="../cart/shoping-cart.php">
		<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
			data-notify="<?php echo $cart_count ?>">
			<i class="zmdi zmdi-shopping-cart"></i>

		</div>
					</a>
					<a href="#favourites" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 "
						data-notify="0"><!--  icon-header-noti   -->
						<i class="zmdi zmdi-favorite-outline"></i>
					</a>

					<ul class="main-menu">
						<?php if (isset($_COOKIE['userid'])): ?>
							<li>
								<a href="../sara/profile_info.php">Profile</a>
							</li>
							<li>
								<a href="../yousef/logout.php">Logout</a>
							</li>
						<?php else: ?>
							<li>
								<a href="../sara/login.php">Login</a>
							</li>
							<li>
								<a href="../sara/registration.php">Register</a>
							</li>
						<?php endif; ?>
					</ul>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap-header-mobile">
		<!-- Logo moblie -->
		<div class="logo-mobile">
			<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15">
			<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div> -->

			<a href="cart.php">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="44">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</a>

			<a href="#favourites" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="0">
				<i class="zmdi zmdi-favorite-outline"></i>
			</a>
		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>


	<!-- Menu Mobile -->
	<div class="menu-mobile">
		<!-- <ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul> -->

		<ul class="main-menu-m">
			<li>
				<a href="home.php">Home</a>
				<!-- <ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul> -->
				<span class="arrow-main-menu-m">
					<i class="fa fa-angle" aria-hidden="true"></i>
				</span>
			</li>

			<li>
				<a href="product.php">Shop</a>
			</li>

			<!-- <li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li> -->

			<!-- <li>
					<a href="blog.html">Blog</a>
				</li> -->

			<li>
				<a href="about.html">About</a>
			</li>

			<li>
				<a href="contact.html">Contact</a>
			</li>
		</ul>
	</div>

	<!-- Modal Search -->
	<!-- <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="/cozastore-master/imags/img-men-watches/Capture.PNG" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div> -->
</header>

<!-- Cart -->
<!-- <div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>

				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html"
							class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html"
							class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->