<!DOCTYPE html>
<html>
<head>
	<title>SIGNUP</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route" content="{{ url('/') }}">

	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />

	<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

	<script>
	$(document).ready(function(){
	    $('#frm_registration').submit(function(e){
	        e.preventDefault();
	    });
	    $('#frm_registration').validate({
	        rules: {
	            full_name: {
	                required: true
	            },
	            mobile_no: {
	                required: true,
	                digits: true
	            },
	            email_id: {
	                required: true,
	                email: true
	            },
	            password: {
	                required: true,
	                minlength: 6
	            }
	        },
	        messages: {
	            full_name: {
	                required: 'Please enter Full name'
	            },
	            mobile_no: {
	                required: 'Please enter mobile number',
	                digits: 'Please enter a valid mobile number'
	            },
	            email_id: {
	                required: 'Please enter email id',
	                email: 'Please enter a valid email id',
	            },
	            password: {
	                required: 'Please enter password',
	                minlength: 'Password must contain minimum 6 characters',
	            }
	        }
	    });

	    $('#btn_registration').click(function(){
	    	if( $('#frm_registration').valid() )
	    	{
	    		var $this = $(this);
	    		$.ajax({
	    			url: $('meta[name="route"]').attr('content') + '/submit_signup',
	    			method: 'post',
	    			data: {
	    				frmData: $('#frm_registration').serialize()
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
				    		$('#frm_registration')[0].reset();
				    		$('#alert_box_modal').find('.modal-header').html('Success');
				    		$('#alert_box_modal').find('.modal-body').html(response.resMsg);
				    		$('#alert_box_modal').modal('show');
				    		setTimeout(function(){
				    			window.location.href = '{{ url("/") }}';
				    		}, 3000);
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
span.error {
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
    width: 400px;
    height: 620px;
}
.align-center {
    text-align:center;
}
.form_bg h2.text-center {
    font-size:26px;
    background:#fff;
    margin: 0px -20px 30px -20px;
    padding: 15px 0;
}
.form_bg .form-control {
    min-height: 38px;
    border-radius: 4px;
    border: 1px solid #ddd;
    background:#fff;
}
.form_bg label {
    font-weight: 600;
    font-size: 14px;
}
.form_bg .submitBtn {
    background:#281f41;
    color:#fff;
    text-decoration: none;
    border-radius: 3px;
    min-width: 100px;
    border-color: #281f41;
}
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="form_bg">
				<form id="frm_registration" name="frm_registration" autocomplete="off">
					<h2 class="text-center">Signup</h2>
					
					<div class="form-group">
						<label for="full_name">Full Name: <span class="error">*</span></label>
						<input type="text" class="form-control" name="full_name" id="full_name">
					</div>
					<div class="form-group">
						<label for="email_id">Email Address: <span class="error">*</span></label>
						<input type="email" class="form-control" id="email_id" name="email_id">
					</div>
					<div class="form-group">
						<label for="mobile_no">Mobile No: <span class="error">*</span></label>
						<input type="text" class="form-control" name="mobile_no" id="mobile_no">
					</div>
					<div class="form-group">
						<label for="password">Password: <span class="error">*</span></label>	
						<input type="password" class="form-control" id="password" name="password">
					</div>

					<div class="align-center">
						<button type="submit" class="btn btn-default submitBtn" id="btn_registration">Submit</button>
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