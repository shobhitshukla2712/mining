@extends('admin.layouts.app')
@section('title', 'Admin | Profile')

@section('content')

<div>
	<div class="clearfix"></div>
	<p class="home"><a href="#">Home</a> > <strong> Profile</strong></p>
	<div class="list_of_members">
		<div style="margin-top: 20px;">
		    <center><h3>Change Password</h3></center>
		    <div style="margin-top: 10px;">
		        <form id="frm_update_password" name="frm_update_password">
		            <div class="row">
		                <div class="col-md-6">
		                    <div class="form-group">
		                        <label>Password: </label>
		                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
		                    </div>
		                </div>
		                <div class="col-md-6">
		                    <div class="form-group">
		                        <label>Confirm Password: </label>
		                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
		                    </div>
		                </div>
		                <div class="col-md-12 text-center">
		                    <button class="btn btn-md btn-success" type="submit" id="btn_update_password">Change Password</button>
		                </div>
		            </div>
		        </form>
		    </div>    
		</div>
		<div class="clearfix"></div>

        @include('alertModal')
	</div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('#frm_update_password').submit(function(e) {
            e.preventDefault();
        });
        $('#frm_update_password').validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: 'Please enter password',
                    minlength: 'Password must have 6 characters'
                },
                confirm_password: {
                    equalTo: 'Password and confirm password must be same'
                }
            }
        });

        $('#btn_update_password').click(function() {
            if ($('#frm_update_password').valid()) {
                var $this = $(this);

                $.ajax({
                    url: $('meta[name="route"]').attr('content') + '/admin/changepassword',
                    method: 'post',
                    data: {
                        frmData: $('#frm_update_password').serialize()
                    },
                    beforeSend: function() {
                        $this.button('loading');
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    complete: function() {
                        $this.button('reset');
                    },
                    success: function(response) {
                        if (response.resCode == 0) {
                            $('#alert_box_modal').find('.modal-header').html('Success');
                            $('#alert_box_modal').find('.modal-body').html(response.resMsg);
                            $('#alert_box_modal').modal('show');
                        } else {
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

@endsection