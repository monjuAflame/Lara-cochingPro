@extends('layouts.master')
@section('style')
<style type="text/css">
    .academic-details{
        width: 440px;
    }
    #table-class-info{
        width: 100%;
    }
    table  tbody > tr > td {
        vertical-align: middle;
        text-align: center;
    }
    table thead tr > th {
        text-align: center;
    }
    .search-body {
    margin-bottom: 10px;
    position: relative;
    padding-bottom: 45px;
}
</style>
@endsection
@section('pageInfo')
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_documents_alt"></i>Student</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
            <li><i class="icon_documents_alt"></i>Student</li> 
            <li><i class="fa fa-pencil"></i>Student List</li>                
            <li><p class="valid"></p></li>                
        </ol>
    </div>
@endsection
@section('content')

{{--include file--}}
@include('student.info.studentViewDetails')

<div class="row">
    <div class="col-lg-12">
        
            
    	   
         {{----------------------}}
          <div class="panel panel-defult">
          <div class="panel-heading" style="background: #00a0df">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration: none; color: #fff">Student Report</a>
            <a href="#" class="pull-right" id="view-class-info" style="color: #fff"><i class="fa fa-plus"></i></a>
          </div>

                    <div class="search-body">
                            {{---------------------}}
                            <div class="col-md-3">
                                <label for="group">Search</label>
                                <div class="input-group">
                                    <input type="text" name="search_name" id="search_name" placeholder="search ..." class="form-control">
                                </div>
                            </div>
                            {{---------------------}}
                    </div>
            
                <div class="panel-body" id="show-student-info">
                  
                </div>
            </div>
    </div>
</div>
@include('student.popup.coursePopup')
@endsection

@section('script')
	<script type="text/javascript">
    showCourseInfo()
    //===========Course model get id======================
    $('#view-class-info').on('click', function(e){
      e.preventDefault();
      $('#choise-course').modal();
    })

    $(document).on('click','#useCourse',function(e){
      e.preventDefault();
      var course_id = $(this).data('id');
      $.get("{{ route('showStudentReport') }}",{course_id:course_id},function(data){
          $('#show-student-info').empty().append(data);
          $('#choise-course').modal('hide');
      })
                
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
        $(document).ready(function(){

             fetch_customer_data();

             $(document).on('keyup', '#search_name', function(){
              var query = $(this).val();
              fetch_customer_data(query);
             });

             // function fetch_customer_data(query = '')
             // {
             //  $.ajax({
             //   url:"{{ route('live_search.action') }}",
             //   method:'GET',
             //   data:{query:query},
             //   dataType:'json',
             //   success:function(data)
             //   {
             //    //$('#show-student-info').empty().append(data);
             //     $('tbody').html(data.table_data);
             //     $('#total_records').text(data.total_data);
             //   }
             //  })
             // }
            function fetch_customer_data(query = ''){
               $('#show-class-info').html('<div class="loadImg"><img src="{{ asset("public/img/loading.gif")}}"></div>');
              $.get("{{ route('live_search.action') }}",{query:query},function(data){
                  $('#show-student-info').empty().append(data);
              })
            }
             
        
        

             


            // view
            $(document).on('click','.viewStudent',function(){
                var id = $(this).attr('id');
               
               $.post("{{ route('viewStudentDetails') }}", {id:id} ,function(data){
                    console.log(data);
                    $('#viewCoursep').empty().append(data);
                    $('#studentView').modal();
                })
                
            })

        });


        $(document).on('click','.del-class',function(){
            var student_id = $(this).val();
            console.log(student_id);
            if (confirm('Are You Sure to Remove')) {
                $.post("{{ route('deteteStudent') }}", {student_id:student_id},function(data){
                    console.log(data);
                    $('.valid').html(data);
                    fetch_students();
                })
            }
            
        })
     $(document).ready(function(){
            $('#table-student-info').DataTable();
        })


	</script>
@endsection
