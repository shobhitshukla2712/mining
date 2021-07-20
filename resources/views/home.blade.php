<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="mining"/>
    <meta name="author" content="MINING" />
    <meta name="application-name" content="MINING" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="MINING" />
    <meta property="og:description" content="mining" />
    <meta property="og:url" content="#" />
    <meta property="og:site_name" content="MINING />
    <meta property="og:image" content="#" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route" content="{{ url('/') }}">
    <title>MINING</title>
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="stylesheet" href="{{ asset('public/home/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/popup-box.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/poposlides.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/font-awesome.min.css') }}" />
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
</head>

<body>
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <div class="demo-inner-content" id="home">
            <div class="main_agileits">
                <div class="header-w3layouts">
                    <nav class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                            <div class="navbar-header page-scroll">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">MINING</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                @include('topNavigation')
                            </div>
                        </div>
                    </nav>
                </div>
                @include('loginModal')
                @include('alertModal')
            <div class="slides-box">
            <div class="filter-container">
            <div class="msg-alert">
            <?php
            if( Session::has('message') )
            {
            ?>
                <div class="alert text-center {{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('message') }}
                </div>
            <?php
            }
            ?>
            </div>
                <div class="container">
                    <div class="row">
                        <div class="w3ls-title">
                            <h3 class="title">Mining</h3>
                        </div>
                    </div>
                </div>
            </div>
                <ul class="slides">
                    <li style="background: url(public/home/images/first_banner.jpg) no-repeat;background-size:cover;"></li>
                    <li style="background: url(public/home/images/first_banner.jpg) no-repeat;background-size:cover;"></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="w3ls-section w3-about" id="about">
            <div class="container">
                <div class="w3ls-title">
                    <h3 class="title">About us</h3>
                </div>
                <div class="col-md-12 about-top about-youtube-video">
                    <h4>Welcome to MINING</h4>
                    <p>
                    The mining industry plays an important role in all 50 states. In 2009, an estimated 1,400 mines were operating in the United States.1 As a supplier of coal, metals, industrial minerals, sand, and gravel to businesses, manufacturers, utilities and others, the mining industry is vital to the well being of communities across the country.
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="stats" id="stats">
            <div class="container">
                <h3 class="title">Stats</h3>
                <div class="agileits_stats_grids">
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <div class="w3ls-section contact" id="contact">
            <div class="container">
                <div class="w3ls-title">
                    <h3 class="title">get in touch</h3>
                </div>
                <div class="contact_wthreerow agileits-w3layouts">
                    <div class="col-md-7 w3l_contact_form">
                        <h4>Contact Form</h4>
                        <form name="frm_contact" id="frm_contact" action="" method="post" autocomplete="off">
                            <input type="text" name="Name" placeholder="Name">
                            <input type="email" name="Email" placeholder="Email">
                            <input type="text" name="Phone" placeholder="Phone">
                            <textarea name="Message" placeholder="Message"></textarea>
                            <div>
                                <input type="submit" name="submit" value="Submit">
                            </div>
                        </form>
                        <br>
                    </div>
                    <div class="col-md-5 agileits_w3layouts_contact_gridl">
                        <div class="agileits_mail_grid_right_grid">
                            <h4>Contact Info</h4>
                            <ul class="contact_info">
                                <li>
                                    <span class="fa fa-map-marker" aria-hidden="true"></span>
                                    Itaque earum rerum hic tenetur a sapiente delectus
                                </li>
                                <li>
                                    <span class="fa fa-envelope" aria-hidden="true"></span>
                                    <a href="mailto:testing@gmail.com">testing@gmail.com</a>
                                </li>
                                <li>
                                    <span class="fa fa-phone" aria-hidden="true"></span>
                                    +91-0000000000
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <div class="footer-agile">
            <div class="container">
                <div class="footer-agilem">
                    <div class="col-sm-8 col-xs-9 copy-w3lsright">
                        <p>© 2021 Mining All rights reserved.</p>
                    </div>
                    <div class="col-sm-4 col-xs-3 social-w3licon">
                        <a href="#" class="social-button facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="social-button twitter">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/jquery.validate.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/counterup.min.js') }}"></script>
        <script>
            jQuery(document).ready(function($) {
      
                $('#frm_contact').submit(function(e){
                	e.preventDefault();
                });
                $('#frm_contact').validate({
                    rules: {
                        Name: {
                            required: true
                        },
                        Email: {
                            required: true,
                            email: true
                        },
                        Phone: {
                            required: true,
                            number: true
                        },
                        Message: {
                            required: true
                        }
                    },
                    messages: {
                        Name: {
                            required: 'Please enter your full name'
                        },
                        Email: {
                            required: 'Please enter your email id',
                            email: 'Please enter a valid email id'
                        },
                        Phone: {
                            required: 'Please enter your phone number',
                            number: 'Please enter a valid phone number'
                        },
                        Message: {
                            required: 'Please enter your message'
                        }
                    }
                });
            });
        </script>
        <link rel="stylesheet" href="{{ asset('public/home/css/jquery-ui.css') }}" />
        <script type="text/javascript" src="{{ URL::asset('public/home/js/jquery-ui.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/poposlides.js') }}"></script>
        <script>
            $(".slides").poposlides();
        </script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/jquery.magnific-popup.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.popup-with-zoom-anim').magnificPopup({
                    type: 'inline',
                    fixedContentPos: false,
                    fixedBgPos: true,
                    overflowY: 'auto',
                    closeBtnInside: true,
                    preloader: false,
                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });
            });
        </script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/owl.carousel.js') }}"></script>
        <script>
            $(document).ready(function() {
                $("#owl-demo2").owlCarousel({
                    items: 1,
                    lazyLoad: false,
                    autoPlay: true,
                    navigation: false,
                    navigationText: false,
                    pagination: true,
                });
            });
        </script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/SmoothScroll.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/move-top.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/easing.js') }}"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event) {
                    event.preventDefault();
                    $('html,body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 1000);
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $().UItoTop({
                    easingType: 'easeOutQuart'
                });
            });
        </script>
<script type="text/javascript" src="{{ URL::asset('public/home/js/scrolling-nav.js') }}"></script>
</body>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/login.js') }}"></script>
</body>
</html>