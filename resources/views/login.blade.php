<!DOCTYPE html>
<html>
<head>
	<title>SIGNIN</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route" content="{{ url('/') }}">

	<link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}" />
	<link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}" />
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
	<script>
	$(document).ready(function(){
	    $('#frm_login').submit(function(e){
	        e.preventDefault();
	    });
	    $('#frm_login').validate({
	        rules: {
	            username: {
	                required: true,
	                username: true
	            },
	            password: {
	                required: true,
	            }
	        },
	        messages: {
	            username: {
	                required: 'Please enter username',
	            },
	            password: {
	                required: 'Please enter password',
	            }
	        }
	    });

	    $('#btn_login').click(function(){
	    	if( $('#frm_login').valid() )
	    	{
	    		$.ajax({
	    			url: $('meta[name="route"]').attr('content') + '/submit_login11',
	    			method: 'post',
	    			data: {
	    				frmData: $('#frm_login').serialize()
	    			},
	    			beforeSend: function() {
				       // $this.button('loading');
				    },
	    			headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },
				    complete: function()
				    {
				    	//$this.button('reset');
				    },
				    success: function(response){
				    	if( response.resCode == 0 )
				    	{
				    		$('#frm_login')[0].reset();

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
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
      <h2>Sign-in</h2>
      <form method="post" id="frm_login" name="frm_login">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" placeholder="User Name" name="username"  required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
          <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn_login">Sign in</button>
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