@extends('layouts.master')
@section('style')
<style type="text/css">
    .academic-details{
        width: 440px;
    }
    #table-class-info{
        width: 100%;
    }
    #viewCoursep table  tbody > tr > td {
        vertical-align: middle;
        text-align: left;
    }
    table  tbody > tr > td {
        vertical-align: middle;
        text-align: center;
    }
    table thead tr > th {
        text-align: center;
    }
    table tbody tr.red{
        background: red;
        color: #fff;
    }
    .loadImg {
    text-align: center;
    }
</style>
@endsection
@section('pageInfo')
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_documents_alt"></i>Courses</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
            <li><i class="icon_documents_alt"></i>Course</li> 
            <li><i class="fa fa-pencil"></i>Course List</li>                
        </ol>
    </div>
@endsection
@section('content')

{{--include file--}}
@include('course.info.courseView')


<div class="row">
    <div class="col-lg-12">
        <div id="succsess-course-msg" class="text-success"></div>
    	<section class="panel panel-dafult">
    		<header class="panel-heading " style="border-top: 1px solid #ccc;">
    			Filter Search<div class="error-message " style="float: right; text-align: right;"></div>
    		</header>
    		<form action="#" class="form-horizontal" id="form-update-course" method="POST">
                <input type="hidden" name="active" id="active" value="1">
    			<div class="panel-body">

    				<div class="form-group">
                        {{---------------------}}
                        <div class="col-md-3">
                            <label for="program">Class</label>
                            <div class="input-group">
                                <select name="program_id" id="program_id" class="form-control">
                                    <option value="">---------</option>
                                    @foreach( $programs as $program)
                                        <option value="{{ $program->program_id }}">{{ $program->program }}</option>
                                    @endforeach
                                
                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-class"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}
                        
                        <div class="col-md-3">
                            <label for="level">Batch</label>
                            <div class="input-group">
                                <select name="batch_id" id="batch_id" class="form-control">
                                    <option value="">---------</option>
                                    
                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-batch"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}

                        <div class="col-md-3">
                            <label for="shift">Shift</label>
                            <div class="input-group">
                                <select name="shift_id" id="shift_id" class="form-control">
                                    
                                    <option value="">---------</option>
                                    @foreach( $shifts as $shift)
                                        <option value="{{$shift->shift_id}}">{{$shift->shift}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-shift"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}

                        <div class="col-md-3">
                            <label for="group">Group</label>
                            <div class="input-group">
                                <select name="group_id" id="group_id" class="form-control">
                                    
                                    <option value="">---------</option>
                                    @foreach( $groups as $group)
                                        <option value="{{$group->group_id}}">{{$group->group}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-group"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}
    					
    					
                

    				</div>
                </div>
                </form>
    			
				
    		
        </section>
         {{----------------------}}
            <div class="panel panel-defult">
                <div class="panel-heading">Course Information</div>
                <div class="panel-body" id="show-class-info">
                    
                       
                            
                
                </div>
            </div>
    </div>
</div>

@endsection

@section('script')
	<script type="text/javascript">
     showCourseInfo()
    

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
    // delete course
    $(document).on('click','.del-class',function(){
            var course_id = $(this).val();
            
            if (confirm('Are You Sure to Remove')) {
                $.post("{{ route('deleteCourse') }}",{course_id:course_id},function(data){
               
                        $('#show-class-info').html('<div class="loadImg"><img src="{{ asset("public/img/loading.gif")}}"></div>');
                        if (data=='success') {
                            $(".error-message").fadeIn();
                            $('.error-message').html('<span style="color:green">successfully Delete</span>');
                            setTimeout(function(){
                                    $(".error-message").fadeOut();
                                    showCourseInfo()
                            }, 5000);
                        } else {
                            
                            $(".error-message").fadeIn();
                            $('.error-message').html('<span style="color:red">Ops ! Batch field empty</span>');
                            setTimeout(function(){
                                    $(".error-message").fadeOut();
                            }, 5000);
                        }
                        
                        $('#show-class-info').show();
                })
            }
            
    })
    // load course list
    function showCourseInfo(){
        $('#show-class-info').html('<div class="loadImg"><img src="{{ asset("public/img/loading.gif")}}"></div>');
        var data = $('#form-update-course').serialize();
        $.get("{{ route('filterSearchCourse') }}",data,function(data){
            console.log(data);
            $('#show-class-info').empty().append(data);
        })
    }
    // view
    $(document).on('click','.viewCourse',function(){
        var id = $(this).attr('id');
      
       
       $.get("{{ route('viewCourse') }}", {id:id} ,function(data){
          
            $('#viewCoursep').empty().append(data);
            $('#courseView').modal();
        })
    
    })



	</script>
@endsection
