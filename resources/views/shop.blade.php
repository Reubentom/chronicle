<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Chronicle Education Category Bootstrap Responsive website Template | Shop Catalogue :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Chronicle Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<!-- shop css -->
	<link href="css/shop.css" type="text/css" rel="stylesheet" media="all">
	<!-- checkout css -->
	<link href="css/checkout.css" type="text/css" rel="stylesheet" media="all">
	<!-- Range-slider-css -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- common-css -->
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet">

	<!-- //Custom Theme files -->
	<!-- online-fonts -->
	<!-- logo -->
	<link href="//fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
	<!-- titles -->
	<link href="//fonts.googleapis.com/css?family=Merriweather+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
	<!-- body -->
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<!-- //online-fonts -->
</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<div id="home">
		<!-- //banner -->
		<!-- breadcrumbs -->
		@include('theme')
		<div class="crumbs text-center">
			<div class="container">
				<div class="row">
					<ul class="btn-group btn-breadcrumb bc-list">
						<li class="btn btn1">
							<a href="index.html">
								<i class="glyphicon glyphicon-home"></i>
							</a>
						</li>
						<li class="btn btn2">
							<a href="/shop">product catalogue</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--//breadcrumbs ends here-->
		<!-- Shop -->
		<div class="innerf-pages section">
			<div class="container-cart">
				<!-- product left -->
				<div class="side-bar col-md-3">
					<!--preference -->
					
					<!-- // preference -->
					<div class="search-hotel">
						<h3 class="shopf-sear-headits-sear-head">
							<span>search</span> with title</h3>
						<form action="searchbook" method="post">
							<input type="search" placeholder="search here" name="search" required>
							<input type="submit" value="Search">
						</form>
					</div>
					<!-- price range -->
					
					<!-- //price range -->
					<!--preference -->
					
					<!-- // preference -->
					<!-- discounts -->
					
					<!-- //Binding -->
					<!-- discounts -->
					

				</div>
				<!-- //product left -->
				<!-- product right -->
				<div class="left-ads-display col-md-9">
					<div class="wrapper_top_shop">
						
							<!-- //row1 -->
							<!-- row2 -->
							@foreach($books as $book)
							
							
							<div class="col-md-4 product-men women_two">
								<div class="product-chr-info chr">
									<div class="thumbnail">
										<a href="p/{{$book->id}}/singleproduct">
											<img src=images/{{$book->imgsrc}}  alt="">
										</a>
									</div>
									<div class="caption">
										<h4>{{$book->title}}</h4>
										<p>{{$book->author}}</p>
										<p>{{$book->publisher}}</p>
										<div class="matrlf-mid">
											<ul class="rating">
												<li>
													<a href="#">
														<span class="fa fa-star yellow-star" aria-hidden="true"></span>
													</a>
												</li>
												<li>
													<a href="#">
														<span class="fa fa-star yellow-star" aria-hidden="true"></span>
													</a>
												</li>
												<li>
													<a href="#">
														<span class="fa fa-star yellow-star" aria-hidden="true"></span>
													</a>
												</li>
												<li>
													<a href="#">
														<span class="fa fa-star yellow-star" aria-hidden="true"></span>
													</a>
												</li>
												<li>
													<a href="#">
														<span class="fa fa-star gray-star" aria-hidden="true"></span>
													</a>
												</li>
											</ul>
											<ul class="price-list">
												<li>$ {{$book->cost}}</li>
												<li>
													
												</li>
											</ul>

											<div class="clearfix"> </div>
										</div>
										<form action="/addtocart" method="post">
											<input type="hidden" name="bid" value="{{$book->id}}">

											
											<button type="submit" class="chr-cart pchr-cart">Add to cart
												<i class="fa fa-cart-plus" aria-hidden="true"></i>
											</button>
											<a href="#" data-toggle="modal" data-target="#myModal1"></a>
										</form>
									</div>
								</div>
								
							</div>
							
							
							
							@endforeach
							
							
							
							<!-- //row2 -->
							<!-- row3 -->
							
								
							
							
							<!-- //row3 -->
						
							<div class="clearfix"></div>
							<div class="clearfix"></div>
					

						

					

				
				
              
				 

				 </div>
				 </div>
				</div>
				</div>
				</div>
				
			
</div>
		
		<!--// Shop -->
 <!-- footer -->
 <div class="footer-bottom section">
	<div class="container">
	
</div>
<!-- //home -->
	<!-- js -->
	<!-- Common js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!--// Common js -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		chr.render();

		chr.cart.on('new_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<!-- price range (top products) -->
	<script src="js/jquery-ui.js"></script>
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<!-- dropdown nav -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //dropdown nav -->
	<!--search jQuery-->
	<script src="js/main.js"></script>
	<!--search jQuery-->

	<!-- Scrolling Nav JavaScript -->
	<script src="js/scrolling-nav.js"></script>
	<!-- //fixed-scroll-nav-js -->
	<!--//scripts-->

	<script src="js/bootstrap.js"></script>
	<!-- start-smoth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- here stars scrolling icon -->
	<script>
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

</body>

</html>