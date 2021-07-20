<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route" content="{{ url('/') }}">
	<link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}" />
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
	<script>
	$(document).ready(function(){
	    $('#frm_admin_login').submit(function(e){
	        e.preventDefault();
	    });
	    $('#frm_admin_login').validate({
	        rules: {
	            username: {
	                required: true,
	            },
	            password: {
	                required: true
	            }
	        },
	        messages: {
	            username: {
	                required: 'Please enter username'
	            },
	            password: {
	                required: 'Please enter password',
	            }
	        }
	    });
	    $('#btn_login').click(function(){
	    	if( $('#frm_admin_login').valid() )
	    	{
	    		var $this = $(this);
	    		$.ajax({
	    			url: $('meta[name="route"]').attr('content') + '/admin/login',
	    			method: 'post',
	    			data: {
	    				frmData: $('#frm_admin_login').serialize()
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
				    		document.location.href = response.redirectTo;
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
</head>

<style type="text/css">
label.error {
    color: red;
}
body {
    background:#333;
}
.form_bg {
    background-color:#eee;
    color:#666;
    padding:20px;
    border-radius:10px;
    position: absolute;
    border:1px solid #fff;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 320px;
    height: 280px;
}
.align-center {
    text-align:center;
}
</style>
<body>

	<div class="container">
		<div class="row">
			<div class="form_bg">
				<form id="frm_admin_login" name="frm_admin_login">
					<h2 class="text-center">Login Page</h2>
					<br/>
					<div class="form-group">
						<input type="text" class="form-control" id="username" name="username" placeholder="User id">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
					<br/>
					<div class="align-center">
						<button type="submit" class="btn btn-default" id="btn_login">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="alert_box_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header"></div>
	            <div class="modal-body"></div>
	            <div class="modal-footer">
	                <a id="bt-modal-cancel" class="btn btn-success" href="javascript:void(0);" data-dismiss="modal">OK</a>
	            </div>
	        </div>
	    </div>
	</div>

</body>
</html>