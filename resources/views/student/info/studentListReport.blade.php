<table class="table-hover table-striped table-bordered" id="table-student-info">
    <h4 class="text-center">Total Data :{{$stReports->count()}} </h4>
    <h5 class="text-center" style="background: #1a2731; color:#fff; padding: 5px">{{$stReports[0]->detals}}</h5>
    <thead>
        <tr class="text-align">
            <th style="text-align: center; width: 10%">CochingID</th>
            <th style="text-align: center; width: 20%">Student Name</th>
            <th style="text-align: center; width: 15%">Gender</th>
            <th style="text-align: center; width: 10%">Program</th>
            <th style="text-align: center; width: 10%">DOB</th>
        </tr>
    </thead>
    <tbody>
		@foreach($stReports as $key => $stReport)

            <tr >
                <td>{{ $stReport->coching_id}}</td>
                
                <td>{{ $stReport->name}}</td>
                <td>{{ $stReport->sex}}</td>
                <td>{{ $stReport->program}}</td>
                <td>{{ $stReport->dob}}</td>

            </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-student-info').DataTable({
            dom: 'Bfrtip',
            buttons:[
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    })
</script>