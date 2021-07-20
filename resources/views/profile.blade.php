<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Mining" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route" content="{{ url('/') }}">
    <title>Mining</title>
    <link rel="stylesheet" href="{{ asset('public/home/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/popup-box.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/poposlides.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/font-awesome.min.css') }}" />
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        label.error {
            color: red;
        }
    </style>
</head>
<body>
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <div class="demo-inner-content" id="vehicle-rent">
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
            </div>
        </div>
        <div class="packages" id="packages">
            <div class="container">  
                <div class="w3ls-title"> 
                    <h3 class="title">Profile</h3>
                </div>
                <div class="profile-container">
                    <form id="frm_user_profile" name="frm_user_profile">
                        <div class="profile-pic">
                            <input type="file" id="avatar">
                            <label for="avatar" class="uploadPic">
                                <?php 
                                if( !is_null( $userDetails->avatar ) && ( $userDetails->avatar != '' ) )
                                {
                                ?>
                                    <img src="{{ asset('storage/'.str_replace('public/', '', $userDetails->avatar)) }}" alt="Profile">
                                <?php  
                                }
                                else
                                {
                                ?>
                                    <img src="{{ url('public/images/avatar.png') }}" alt="Profile">
                                <?php
                                }
                                ?>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Full Name" value="{{ $userDetails->name ?? '' }}">
                                </div>
                            </div>
                            <!-- <div class="col-md-12 text-center">
                                <button class="btn btn-md btn-success" type="submit" id="btn_update_user_profle">Save Detail</button>
                            </div> -->
                        </div>
                    </form>
                </div>
                    <div class="clearfix"></div>
            </div>
        </div>
        <div class="footer-agile">
            <div class="container">
                    <div class="footer-agilem">
                        <div class="col-sm-8 col-xs-9 copy-w3lsright">
                            <p>© Mining All rights reserved.</p>
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
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @include('alertModal')
        <script type="text/javascript" src="{{ URL::asset('public/home/js/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/jquery.validate.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/home/js/counterup.min.js') }}"></script>
        <script>
            jQuery(document).ready(function($) {
                $('#frm_user_profile').submit(function(e){
                    e.preventDefault();
                });
                $('#frm_user_profile').validate({
                    rules: {
                        fullname: {
                            required: true
                        },
                        uemail: {
                            required: true,
                            email: true
                        },
                        mobile_no: {
                            required: true,
                            number: true
                        }
                    },
                    messages: {
                        fullname: {
                            required: 'Please enter your full name'
                        },
                        uemail: {
                            required: 'Please enter email id',
                            email: 'Please enter a valid email id'
                        },
                        mobile_no: {
                            required: 'Please enter mobile number',
                            number: 'Please enter valid mobile number'
                        }
                    }
                });

                $('#btn_update_user_profle').click(function(){
                    if( $('#frm_user_profile').valid() )
                    {
                        var $this       = $(this);
                        var avatar      = $('#avatar').prop('files')[0];
                        var fullname    = $('#fullname').val();
                        var uemail      = $('#uemail').val();
                        var mobile_no   = $('#mobile_no').val();

                        var formData = new FormData();
                        formData.append('avatar', avatar);
                        formData.append('fullname', fullname);
                        formData.append('uemail', uemail);
                        formData.append('mobile_no', mobile_no);

                        $.ajax({
                            url: $('meta[name="route"]').attr('content') + '/updateuserprofile',
                            method: 'post',
                            data: formData,
                            contentType : false,
                            processData : false,
                            beforeSend: function() {
                                $this.button('loading');
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            complete: function()
                            {
                                $this.button('reset');
                            },
                            success: function(response){
                                if( response.resCode == 0 )
                                {
                                    $('#alert_box_modal').find('.modal-header').html('Success');
                                    $('#alert_box_modal').find('.modal-body').html(response.resMsg);
                                    $('#alert_box_modal').modal('show');

                                    setTimeout(function () { location.reload(true); }, 2000);
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
        <link rel="stylesheet" href="{{ asset('public/home/css/jquery-ui.css') }}" />

        <script type="text/javascript" src="{{ URL::asset('public/home/js/jquery-ui.js') }}"></script>
        <script>
            $(function() {
                $("#start_date").datepicker({
                    dateFormat: "dd-M-yy",
                    minDate: 0,
                    onSelect: function(date) {
                        var date2 = $('#start_date').datepicker('getDate');
                        date2.setDate(date2.getDate());
                        $('#end_date').datepicker('setDate', date2);
                        $('#end_date').datepicker('option', 'minDate', date2);
                    }
                });
                $('#end_date').datepicker({
                    dateFormat: "dd-M-yy",
                    onClose: function() {
                        var dt1 = $('#start_date').datepicker('getDate');
                        var dt2 = $('#end_date').datepicker('getDate');
                        if (dt2 <= dt1) {
                            var minDate = $('#end_date').datepicker('option', 'minDate');
                            $('#end_date').datepicker('setDate', minDate);
                        }
                    }
                });
            });
        </script>
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
        <script type="text/javascript" src="{{ URL::asset('public/home/js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/js/login.js') }}"></script>
            </body>
                </html>