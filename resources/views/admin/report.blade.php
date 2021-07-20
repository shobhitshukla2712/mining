@extends('admin.layouts.app')
@section('title','Facebook Reviews')

@section('content')
<div>
	<div class="clearfix"></div>
	<p class="home"><a href="#">Home</a> > <strong> Report</strong></p>
	
	<form name="export_csv" action="{{ url('/admin/getExport') }}" method="POST">
    @csrf
		<div class="form-group">
				<title>Role</title>
				<select name="role" id="role">
						@foreach ($role as $roles)
        		<option value="{{ $roles->id }}">{{ $roles->name }}</option>
    					@endforeach
				</select>

	<div class="col-md-2">
         <div class="form-group">
               <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Start Date" readonly="">
         </div>
    </div>
				<button class="btn btn-md btn-success" type="submit" id="btn_report">Export</button>
		</div>
    </form>

</div>
<script type="text/javascript" src="{{ URL::asset('public/home/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/home/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/home/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/home/js/counterup.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('public/home/css/jquery-ui.css') }}" />

        <script type="text/javascript" src="{{ URL::asset('public/home/js/jquery-ui.js') }}"></script>
        <script>
            $(function() {
                $('#btn_report').click(function(){
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
	    });
                $("#start_date").datepicker({
                    dateFormat: "yy-mm-dd",
                    onSelect: function (date) {
                        var date2 = $('#start_date').datepicker('getDate');
                        date2.setDate(date2.getDate());
                    }
                });
            });
        </script>
<script type="text/javascript">
   function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>

@endsection
