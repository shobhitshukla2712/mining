<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="At RENT MY UFO, we provide you the best vehicles according to your requirements. our vehicles are well maintained and make your travel experience more awesome" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route" content="{{ url('/') }}">

    <title>RENT MY UFO | Vehicle Listing</title>

    <link rel="stylesheet" href="{{ asset('public/home/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/popup-box.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/poposlides.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/font-awesome.min.css') }}" />

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- //google fonts -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        label.error {
            color: red;
        }
        .selected-star {
            color: red;
        }
        .assign_rating {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!--/main-header-->
        <div class="demo-inner-content" id="vehicle-rent">
            <div class="main_agileits">
                <!--/banner-info-->
                <!-- header -->
                <div class="header-w3layouts">
                    <!-- Navigation -->
                    <nav class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                            <div class="navbar-header page-scroll">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">RENT MY UFO</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <h1>
                                    <a class="navbar-brand" href="{{ url('/') }}">
                                        <img src="{{ url('public/home/images/logo.png') }}" height="60">
                                    </a>
                                </h1>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <!-- Top navigation -->
                                @include('topNavigation')
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container -->
                    </nav>
                </div>
                <!-- //header -->

                <!-- <div class="slides-box">
                    <ul class="slides">
                        <?php
                        $basepath = url('/public/home/images')
                        ?>
                        <li style="background: url({{ $basepath . '/one.jpg' }}) no-repeat;background-size:cover;"></li>
                        <li style="background: url({{ $basepath . '/two.jpg' }}) no-repeat;background-size:cover;"></li>
                        <li style="background: url({{ $basepath . '/three.jpg' }}) no-repeat;background-size:cover;"></li>
                        <li style="background: url({{ $basepath . '/four.jpg' }}) no-repeat;background-size:cover;"></li>
                        <li style="background: url({{ $basepath . '/five.jpg' }}) no-repeat;background-size:cover;"></li>
                        <li style="background: url({{ $basepath . '/six.jpg' }}) no-repeat;background-size:cover;"></li>
                    </ul>
                </div> -->
                <!-- //banner  -->
            </div>
        </div>
        <!--/banner-section-->

        <!-- popular packages -->
        <div class="packages" id="packages">
            <div class="container">  
                <div class="w3ls-title"> 
                    <h3 class="title">Rating</h3>
                </div>
                <div class="profile-container">
                    <form id="frm_user_rating" name="frm_user_rating">
                        <div class="row">
                            <div class="col-md-4">
                                Website
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <i class="fa fa-star assign_rating {{ ( ( $websiteRating ) && ( $websiteRating->rating >= 1 ) ) ? 'selected-star' : '' }}" aria-hidden="true"></i>
                                    <i class="fa fa-star assign_rating {{ ( ( $websiteRating ) && ( $websiteRating->rating >= 2 ) ) ? 'selected-star' : '' }}" aria-hidden="true"></i>
                                    <i class="fa fa-star assign_rating {{ ( ( $websiteRating ) && ( $websiteRating->rating >= 3 ) ) ? 'selected-star' : '' }}" aria-hidden="true"></i>
                                    <i class="fa fa-star assign_rating {{ ( ( $websiteRating ) && ( $websiteRating->rating >= 4 ) ) ? 'selected-star' : '' }}" aria-hidden="true"></i>
                                    <i class="fa fa-star assign_rating {{ ( ( $websiteRating ) && ( $websiteRating->rating >= 5 ) ) ? 'selected-star' : '' }}" aria-hidden="true"></i>
                                    <input type="hidden" name="website_rating" id="website_rating" value="">
                                </div>
                                <label id="website_rating-error" class="error" for="website_rating"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Comment / Feedback
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" id="comment">{{ $websiteRating->comment ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-md btn-success" type="submit" id="btn_save_rating">Save Detail</button>
                            </div>
                        </div>
                    </form>
                </div>
                    <div class="clearfix"></div>
            </div>
        </div>
        <!-- //popular packages -->

        <!-- footer start here -->
        <div class="footer-agile">
            <!-- newsletter -->
            <!-- <div class="footer-top">
                    <div class="agile-leftmk">
                        <form action="#" method="post">
                            <input type="email" placeholder="Enter Your Email Address" name="email" required="">
                            <input type="submit" value="Subscribe">
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div> -->
            <!-- //newsletter -->
            <div class="container">
                <!-- <div class="footer-btm-agileinfo">
                        <div class="col-md-3 col-xs-3 footer-grid w3social">
                            <h3>About us</h3>
                            <p class="footer-p1">Lorem ipsum dolor sit amet, con sectetur adipiscing elit. Proin sed ligula 
                            ac metus finibus hendrerit sed at libero. Praesent reiciendis voluptatibus maiores alias.</p>
                            <a href="#">read more <span class="fa fa-long-arrow-right"></span></a>
                        </div>
                        <div class="col-md-3 col-xs-3 footer-grid">
                            <h3>Contact Info</h3>
                            <ul>
                                <li><i class="fa fa-phone"></i>+012 345 6789</li>
                                <li><i class="fa fa-fax"></i>+987 654 3210</li>
                                <li><i class="fa fa-map-marker"></i>Kmome St, NY 10002, Canada.</li>
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:example@mail.com">mail@example.com</a></li>
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:example@mail.com">mail1@example1.com</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-xs-3 footer-grid w3social">
                            <h3>Quick Links</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#about" class="scroll">About</a></li>
                                <li><a href="#packages" class="scroll">Packages</a></li>
                                <li><a href="#testimonials" class="scroll">Happy Customers</a></li>
                                <li><a href="#contact" class="scroll">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-xs-3 footer-grid">
                            <h3>Latest Tweets</h3>
                            <ul class="tweet-agile">
                            <li>
                                <i class="fa fa-twitter-square" aria-hidden="true"></i>
                                <p class="tweet-p1"><a href="mailto:support@company.com">@example</a> sit amet consectetur adipiscing. <a href="#">http://ax.by/zzzz</a></p>
                                <p class="tweet-p2">Posted 3 days ago.</p>
                            </li>
                            <li>
                                <i class="fa fa-twitter-square" aria-hidden="true"></i>
                                <p class="tweet-p1"><a href="mailto:support@company.com">@example</a> sit amet consectetur adipiscing. <a href="#">http://cx.dy/zzzz</a></p>
                                <p class="tweet-p2">Posted 3 days ago.</p>
                            </li>
                        </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div> -->
                    <div class="footer-agilem">
                        <div class="col-sm-8 col-xs-9 copy-w3lsright">
                            <p>© Rentmyufo All rights reserved.</p>
                        </div>
                        <div class="col-sm-4 col-xs-3 social-w3licon">
                            <a href="https://www.facebook.com/Rent-My-UFO-109418340556813/" class="social-button facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/rentmyufo/?hl=en" class="social-button twitter">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- //footer end here -->

        <!-- alert modal -->
        @include('alertModal')

        <!-- js -->
        <script type="text/javascript" src="{{ URL::asset('public/home/js/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/jquery.validate.min.js') }}"></script>
        <!-- //js -->

        <!-- Stats-Number-Scroller-Animation-JavaScript -->
        <script type="text/javascript" src="{{ URL::asset('public/home/js/waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/counterup.min.js') }}"></script>
        <script>
            jQuery(document).ready(function($) {
                // To manage star rating
                $(document).on('click', '.assign_rating', function(){
                    // Get the start index
                    let start   = 0;

                    // Get the index of clicked element and add 1 to it to make it count
                    let count = $('.assign_rating').index(this) + 1;

                    // Remove the already filled stars
                    $('.assign_rating').removeClass('selected-star');
                    
                    // Fill the stars with the given range
                    $('.assign_rating').slice(start, count).addClass('fa fa-star selected-star');
                    $('#website_rating').val(count);
                });

                $('#frm_user_rating').submit(function(e){
                    e.preventDefault();
                });
                // Validation
                $('#frm_user_rating').validate({
                    ignore: [],
                    rules: {
                        website_rating: {
                            required: true
                        }
                    },
                    messages: {
                        website_rating: {
                            required: 'Please provide rating'
                        }
                    }
                });

                $('#btn_save_rating').click(function(){
                    if( $('#frm_user_rating').valid() )
                    {
                        var $this = $(this);
                        var websiteRating = $('#website_rating').val();
                        var comment = $('#comment').val();

                        $.ajax({
                            url: $('meta[name="route"]').attr('content') + '/saverating',
                            method: 'post',
                            data: {
                                websiteRating: websiteRating,
                                comment: comment
                            },
                            beforeSend: function() {
                                // Show the loading button
                                $this.button('loading');
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            complete: function()
                            {
                                // Change the button to previous
                                $this.button('reset');
                            },
                            success: function(response){
                                if( response.resCode == 0 )
                                {
                                    $('#alert_box_modal').find('.modal-header').html('Success');
                                    $('#alert_box_modal').find('.modal-body').html(response.resMsg);
                                    $('#alert_box_modal').modal('show');
                                }
                                else
                                {
                                    $('#alert_box_modal').find('.modal-header').html('Alert');
                                    $('#alert_box_modal').find('.modal-body').html(response.resMsg);
                                    $('#alert_box_modal').modal('show');
                                }
                            }
                        });
                    }
                });
            });
        </script>
        <!-- //Stats-Number-Scroller-Animation-JavaScript -->

        <!-- Calendar -->
        <link rel="stylesheet" href="{{ asset('public/home/css/jquery-ui.css') }}" />

        <script type="text/javascript" src="{{ URL::asset('public/home/js/jquery-ui.js') }}"></script>
        <script>
            $(function() {
                // $( "#datepicker,#datepicker1" ).datepicker();
                $("#start_date").datepicker({
                    dateFormat: "dd-M-yy",
                    minDate: 0,
                    onSelect: function(date) {
                        var date2 = $('#start_date').datepicker('getDate');
                        date2.setDate(date2.getDate());
                        $('#end_date').datepicker('setDate', date2);
                        //sets minDate to dt1 date + 1
                        $('#end_date').datepicker('option', 'minDate', date2);
                    }
                });
                $('#end_date').datepicker({
                    dateFormat: "dd-M-yy",
                    onClose: function() {
                        var dt1 = $('#start_date').datepicker('getDate');
                        var dt2 = $('#end_date').datepicker('getDate');
                        //check to prevent a user from entering a date below date of dt1
                        if (dt2 <= dt1) {
                            var minDate = $('#end_date').datepicker('option', 'minDate');
                            $('#end_date').datepicker('setDate', minDate);
                        }
                    }
                });
            });
        </script>
        <!-- //Calendar -->

        <!-- for banner js file-->
        <script type="text/javascript" src="{{ URL::asset('public/home/js/poposlides.js') }}"></script>
        <script>
            $(".slides").poposlides();
        </script>
        <!-- //for banner js file-->

        <!-- pop-up-box -->
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
        <!--//pop-up-box -->

        <!-- requried-jsfiles-for owl -->
        <!-- testimonials -->
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
        <!-- //requried-jsfiles-for owl -->
        <!-- //testimonials -->

        <!-- start-smoth-scrolling -->
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

        <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function() {
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

        <!-- Scrolling Nav JavaScript -->
        <script type="text/javascript" src="{{ URL::asset('public/home/js/scrolling-nav.js') }}"></script>
        <!-- //fixed-scroll-nav-js -->

        <!-- for bootstrap working -->
        <script type="text/javascript" src="{{ URL::asset('public/home/js/bootstrap.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('public/js/login.js') }}"></script>

            </body>
                </html>