@extends('layouts.master')
@section('style')
<style type="text/css">
	.student-photo{
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
    <h3 class="page-header"><i class="fa fa-user"></i> Teacher</h3>
    <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="{{ url('/')}}">Home</a></li>
        <li><i class="fa fa-user"></i>teacher</li>                          
        <li><i class="fa fa-pencil"></i>add teacher</li>           
        <li><i class="fa fa-pencil"></i><span style="color: green">{{ Session::get('sucsessmessage') }}</span></li>

    </ol>
</div>
@endsection
@section('content')
	<div class="panel panel-dafult">
			<div class="panel-heading">
				 <b><i class="fa fa-apple"></i>Teacher Register</b>
    		</div>

    		<div class="panel-body">
    			<form action="{{route('postInsertStudent')}}" method="POST" id="form-create-student" enctype= 'multipart/form-data'>
    			{{ csrf_field() }}
    				
    				<div class="row">
    					<div class="col-md-9">
    						{{---------Student Name-----------}}
							<div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="teacher_name">
											Teacher Name
										</label>
										<input type="text" name="teacher_name" id="teacher_name" class="form-control">
									</div>
								</div>
								{{---------Nick Name-----------}}

								<div class="col-md-4">
									<div class="form-group">
										<label for="nick_name">
											Nick Name
										</label>
										<input type="text" name="nick_name" id="nick_name" class="form-control">
									</div>
								</div>

								{{---------Sex-----------}}

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


								{{---------DOB-----------}}
							    <div class="col-md-4">
									<div class="form-group">
										<label for="dob">
											Date of Birth
										</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calender studentdob"></i>
											</div>
											<input type="text" name="dob" id="dob" placeholder="yyyy-mm-dd" class="form-control" >
										</div>
									</div>
								</div>
								{{---------Phone-----------}}
								 <div class="col-md-4">
									<div class="form-group">
										<label for="phone">
											Phone
										</label>
											<input type="text" name="phone" id="phone" class="form-control">
									</div>
								</div>
								{{--------status-----------}}

								<div class="col-md-4">
									<div class="form-group">
										<fieldset>
											<legent>Status</legent>
											<table style="width: 100%; margin-top: 14px">
												<tr style="border-bottom: 1px solid #ccc;">
													<td>
														<label>
															<input type="radio" name="status" id="status" value="0" >Single
														</label>
													</td>
													<td>
														<label>
															<input type="radio" name="status" id="status" value="1">Married
														</label>
													</td>
												</tr>
											</table>
										</fieldset>
									</div>
								</div>
						
								{{---------Email-----------}}
								 <div class="col-md-8">
									<div class="form-group">
										<label for="email">
											Email
										</label>
											<input type="text" name="email" id="email" class="form-control">
									</div>
								 </div>
								 <div class="col-md-2">
									<div class="form-group">
										<label for="coching_id">
											Teacher ID
										</label>
											<input type="text" value="" name="teacher_id" id="teacher_id" class="form-control" readonly>
									</div>
								 </div>
								 <div class="col-md-2">
									<div class="form-group">
										<label for="profession">
											Profession
										</label>
										<div class="panel-heading">
											<a href="#" class="pull-right" id="profession"><i class="fa fa-plus"></i></a>
						    			</div>
									</div>
								 </div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="form-group form-group-login">
								<table style="margin: 0 auto">
									<thead>
										<tr class="info">
											<th class="student-id">
												00000
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="photo">

												<img class="img-responsive student-photo" id="showPhoto" src="" alt=" "/>

												<input type="file" name="photo" id="photo" accept="image/*">
												
												
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
			{{--------address----------}}
			<div class="panel-heading" style="margin-top: 70px;">
				 <b><i class="fa fa-apple"></i>Address</b>
    		</div>
    		<div class="panel-body" style="padding-bottom: 10px;margin: 0;">
    			<div class="row">
    				<div class="col-md-3">
    					<div class="form-group">
    						<label for="village">Village</label>
    						<input type="text" class="form-control" id="village" name="village">
    					</div>
    				</div>
    				<div class="col-md-3">
    					<div class="form-group">
    						<label for="upazilla">Upazilla</label>
    						<input type="text" class="form-control" id="commune" name="upazilla">
    					</div>
    				</div>
    				<div class="col-md-3">
    					<div class="form-group">
    						<label for="zipCode">Zip Code</label>
    						<input type="number" class="form-control" id="zipCode" name="zipCode">
    					</div>
    				</div>
    				<div class="col-md-3">
    					<div class="form-group">
    						<label for="zilla">Zilla</label>
    						<input type="text" class="form-control" id="zilla" name="zilla">
    					</div>
    				</div>
    				<div class="col-md-11">
    					<div class="form-group">
    						<label for="current_address">Current Address</label>
    						<input type="text" class="form-control" id="current_address" name="current_address">
    					</div>
    				</div>


	    		</div>
	    	</div>
			<div class="panel-footer">
    			<button type="submit" class="btn ntn-default btn-save-student">Save <i class="fa fa-save"></i></button>
    		</div>
    	</form>
			</div>
			
			
     </div>
@include('teacher.popup.profesionPopup')
@endsection

@section('script')
	
	<script type="text/javascript">
		$('#profession').on('click',function(e){
			e.preventDefault();
			$('#profesionPopup').modal();
		})




	</script>


@endsection