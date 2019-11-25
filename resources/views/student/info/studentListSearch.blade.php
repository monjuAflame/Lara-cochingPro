<table class="table-hover table-striped table-bordered" id="table-student-info">
    <h3 class="text-center">Total Data :{{$datas->count()}} <span id="total_records"></span></h3>
    <thead>
        <tr class="text-align">
            <th style="text-align: center; width: 4%">No</th>
            <th style="text-align: center; width: 8%">CochingID</th>
            <th style="text-align: center; width: 8%">Photo</th>
            <th style="text-align: center; width: 20%">Student Name</th>
            <th style="text-align: center; width: 10%">Gender</th>
            <th style="text-align: center; width: 10%">Email</th>
            <th style="text-align: center; width: 10%">Phone</th>
            <th style="text-align: center; width: 20%">Action</th>
        </tr>
    </thead>
    <tbody>
		@foreach($datas as $key => $data)

			<tr >
                <td>{{ ++$key }}</td>
                <td>{{ $data->coching_id}}</td>
                <td>
                	<img class="img-responsive" src="../{{$url."".$data->photo}}"/>
                </td>
                <td>{{ $data->student_name." ".$data->nick_name}}</td>
                <td>{{ $data->sex==0? 'Male' : 'Female'}}</td>
                <td>{{ $data->email}}</td>
                <td>{{ $data->phone}}</td>
                
                <td >
                     <button id="{{ $data->student_id }}" value="viewS" class="btn btn-success btn-sm viewStudent"><i class="fa fa-eye"></i></button>

                    <a href="{{ route('updateStudentById',['student_id'=>$data->student_id]) }}" id="hidden" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> 
                    <a href="{{ route('showPaymentbyid',['student_id'=>$data->student_id]) }}" id="hidden" class="btn btn-default btn-sm"><i class="fa fa-briefcase"></i></a> 

                    <button value="{{ $data->student_id }}" id="deleteCourse" class="btn btn-danger btn-sm del-class"><i class="fa fa-trash-o"></i></button>
                </td>

            </tr>
		@endforeach
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-student-info').DataTable();
    })
</script>