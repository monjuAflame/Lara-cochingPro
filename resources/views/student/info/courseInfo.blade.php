<style type="text/css">
	.academic-details {
	    width: 280px;
	    color: #007aff;
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
	.course-details button b {color: #007aff;}
</style>
<table class="table-hover table-striped table-bordered" id="table-class-info">
	<thead>
		<tr class="text-align">
			<th>Program</th>
			<th>Batch</th>
			<th>Shift</th>
			<th>Use course</th>
		</tr>
	</thead>
	<tbody>
		@foreach($courses as $course)
			<tr>
				<td>{{ $course->program}}</td>
				<td>{{ $course->batch}}</td>
				<td>{{ $course->shift}}</td>
				<td class="course-details">
					
					  <button href="#" data-id="{{ $course->course_id }}" id="useCourse">
					  	Course: <b>{{ $course->program }}</b> 
					  	-- Batch: <b>{{ $course->batch }}</b> 
					  	-- Academic: <b>{{ $course->academic }}</b> 
					  	-- Shift: <b>{{ $course->shift }}</b> 
					  	-- Group: <b>{{ $course->group }}</b> 
					  	-- Time: <b>{{ $course->time }}</b> 
					  	-- StartDate: <b>{{ date('d-M-y',strtotime($course->start_date))}}</b> 
					  	-- EndDate: <b>{{ date('d-M-y',strtotime($course->end_date))}}</b>
					  </button>
					
				</td>
			</tr>
		@endforeach
	</tbody>
</table>