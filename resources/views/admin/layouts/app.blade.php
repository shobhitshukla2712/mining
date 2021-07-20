<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route" content="{{ url('/') }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('public/css/admin/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/admin/style.css') }}" />
    <link href="{{ URL::asset('public/css/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('public/css/jQueryUI/jquery-ui.css') }}" rel="stylesheet" type="text/css" />        
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="{{ URL::asset('public/js/admin/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('public/js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>


    <style type="text/css">
    label.error {
        color: red;
    }
    </style>

    <script type="text/javascript">
        function DropDown(el) {
            this.dd = el;
            this.initEvents();
        }
        DropDown.prototype = {
            initEvents : function() {
                var obj = this;

                obj.dd.on('click', function(event){
                    $(this).toggleClass('active');
                    event.stopPropagation();
                }); 
            }
        }
        $(function() {

            var dd = new DropDown( $('#dd') );

            $(document).click(function() {
                $('.wrapper-dropdown-2').removeClass('active');
            });

        });
    </script>
</head>

<body>
    <div class="total-content">
        <div class="col-md-3 side-bar">
                    <div class="navigation">
                        <h3>Navigation</h3>
                        <ul>
                            <li>
                                <a href="{{ url('/admin/dashboard') }}"><i class="dash"></i> Dashboard</a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="{{ url('/admin/report') }}"><i class="dash"></i> Report</a>
                            </li>
                        </ul>
                    </div>
                   
                </div>

        <div class="col-md-9 content">
            <div class="home-strip">
                <div class="view">
                   
                </div>
                <div class="search">
                </div>
                <div class="member">
                    <p><a href="#"><i class="men"></i></a><a href="#">Username</a></p>
                    <div id="dd" class="wrapper-dropdown-2" tabindex="1"><span><img src="{{ url('public/images/settings.png') }}"/></span>
                        <ul class="dropdown">
                            <li><a href="{{ url('admin/profile') }}">View Profile </a></li>
                            <li><a href="{{ url('admin/logout') }}">Log out</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>            
                </div>
                <div class="clearfix"></div>    
            </div>
            @yield('content')
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="footer">
        <div class="copyright text-center">
                <p>&copy; {{ date('Y') }} All rights reserved | Template by  <a href="http://w3layouts.com">W3layouts</a></p>
        </div>      
    </div>

    <div class="modal fade" id="alert_box_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <a style="width: 80px;" id="bt-modal-cancel" class="btn btn-success" href="javascript:void(0);" data-dismiss="modal">OK</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>