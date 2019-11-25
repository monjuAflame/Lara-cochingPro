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
			 <b><i class="fa fa-user"></i>My Profile</b>
		</div>
	<form action="{{ route('adminstrationUpdate') }}" method="POST" id="registerForm" name="profileForm" enctype= 'multipart/form-data'>
		{{ csrf_field() }}
		<input type="text" value="{{ Auth::user()->id }}" class="hidden" name="user_id" id="user_id">
		<input type="text"  name="uppassword" class="hidden" value="{{ Auth::user()->password }}" id="uppassword" class="form-control">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-9">
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" value="{{ Auth::user()->username }}" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<fieldset>
								<legent>Sex</legent>
								<table style="width: 100%; margin-top: 14px">
									<tr style="border-bottom: 1px solid #ccc;">
										<td>
											<label>
												<input type="radio" {{ Auth::user()->sex==0 ?  'checked' : '' }} name="sex" id="sex" value="0" >Male
											</label>
										</td>
										<td>
											<label>
												<input type="radio" {{ Auth::user()->sex==1 ?  'checked' : '' }} name="sex" id="sex" value="1" >Female
											</label>
										</td>
									</tr>
								</table>
							</fieldset>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" value="{{ Auth::user()->email }}" id="email" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<fieldset>
								<legent>Status</legent>
								<table style="width: 100%; margin-top: 14px">
									<tr style="border-bottom: 1px solid #ccc;">
										<td>
											<label>
												<input type="radio" {{ Auth::user()->active==0 ?  'checked' : '' }} name="active" id="status" value="0" >Active
											</label>
										</td>
										<td>
											<label>
												<input type="radio" {{ Auth::user()->active==1 ?  'checked' : '' }} name="active" name="active" id="status" value="1" >Deactive
											</label>
										</td>
									</tr>
								</table>
							</fieldset>
						</div>
					</div>
					<div class="col-md-8">
						<div class="pass-group" style="display: none">
							
								<div class="col-md-6">
									<div class="form-group">
										<label for="username">Old Password</label>
										<input type="text"  name="password" id="password" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group pass-group" style="display: none">
										<label for="username">New Password</label>
										<input type="text"  name="password" id="password" class="form-control">
									</div>

								</div>
								<a href="#" class="btn btn-xs btn-default btn-change-password">change</a>
							
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="role">Role</label>
							<select name="role_id" id="role_id" class="form-control">
								
								@foreach($rules as $rule)
									<option value="{{ $rule->role_id }}" >{{ $rule->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="form-group form-group-login">
								<table style="margin: 0 auto">
									<thead>
										<tr class="info">
											<th class="adminstration-id tex-center">
												{{ sprintf('%02d',Auth::user()->id) }}
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="photo">

												<img class="img-responsive adminstration-photo" id="showPhoto" src="{{ asset($url) }}" alt=" "/>

												<input type="file" name="image" id="image" accept="image/*">
												
												
											</td>
										</tr>
										<tr>
											<td style="text-align: center; background: #ddd;">
												<input type="button" name="browse_file" id="browse_file" class="form-control btn-browse" value="Browse">
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
				
			</div>
		</div>
		<div class="panel-footer">
			<button type="submit" class="btn btn-primary btn-update-adminstration">Update <i class="fa fa-save"></i></button>

			<a href="{{ route('getChangePass') }}" class="btn btn-info btn-update-pass">Change password <i class="fa fa-key"></i></a>
		</div>
	</form>
</div>
<script type="text/javascript">
	document.forms['profileForm'].elements['role_id'].value={{ Auth::user()->role_id }}
</script>
@endsection

@section('script')
<script type="text/javascript">
	

//===========for student image=========================
		
		$('#browse_file').on('click',function(){
			$('#image').click();
		})
		$('#image').on('change',function(e){
			showfile(this,'#showPhoto')
		});
		function showfile(fileInput,img,showfile){
			if (fileInput.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e){
					$(img).attr('src', e.target.result);
				}
				reader.readAsDataURL(fileInput.files[0]);
			}
			$(showfile).text(fileInput.files[0].name);
		}

</script>
@endsection