@extends('admin.layouts.app')
@section('title', 'Admin | Dashboard')

@section('content')

<div>
	<div class="clearfix"></div>
	<p class="home"><a href="#">Home</a> > <strong> Dashboard</strong></p>
	<div class="list_of_members">
		<div class="sales">
			<div class="icon">
				<i class="user1"></i>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="new-users">
			<div class="icon">
				<i class="user1"></i>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>

    @include('alertModal')
</div>

<script type="text/javascript">
$(function(){
	$('#btn_update_keywords').click(function(){
		var keywords = $('#keywords').val();
		var $this = $(this);

		$.ajax({
		    url: $('meta[name="route"]').attr('content') + '/admin/updatekeywords',
		    method: 'post',
		    data: {
		        keywords: keywords
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
	});

	$('.btn_update_stats').click(function(){
		var statsType 	= $(this).attr('id');
		var statsValue 	= $('input[name="'+ statsType +'"]').val();
		var $this = $(this);

		$.ajax({
		    url: $('meta[name="route"]').attr('content') + '/admin/updatestatistics',
		    method: 'post',
		    data: {
		        statsType: statsType,
		        statsValue: statsValue
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
	});
});
</script>

@endsection