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
	.student-detail p b {color: #007aff;}

</style>
@endsection
@section('pageInfo')
<div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-user"></i> Student</h3>
    <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="{{ url('/')}}">Home</a></li>
        <li><i class="fa fa-user"></i>student</li>                          
        <li><i class="fa fa-pencil"></i>add student</li>           
        <li><span style="color: green">{{ Session::get('sucsessmessage') }}</span></li>

    </ol>
</div>
@endsection
@section('content')
		


    	<div class="panel-group" id="accordion" style="margin-bottom: 20px;">
    		<div class="panel panel-dafult">
    			<div class="panel-heading">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration: none;">Choice Class</a>
					<a href="#" class="pull-right" id="view-class-info"><i class="fa fa-plus"></i></a>
    			</div>
    			<div class="panel-collapse collapse in" id="collapse1">
    				<div class="panel-body student-detail"><p>
    					Course: <b>{{ $studentById->program }}</b> 
    					-- Batch: <b>{{ $studentById->batch }}</b> 
    					-- Academic: <b>{{ $studentById->academic }}</b> 
    					-- Shift: <b>{{ $studentById->shift }}</b> 
    					-- Group: <b>{{ $studentById->group }}</b> 
    					-- Time: <b>{{ $studentById->time }}</b> 
    					-- StartDate: <b>{{ date('d-M-y',strtotime($studentById->start_date))}}</b> 
    					-- EndDate: <b>{{ date('d-M-y',strtotime($studentById->end_date))}}</p>
    					<span style="color: red">{{ Session::get('cmessage') }}</span></div>
    			</div>
    		</div>
    	</div>

    	<div class="panel panel-dafult">
			<div class="panel-heading">
				 <b><i class="fa fa-apple"></i>Student Information</b>
    		</div>

    		<div class="panel-body">
    			<form action="{{route('postUpdateStudent')}}" method="POST" id="form-update-student" enctype= 'multipart/form-data'>
    			{{ csrf_field() }}
    				<input type="hidden" id="student_id" name="student_id" value="{{$studentById['student_id']}}">
    				<input type="hidden" id="status_id" name="status_id" value="{{$studentById['status_id']}}">
    				<input type="hidden" id="course_id" name="course_id" value="{{$studentById['course_id']}}">
    				<input type="hidden" id="gurdian_id" name="gurdian_id" value="{{$studentById['gurdian_id']}}">
    				<input type="hidden" id="school_id" name="school_id" value="{{$studentById['school_id']}}">
    				<input type="hidden" id="address_id" name="address_id" value="{{$studentById['address_id']}}">
    				<input type="hidden" id="coching_id" name="coching_id" value="{{$studentById['coching_id']}}">
    				<input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
    				<input type="hidden" id="dateregistered" name="dateregistered" value="{{ date('Y-m-d') }}">
    				<input type="hidden" id="active" name="active" value="1">

    				<div class="row">
    					<div class="col-md-9">
    						{{---------Student Name-----------}}
							<div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="student_name">
											Student Name
										</label>
										<input type="text" name="student_name" id="student_name" class="form-control" value="{{$studentById['student_name']}}">
									</div>
								</div>
								{{---------Nick Name-----------}}

								<div class="col-md-4">
									<div class="form-group">
										<label for="nick_name">
											Nick Name
										</label>
										<input type="text" name="nick_name" id="nick_name" class="form-control" value="{{$studentById['nick_name']}}">
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
															<input type="radio" name="sex" id="sex" value="0"  <?php  if ($studentById['sex']=='0') {echo "checked";}?>>Male
														</label>
													</td>
													<td>
														<label>
															<input type="radio" name="sex" id="sex" value="1" <?php  if ($studentById['sex']=='1') {echo "checked";}?>>Female
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
											<input type="text" name="dob" id="dob" value="{{$studentById['dob']}}" class="form-control" >
										</div>
									</div>
								</div>
								{{---------Phone-----------}}
								 <div class="col-md-4">
									<div class="form-group">
										<label for="phone">
											Phone
										</label>
											<input type="text" name="phone" id="phone" value="{{$studentById['phone']}}" class="form-control">
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
															<input type="radio" name="status" id="status" value="0" <?php  if ($studentById['status']=='0') {echo "checked";}?>>Single
														</label>
													</td>
													<td>
														<label>
															<input type="radio" name="status" id="status" value="1" <?php  if ($studentById['status']=='1') {echo "checked";}?>>Married
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
											<input type="text" name="email" id="email" value="{{$studentById['email']}}" class="form-control">
									</div>
								 </div>
								 <div class="col-md-4">
									<div class="form-group">
										<label for="coching_id">
											Coching ID
										</label>
											<input type="text" name="coching_id" value="{{$studentById['coching_id']}}" id="coching_id" class="form-control" readonly>
									</div>
								 </div>
							
							<div class="col-md-4">
								<div class="panel-group" id="accordion" style="margin-bottom: 20px;">
						    		<div class="panel panel-dafult">
						    			<div class="panel-heading">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="text-decoration: none;">Gurdian Details</a>
											<a href="#" class="pull-right" id="view-gurdian"><i class="fa fa-plus"></i></a>
						    			</div>
						    			<div class="panel-collapse collapse in" id="collapse2">
						    				<div class="panel-body gurdian-detail">
						    					<span style="color: red">{{ Session::get('gmessage') }}</span>
						    					<table>
						                           <tr>
						                                <td>Father Name</td>
						                                <td>:</td>
						                                <td id="f">{{ $studentById['father_name'] }}</td>
						                           </tr>
						                           <tr>
						                                <td>Mother Name</td>
						                                <td>:</td>
						                                <td id="m">{{ $studentById['mother_name'] }}</td>
						                           </tr>
						                           <tr> 
						                                <td>Gurdian Name</td>
						                                <td>:</td>
						                                <td id="g">{{ $studentById['gurdian_name'] }}</td>
						                           </tr>
						                           <tr>
						                                 <td>Gurdian Phone</td>
						                                <td>:</td>
						                                <td id="p">{{ $studentById['gurdian_phone'] }}</td>
						                           </tr>
						                        </table>
						    				</div>
						    			</div>
						    		</div>
						    	</div>
							</div>
							<div class="col-md-4">
								<div class="panel-group" id="accordion" style="margin-bottom: 20px;">
						    		<div class="panel panel-dafult">
						    			<div class="panel-heading">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration: none;">School Details</a>
											<a href="#" class="pull-right" id="view-school"><i class="fa fa-plus"></i></a>
						    			</div>
						    			<div class="panel-collapse collapse in" id="collapse1">
						    				<div class="panel-body school-detail">
						    					<span style="color: red">{{ Session::get('smessage') }}</span>
						    					<table>
						                           <tr>
						                                <td>School Name</td>
						                                <td>:</td>
						                                <td id="sn">{{ $studentById['school_name'] }}</td>
						                           </tr>
						                           <tr>
						                                <td>School Roll</td>
						                                <td>:</td>
						                                <td id="sr">{{ $studentById['school_roll'] }}</td>
						                           </tr>
						                           <tr> 
						                                <td>School Code</td>
						                                <td>:</td>
						                                <td id="sc">{{ $studentById['school_code'] }}</td>
						                           </tr>
						                        </table>
						    				</div>
						    			</div>
						    		</div>
						    	</div>
							</div>
							<div class="col-md-4">
								<div class="panel-group" id="accordion" style="margin-bottom: 20px;">
						    		<div class="panel panel-dafult">
						    			<div class="panel-heading">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration: none;">Address Details</a>
											<a href="#" class="pull-right" id="view-address"><i class="fa fa-plus"></i></a>
						    			</div>
						    			<div class="panel-collapse collapse in" id="collapse1">
						    				<div class="panel-body address-detail">
						    					<span style="color: red">{{ Session::get('amessage') }}</span>
						    					<table>
						                           <tr>
						                                <td>Village</td>
						                                <td>:</td>
						                                <td id="av">{{ $studentById['village'] }}</td>
						                           </tr>
						                           <tr>
						                                <td>Post office</td>
						                                <td>:</td>
						                                <td id="ap">{{ $studentById['post_office'] }}</td>
						                           </tr>
						                           <tr> 
						                                <td>Zipcode</td>
						                                <td>:</td>
						                                <td id="az">{{ $studentById['zipcode'] }}</td>
						                           </tr>
						                           <tr>
						                                 <td>Upa Zilla</td>
						                                <td>:</td>
						                                <td id="au">{{ $studentById['upazilla'] }}</td>
						                           </tr>
						                           <tr>
						                                 <td>District</td>
						                                <td>:</td>
						                                <td id="ad">{{ $studentById['district'] }}</td>
						                           </tr>
						                        </table>
						    				</div>
						    			</div>
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
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="photo">

												<img class="img-responsive student-photo" id="showPhoto" src="{{ asset($url) }}" alt=" "/>
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
						<div class="col-md-3">
							<div class="form-group">
								<fieldset>
									<legent>Activity Status</legent>
									<table style="width: 100%; margin-top: 14px">
										<tr style="border-bottom: 1px solid #ccc;">
											<td>
												<label>
													<input type="radio" name="s_active" id="s_active" value="1" <?php  if ($studentById['s_active']=='1') {echo "checked";}?>>Active
												</label>
											</td>
											<td>
												<label>
													<input type="radio" name="s_active" id="s_active" value="0" <?php  if ($studentById['s_active']=='0') {echo "checked";}?>>Deactive
												</label>
											</td>
										</tr>
									</table>
								</fieldset>
							</div>
						</div>

				</div>
			
			</div>
			<div class="panel-footer">
    			<button type="submit" class="btn btn-primary btn-update-student">Update <i class="fa fa-save"></i></button>
    		</div>
    	</form>
			
     </div>

     
@include('student.popup.coursePopup')
@include('student.updatePopup.gurdianPopup')
@include('student.updatePopup.schoolPopup')
@include('student.updatePopup.addressPopup')
@endsection

@section('script')
<script type="text/javascript">
		
		// dob 
       $('#dob').datepicker({
            dateFormat:'yy-mm-dd',
            changeMonth: true,
            changeYear: true
       });

       // $('#form-update-student').on('submit',function(e){
       // 		e.preventDefault();
       // 		var data = $('#form-update-student').serialize();
       // 		// console.log(data);
       // 		$.post("{{route('postUpdateStudent')}}" , data, function (data){
       // 			console.log(data);
       // 			$('.panel-heading').html('<div style="color:green">Successfully Inserted!!</div>');
       // 		})
       // })







		showCourseInfo();

		
    
		//===========Course model get id======================
		$('#view-class-info').on('click', function(e){
			e.preventDefault();
			$('#choise-course').modal();
		})

		$(document).on('click','#useCourse',function(e){
			e.preventDefault();
			$('#course_id').val($(this).data('id'));
			$('.student-detail p').text($(this).text());
			$('#choise-course').modal('hide');
		})

		//=============gurdian======================
		$('#view-gurdian').on('click',function(e){
			e.preventDefault();
			$('#gurdianPopup').modal();
		})

		$(document).on('click', '.btn-save-gurdian',function(){
			var gurdianId = $('#gurdian_id').val();
			var fatherName = $('#father_name').val();
			var motherName = $('#mother_name').val();
			var gurdianName = $('#gurdian_name').val();
			var phone = $('#gurdian_phone').val();
			console.log(gurdianId);
			var data = 'father_name='+fatherName+'&mother_name='+motherName+'&gurdian_name='+gurdianName+'&gurdian_phone='+phone+'&gurdian_id='+gurdianId;

            if (fatherName == "" || motherName == "" || gurdianName == "" || phone == "") {
                $('.modal-title span').html('<div style="color:red">require field!!</div>');
            } else {
                $.post("{{ route('postUpdateGurdian') }}", data, function(data){
                    console.log(data);
                    $('.modal-title span').html('<div style="color:green">Successfully updated!!</div>');

                    $('#gurdian_id').val(data.gurdian_id);
                    	$('.gurdian-detail #f').html(data.father_name);
                    	$('.gurdian-detail #m').html(data.mother_name);
                    	$('.gurdian-detail #g').html(data.gurdian_name);
                    	$('.gurdian-detail #p').html(data.gurdian_phone);
                    $('#father_name').val('');
                    $('#mother_name').val('');
                    $('#gurdian_name').val('');
                    $('#gurdian_phone').val('');
                    $('#gurdianPopup').modal('hide');
                })
            }
		})

		//=============school======================
		$('#view-school').on('click',function(e){
			e.preventDefault();
			$('#schoolPopup').modal();
		})
		$(document).on('click', '.btn-save-school',function(){
			var schoolId = $('#school_id').val();
			var schoolName = $('#school_name').val();
			var schoolRoll = $('#school_roll').val();
			var schoolCode = $('#school_code').val();
			
			var data = 'school_name='+schoolName+'&school_roll='+schoolRoll+'&school_code='+schoolCode+'&school_id='+schoolId;

            if (schoolName == "" || schoolRoll == "" || schoolCode == "") {
                $('.modal-title span').html('<div style="color:red">require field!!</div>');
            } else {
                $.post("{{ route('postUpdateSchool') }}", data, function(data){
                    console.log(data);

                    $('.modal-title span').html('<div style="color:green">Successfully Updated!!</div>');
                    $('#school_id').val(data.school_id);
                    	$('.school-detail #sn').html(data.school_name);
                    	$('.school-detail #sr').html(data.school_roll);
                    	$('.school-detail #sc').html(data.school_code);
                    $('#school_name').val('');
                    $('#school_roll').val('');
                    $('#school_code').val('');
                    $('#schoolPopup').modal('hide');
                })
            }
		})


		//=============address======================
		$('#view-address').on('click',function(e){
			e.preventDefault();
			$('#addressPopup').modal();
		})
		$(document).on('click', '.btn-save-address',function(){
			var addressId = $('#address_id').val();
			var village = $('#village').val();
			var postoffice = $('#post_office').val();
			var zipcode = $('#zipcode').val();
			var upazilla = $('#upazilla').val();
			var district = $('#district').val();
			
			var data = 'village='+village+'&post_office='+postoffice+'&zipcode='+zipcode+'&upazilla='+upazilla+'&district='+district+'&address_id='+addressId;

            if (village == "" || postoffice == "" || zipcode == "" || upazilla == "" || district == "") {
                $('.modal-title span').html('<div style="color:red">require field!!</div>');
            } else {
                $.post("{{ route('postUpdateAddress') }}", data, function(data){
                    console.log(data);
                    $('.modal-title span').html('<div style="color:green">Successfully Updated!!</div>');
                    $('#address_id').val(data.address_id);
                    	$('.address-detail #av').html(data.village);
                    	$('.address-detail #ap').html(data.post_office);
                    	$('.address-detail #az').html(data.zipcode);
                    	$('.address-detail #au').html(data.upazilla);
                    	$('.address-detail #ad').html(data.district);
                    $('#village').val('');
                    $('#post_office').val('');
                    $('#zipcode').val('');
                    $('#upazilla').val('');
                    $('#district').val('');
                    $('#addressPopup').modal('hide');
                })
            }
		})

//===========================================================================
//========================filtering search====================================

	    // get batch & search by program
	    $('#form-update-course #program_id').on('change',function(e){
	            var program_id = $(this).val();
	            var batch = $('#batch_id');
	            $(batch).empty();
	            $.get("{{ route('getShowBatch') }}",{program_id:program_id},function(data){
	                $.each(data,function(i,pro){
	                    $(batch).append($('<option/>',{
	                        value : pro.batch_id,
	                        text  : pro.batch
	                    }))
	                })
	            })
	            showCourseInfo()
	    })


	    // search by academic
	    $('#group_id').on('change', function (e) {
	          showCourseInfo()
	    })
	    // search by batch
	    $('#batch_id').on('change', function (e) {
	          showCourseInfo()
	    })
	    // search by shift
	    $('#shift_id').on('change', function (e) {
	          showCourseInfo()
	    })
	    
	    // load course list
	    function showCourseInfo(){
	        $('#show-class-info').html('<div class="loadImg"><img src="{{ asset("public/img/loading.gif")}}"></div>');
	        var data = $('#form-update-course').serialize();
	        $.get("{{ route('filterCourseForStudent') }}",data,function(data){
	          $('#show-class-info').empty().append(data);
	                $('table tbody tr td.hidden').hide();
	                $('table thead tr th.hidden').hide();
	        })
	    }

		//===========for student image=========================
		
		$('#browse_file').on('click',function(){
			$('#photo').click();
		})
		$('#photo').on('change',function(e){
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
