<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Mining" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route" content="{{ url('/') }}">
    <title>Mining Questions</title>
    <link rel="stylesheet" href="{{ asset('public/home/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/popup-box.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/poposlides.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/home/css/font-awesome.min.css') }}" />
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <style>
        label.error {
            color: red;
        }
        label {
    font-weight: normal !important;
}
 .class_input{
    margin-bottom: 11px;margin-top: -20px; margin-left: 9px;
 }
 .p_clas{
    font-weight: bold; font-size:15px;
 }
    </style>
<script type="text/javascript">

function ShowHideDiv() {
    var optionsRadios3 = document.getElementById("optionsRadios3");
    var content = document.getElementById("content");
    content.style.display = optionsRadios3.checked ? "block" : "none";
}
</script>
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
            @if(isset($question) && !empty($question))
                <div class="profile-container">
                <form action="{{ url('submit_question') }}" method="POST">
                            @csrf
                <input type="hidden" id="role_id" name="role_id" value="{{$role_id}}">
                <input type="hidden" id="user_id" name="user_id" value="{{$user_id}}">
                <input type="hidden" id="count" name="count" value="{{count($question)}}">
                <div class="col-md-12">
                @php 
                    $i = 0;
                @endphp
                @foreach ($question as $index => $item)
                    <input type="hidden" id="ques_id" name="ques_id[]" value="{{$item->id}}">
                    <label style="margin-left: -16px;">{{$index+1}}.</label>
                <div class="class_input"><p class="p_clas">{{$item->question}}</p></div>
                     <div class="form-check">
                            <input class="form-check-input" type="radio" name="ans{{$i}}" id="ans_{{$item->id}}" value="yes">
                            <label class="form-check-label" for="ans_{{$item->id}}">
                    Yes
                    </label>
                    <input class="form-check-input" type="radio" name="ans{{$i}}" id="ans_{{$item->id}}" value="no">
                    <label class="form-check-label" for="ans_{{$item->id}}">
                    No
                    </label>
                    <input class="form-check-input" type="radio" name="ans{{$i}}" id="ans_{{$item->id}}" value="n/a">
                    <label class="form-check-label" for="ans_{{$item->id}}">
                    N/A
                    </label>
                </div>
            <div class="form-group">
                    <input type="text" class="form-control" id="content{{$item->id}}" placeholder="Content" name="content[]" maxlength="500">
            </div>
            @php 
                    $i++;
                @endphp
                @endforeach
                <div class="col-md-12 text-center">
                                <button class="btn btn-primary" type="submit" id="btn_submit_ques">SAVE</button>
                            </div>
                        </div>
                </form>
                </div>
                @else
                <div style="text-align: center;margin-top: 270px;">
                    <h2>{{$message}}</h2>
                </div>    
                        @endif
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
                $('#frm_question_details').submit(function(e){
                    e.preventDefault();
                });

                $('#btn_submit_ques').click(function(){
	    
	    		var $this = $(this);

	    		$.ajax({
	    			url: $('meta[name="route"]').attr('content') + '/submit_question',
	    			method: 'post',
	    			data: {
	    				frmData: $('#frm_question_details').serialize()
	    			},
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
				    		// Reset the form
				    	}
				    	else
				    	{
				    		$('#alert_box_modal').find('.modal-header').html('Alert');
				    		$('#alert_box_modal').find('.modal-body').html(response.resMsg);
				    		$('#alert_box_modal').modal('show');
				    	}
				    }
	    		});
	    	
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
