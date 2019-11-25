@extends('layouts.master')
@section('style')
<style type="text/css">
	.adminstration-photo{
		height: 160px;
		padding-left: 3px;
		padding-right: 1px;
		border: 1px solid #ccc;
		background: #eee;
		width: 140px;
		margin: 0 auto;
	}
	.photo input {
		display: none;
	}
	.photo{
		width: 140px;
		height: 140px;
		border-radius: 100%;
	}
	.syudent-id{
		background-repeat: repeat-x;
		border-color: #ccc;
		padding: 5px;
		text-align: center;
		background: #eee;
		border-bottom: 1px solid #ccc;
	}
	.btn-browse{
		background-repeat: repeat-x;
		border-color: #ccc;
		padding: 5px;
		text-align: center;
		background: #eee;
		border-bottom: 1px solid #ccc;
	}
	fieldset{
		margin-top: 5px;

	}
	fieldset legend{
		display: block;width: 100%;
		padding: 0px;
		font-size: 15px;
		line-height: inherit;
		color: #797979;
		border: 0px;
		border-bottom: 1px solid #e5e5e5;
	}

</style>
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
			 <b><i class="fa fa-user"></i>Add Adminstration</b>
		</div>
	<form action="{{ route('adminstrationRegister') }}" method="POST" id="registerForm" enctype= 'multipart/form-data'>
		{{ csrf_field() }}
		<div class="panel-body">
			<div class="row">
				<div class="col-md-9">
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" class="form-control">
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
												<input type="radio" name="sex" id="sex" value="0" >Male
											</label>
										</td>
										<td>
											<label>
												<input type="radio" name="sex" id="sex" value="1" >Female
											</label>
										</td>
									</tr>
								</table>
							</fieldset>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="role">Role</label>
							<select name="role_id" id="role_id" class="form-control">
								<option value="">------</option>
								@foreach($roles as $role)
									<option value="{{ $role->role_id }}">{{$role->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="password">Password</label>
							<input type="text" name="password" id="password" class="form-control">
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
												<input type="radio" name="active" id="status" value="0" >Active
											</label>
										</td>
										<td>
											<label>
												<input type="radio" name="active" id="status" value="1" >Deactive
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
							<input type="text" name="email" id="email" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="form-group form-group-login">
								<table style="margin: 0 auto">
									<thead>
										<tr class="info">
											<th class="adminstration-id">
												00000
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="photo">

												<img class="img-responsive adminstration-photo" id="showPhoto" src="" alt=" "/>

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
			<button type="submit" class="btn btn-primary btn-register-adminstration">Create <i class="fa fa-save"></i></button>
		</div>
	</form>
</div>
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