<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Chronicle Education Category Bootstrap Responsive website Template | Checkout :: w3layouts</title>
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
    @include('theme')
        <!-- //banner -->
        <!-- breadcrumbs -->
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
                            <a href="shop.html">Product Catalogue</a>
                        </li>
                        <li class="btn btn3 btn3a">
                            <a href="single_product.html">Single product</a>
                        </li>
                        <li class="btn btn4">
                            <a href="checkout.html">Checkout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--//breadcrumbs ends here-->
        <!--checkout-->
        <div class="innerf-pages section">
            <div class="container">
                <div class="privacy about">
                    <h4 class="rad-txt">
                        <span class="abtxt1">review</span>
                        <span class="abtext">your order</span>
                    </h4>

                    <div class="checkout-right">
                    <?php
                    $count=0;
                    $cost=0;
                    ?>
                        <h4>Your shopping cart contains:
                            <span>@foreach($cartitem as $item)
                            <?php
                            $count=$count+1;
                            $cost=$cost+($item->cost*$item->book_qty);
                            ?>
                            @endforeach
                            {{$count}} Books


                            </span>

                        </h4>
                        <table class="timetable_sub table-responsive">
                            <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Product Name</th>

                                    <th>Price</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sno=0; ?>
                            @foreach($cartitem as $item)
                                <tr class="rem1">
                                <?php $sno=$sno+1; ?>
                                    <td class="invert">{{$sno}}</td>
                                    <td class="invert-image">
                                        <a href="single_product.html">
                                            <img src="images/{{$item->imgsrc}}" alt=" " class="img-responsive">
                                        </a>
                                    </td>
                                    <td class="invert">
                                        <div class="quantity">
                                            <div class="quantity-select">
                                            <a href="/subqty/{{$item->id}}/cart"><div class="entry value-minus">&nbsp;</div></a>
                                                <div class="entry value">
                                                    <span>{{$item->book_qty}}</span>
                                                </div>
                                               <a class="entry value-plus " href="/addqty/{{$item->id}}/cart"> <div >&nbsp;</div></a>
                                               
                                            </div>
                                        </div>
                                    </td>
                                    <td class="invert">{{$item->title}}</td>

                                    <td class="invert">{{$item->cost*$item->book_qty}}</td>
                                    <td class="invert">
                                        <div class="rem">
                                            <a href="/deletefromcart/{{$item->id}}"> <div class="close1"> </div></a>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                                

                            </tbody>
                        </table>
                    </div>
                    <div class="checkout-left">
                        <div class="col-md-4 checkout-left-basket">
                            <h4>Continue to basket</h4>
                            <ul>
                            @foreach($cartitem as $item)
                                <li>{{$item->title}}
                                    <i>-</i>
                                    <span>{{$item->cost*$item->book_qty}}</span>
                                </li>
                                @endforeach
                                
                                <li>Total
                                    <i>-</i>
                                    <span>{{$cost}}</span>
                                </li>
                                <li>
                                <div class="sub">
                                    <form method=post action="/chck">
                                    <input type="text" name=cost value="{{$cost}}" hidden>

                                <input type="submit" class="btn-success" value="checkout"></form>
                            </div>
                            </li>

                                
                            </ul>
                        </div>
                        
                        
                            
                       
                    </div>
                       

                        <div class="clearfix"> </div>

                    </div>

                </div>

            </div>
        </div>
        <!--//checkout-->
        <!-- footer -->
        <div class="footer-bottom section">
            <div class="container">
                <!-- newsletter -->
                <div class="subscribe-main section-w3layouts text-center">
                    <h4 class="rad-txt">
                        <span class="abtxt1">keep yourself</span>
                        <span class="abtext">updated</span>
                    </h4>
                    <h5>subscribe to our newsletter to stay up-to-date with our projects.</h5>
                    <div class="subscribe-form">
                        <form action="#" method="post" class="subscribe_form">
                            <div class="email-news">
                                <input type="email" placeholder="Email" required="">
                            </div>
                            <div class="sub-news">
                                <input type="submit" value="subscribe">
                            </div>
                        </form>
                        <div class="clearfix"> </div>
                    </div>
                    <p>We respect your privacy.No spam ever!</p>
                </div>
                <!-- //newsletter ends here -->
                <!-- footer grids-->
                <div class="footer-cpy">
                    <!-- footer-grid1 -->
                    <div class="col-md-3 col-sm-6 footer-logo">
                        <h3>
                            <a href="index.html">Chronicle</a>
                        </h3>
                        <h4>about us</h4>
                        <p>Vallis Molestie Arcu Morbi Dapibus Suscipit Ante Sit Efficitur Eu estie Arcu Mor Anestie Ate Vesti.</p>
                    </div>
                    <!-- //footer-grid1 -->
                    <!-- footer-grid2 -->
                    <div class="col-md-3 col-sm-6 footer-nav text-center">
                        <h4>navigation</h4>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="about.html">About us</a>
                            </li>
                            <li>
                                <a href="shop.html">shop</a>
                            </li>
                            <li>
                                <a href="contact.html">contact us</a>
                            </li>
                        </ul>
                    </div>
                    <!-- //footer-grid2 -->
                    <!-- footer-grid3 -->
                    <div class="col-md-3 col-sm-6 blog-footer">
                        <h4>latest from blog</h4>
                        <div class="blog1">
                            <div class="col-md-3 col-sm-3 col-xs-2 bl1">
                                <a href="#">
                                    <img src="images/b1.jpg" alt="" class="img-responsive" />
                                </a>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-10 bl2">
                                <a href="#">Dapibus Suscipit Ante Sit by instagram</a>
                                <p>February 15, 2018</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="blog1">
                            <div class="col-md-3 col-sm-3 col-xs-2 bl1">
                                <a href="#">
                                    <img src="images/b2.jpg" alt="" class="img-responsive" />
                                </a>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-10 bl2">
                                <a href="#">Dapibus Suscipit Ante Sit by instagram</a>
                                <p>February 20, 2018</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- //footer-grid3 -->
                    <!-- footer-grid4 -->
                    <div class="col-md-3 col-sm-6 contact-foot text-right">
                        <h4>contact us</h4>
                        <ul>
                            <li>
                                <span class="fa fa-home"></span>
                                1185 Burlington
                                <br> Canada.
                            </li>
                            <li>
                                <span class="fa fa-phone"></span>
                                +12 345 678
                            </li>
                            <li>
                                <span class="fa fa-envelope"></span>
                                <a href="mailto:info@example.com">mail@chronicle.com</a>
                            </li>
                        </ul>
                    </div>
                    <!-- //footer-grid4 -->
                    <div class="clearfix"></div>
                </div>
                <!-- //footer-grids -->
                <!-- footer social -->
                <div class="footer-social text-center">
                    <h4>stay connected</h4>
                    <ul>
                        <li>
                            <a href="#">
                                <span class="fa fa-facebook icon_facebook"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-twitter icon_twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-dribbble icon_dribbble"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-google-plus icon_g_plus"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- //footer social -->
            </div>
            <!-- //footer container -->
        </div>
        <!-- //footer -->
        <div class="cpy-right">
            <p>© 2018 Chronicle. All rights reserved | Design by
                <a href="http://w3layouts.com"> W3layouts.</a>
            </p>
        </div>
    </div>
    <!-- //home -->

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
    <!--quantity-->
    <script>
        $('.value-plus').on('click', function () {
            var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.text(), 10) + 1;
            divUpd.text(newVal);
        });

        $('.value-minus').on('click', function () {
            var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.text(), 10) - 1;
            if (newVal >= 1) divUpd.text(newVal);
        });
    </script>
    <!--quantity-->
    <!-- FadeOut-Script -->
    <script>
        $(document).ready(function (c) {
            $('.close1').on('click', function (c) {
                $('.rem1').fadeOut('slow', function (c) {
                    $('.rem1').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function (c) {
            $('.close2').on('click', function (c) {
                $('.rem2').fadeOut('slow', function (c) {
                    $('.rem2').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function (c) {
            $('.close3').on('click', function (c) {
                $('.rem3').fadeOut('slow', function (c) {
                    $('.rem3').remove();
                });
            });
        });
    </script>
    <!--// FadeOut-Script -->

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
    <!-- start-smooth-scrolling -->
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
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
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
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
 ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>

</html>