@extends('layouts.master')
@section('style')
<style type="text/css">
    div#loadImg {
            height: 30px;
            width: 50px;
            float: right;
        }
    #loadImg .loadImg img{
        height: 80%;
        width: 80%;
    }
</style>
@endsection
@section('pageInfo')
<div class="col-lg-12">
    <h3 class="page-header"><i class="icon_documents_alt"></i>Courses</h3>
    <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
        <li><i class="icon_documents_alt"></i>Course</li> 
        <li><i class="fa fa-edit"></i>Update Course</li>                
    </ol>
</div>
@endsection
@section('content')

{{--include file--}}
@include('course.popup.academic')
@include('course.popup.class')
@include('course.popup.batch')
@include('course.popup.shift')
@include('course.popup.time')
@include('course.popup.group')





<div class="row">
    <div class="col-lg-12">
        <div id="succsess-course-msg" class="text-success"></div>
        <section class="panel panel-dafult">
            <header class="panel-heading " style="border-top: 1px solid #ccc;">
                Course <div class="error-message " style="float: right; text-align: right;"></div>
            </header>
            <form action="#" class="form-horizontal" id="form-update-course" name="editCourseForm" method="POST">
                <input type="hidden" name="active" id="active" value="1">
                <input type="hidden" name="course_id" value="{{ $courseById->course_id }}" id="course_id">
                <div class="panel-body">
                    <div class="form-group">

                        <div class="col-md-3">
                            <label for="academic-year">Academic Year</label>
                            <div class="input-group">
                                <select name="academic_id" id="academic_id" class="form-control">
                                    @foreach( $academics as $y)
                                    <option value="{{ $y->academic_id }}">{{ $y->academic }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-academic"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}

                        <div class="col-md-3">
                            <label for="program">Class</label>
                            <div class="input-group">
                                <select name="program_id" id="program_id" class="form-control">
                                    @foreach( $programs as $p)
                                    <option value="{{ $p->program_id }}">{{ $p->program }}</option>
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
                                   <option value="{{$courseById->batch_id}}">{{$courseById->batch}}</option>
                                    
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

                                    @foreach( $shifts as $s)
                                    <option value="{{ $s->shift_id }}">{{ $s->shift }}</option>
                                    @endforeach

                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-shift"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}

                        <div class="col-md-3">
                            <label for="time">Time</label>
                            <div class="input-group">
                                <select name="time_id" id="time_id" class="form-control">

                                    @foreach( $times as $t)
                                    <option value="{{ $t->time_id }}">{{ $t->time }}</option>
                                    @endforeach

                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-time"></span>
                                </div>
                            </div>
                        </div>

                        {{---------------------}}

                        <div class="col-md-3">
                            <label for="group">Group</label>
                            <div class="input-group">
                                <select name="group_id" id="group_id" class="form-control">

                                    @foreach( $groups as $g)
                                    <option value="{{ $g->group_id }}">{{ $g->group }}</option>
                                    @endforeach

                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-group"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}

                        <div class="col-md-3">
                            <label for="startDate">Start Date</label>
                            <div class="input-group">
                                <input class="form-control" type="text" value="{{ $courseById->start_date }}" name="start_date" id="start_date" placeholder="date..." />
                                <div class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}

                        <div class="col-md-3">
                            <label for="endtDate">End Date</label>
                            <div class="input-group">
                                <input class="form-control" type="text" value="{{ $courseById->end_date }}" name="end_date" id="end_date" placeholder="date..." />
                                <div class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}


                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Update Course</button>
                    <div class="full-right" id="loadImg"></div>
                </div>
            </form>
        </section>
        {{----------------------}}

    </div>
</div>
<script>
    document.forms['editCourseForm'].elements['academic_id'].value={{ $courseById->academic_id }}
    document.forms['editCourseForm'].elements['program_id'].value={{ $courseById->program_id }}
    document.forms['editCourseForm'].elements['shift_id'].value={{ $courseById->shift_id }}
    document.forms['editCourseForm'].elements['time_id'].value={{ $courseById->time_id }}
    document.forms['editCourseForm'].elements['group_id'].value={{ $courseById->group_id }}
</script>
@endsection

@section('script')
<script type="text/javascript">
    $('#error-message').hide();
    // start date 
    $('#start_date').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });
    // end date
    $('#end_date').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });
    // academic modal

    $('#add-more-academic').on('click', function () {
        $('#academic-year-show').modal();
    })
    $('.btn-save-academic').on('click', function () {
        var academic = $('#new-academic').val();
        if (academic == "") {
            $('.modal-title').html('<div style="color:red">require field!!</div>');
        } else {
            $.post("{{ route('postInsertAcademic') }}", {academic: academic}, function (data) {
                console.log(data);
                $('#academic_id').append($('<option/>', {
                    value: data.academic_id,
                    text: data.academic
                }))
                $('#new-academic').val("");
            })
        }
    })
    // class modal
    $('#add-more-class').on('click', function () {
        $('#class-modal-show').modal();
    })
    $('.btn-save-class').on('click', function () {
        var program = $('#program').val();
        var description = $('#description').val();
        var dataString = 'program=' + program + '&description=' + description;
        if (program == "" || description == "") {
            $('.modal-title').html('<div style="color:red">require field!!</div>');
        } else {
            $.post("{{ route('postInsertClass') }}", dataString, function (data) {
                //console.log(data);
                $('select #program_id, #program_id').append($('<option/>', {
                    value: data.program_id,
                    text: data.program
                }))
                $('#program').val("");
                $('#description').val("");
            })
        }

    })
    // batch modal
    $('#add-more-batch').on('click', function () {
        var programs = $('#program_id option');
        var program = $('#form-create-batch').find('#program_id');
        $(program).empty();
        $.each(programs, function (i, pro) {
            $(program).append($('<option/>', {
                value: $(pro).val(),
                text: $(pro).text()
            }))
        })

        $('#batch-modal-show').modal();
    })

    $('#form-create-batch').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.post(url, data, function (data) {
            console.log(data);
            $('#batch_id').append($('<option/>', {
                value: data.batch_id,
                text: data.batch
            }))
            $('#form-create-batch').trigger('reset');
        })
    })
    //==========batch data show by class ========
    $('#form-update-course #program_id').on('change', function (e) {
        var program_id = $(this).val();
        var batch = $('#batch_id');
        $(batch).empty();
        $.get("{{ route('getShowBatch') }}", {program_id: program_id}, function (data) {
            $.each(data, function (i, pro) {
                $(batch).append($('<option/>', {
                    value: pro.batch_id,
                    text: pro.batch
                }))
            })
        })
    })
    // shift modal
    $('#add-more-shift').on('click', function () {
        $('#shift-modal-show').modal();
    })
    $('.btn-save-shift').on('click', function () {
        var shift = $('#shift').val();
        if (shift == '') {
            $('.modal-title').html('<div style="color:red">require field!!</div>');
        } else {
            $.post("{{ route('postInsertShift')}}", {shift: shift}, function (data) {
                console.log(data);
                $('#shift_id').append($('<option/>', {
                    value: data.shift_id,
                    text: data.shift
                }))
                $('#shift').val('');
            })
        }
    })
    // time modal
    $('#add-more-time').on('click', function () {
        $('#time-modal-show').modal();
    })
    $('.btn-save-time').on('click', function () {
        var time = $('#time').val();

        if (time == "") {
            $('.modal-title').html('<div style="color:red">require field!!</div>');
        } else {
            $.post("{{ route('postInsertTime') }}", {time: time}, function (data) {
                console.log(data);
                $('#time_id').append($('<option/>', {
                    value: data.time_id,
                    text: data.time
                }))
                $('#time').val('');
            })
        }
    })
    // group modal
    $('#add-more-group').on('click', function () {
        $('#group-modal-show').modal();
    })
    $('.btn-save-group').on('click', function () {
        var group = $('#group').val();

        if (group == "") {
            $('.modal-title').html('<div style="color:red">require field!!</div>');
        } else {
            $.post("{{ route('postInsertGroup') }}", {group: group}, function (data) {
                console.log(data);
                $('#group_id').append($('<option/>', {
                    value: data.group_id,
                    text: data.group
                }))
                $('#group').val('');
            })
        }
    })
    // update course
       $('#form-update-course').on('submit', function(e){
            e.preventDefault();
            
            var allData = $('#form-update-course').serialize();
            $.post("{{ route('updateCourse') }}", allData, function(data){
                    
                    if (data=='success') {
                        $('#loadImg').html('<div class="loadImg"><img src="{{ asset("public/img/loading.gif")}}"></div>');
                        $(".error-message").fadeIn();
                        $('.error-message').html('<span style="color:green">successfully update</span>');

                        setTimeout(function(){
                                
                                $(".error-message").fadeOut();
                                $("#loadImg").fadeOut();
                        }, 5000);
                    } else {
                        
                        $(".error-message").fadeIn();
                        $('.error-message').html('<span style="color:red">Ops ! Batch field empty</span>');
                        setTimeout(function(){
                                $(".error-message").fadeOut();
                        }, 5000);
                    }

            })



       })






</script>
@endsection
