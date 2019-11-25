@extends('layouts.master')
@section('style')
	@include ('administration.css.style')
@endsection
@section('pageInfo')
<div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-user"></i> Adminstration</h3>
    <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="{{ url('/')}}">Home</a></li>
        <li><i class="fa fa-user"></i>adminstration</li>                          
        <li><i class="fa fa-pencil"></i>add adminstration</li> 
        <li>{{ Session::get('massage') }}</li> 
    </ol>
</div>
@endsection
@section('content')
<div class="panel panel-dafult">
		<div class="panel-heading">
			<div class="card-header">{{ __('Reset Password') }}</div>
		</div>
	<form action="#" method="POST" id="changepassForm" name="profileForm" >
		{{ csrf_field() }}
		<input type="text" value="{{ Auth::user()->id }}" class="hidden" name="user_id" id="user_id">
		
		<div class="panel-body">
			<div class="row">
					<div class="col-md-8">
						<div class="pass-group">
							
								<div class="col-md-6">
									<div class="form-group">
										<label for="Password">{{ __('Old Password') }}</label>
										<input type="text"  name="oldpassword" id="oldpassword" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group pass-group">
										<label for="Password">{{ __('New Password') }}</label>
										<input type="text"  name="newpassword" id="newpassword" class="form-control">
									</div>

								</div>
								
						</div>
					</div>
				</div>
				
			</div>
		<div class="panel-footer">
			<a href="#" class="btn btn-primary btn-update-pass">Update <i class="fa fa-save"></i></a>
		</div>
	</form>
</div>
@endsection

@section('script')
<script type="text/javascript">
	
	
	$('.btn-update-pass').on('click', function(e){

	        var userId = $('#user_id').val();
	        var opass = $('#oldpassword').val();
           	var npass = $('#newpassword').val();
			console.log(userId)
			$.post("{{ route('changePass') }}", {id:userId,opass:opass,npass:npass} ,function(data){
	                console.log(data);
	        })
	})


</script>
@endsection