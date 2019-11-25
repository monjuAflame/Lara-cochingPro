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
</style>
<table class="table-hover table-striped table-bordered" id="table-class-info">
	<thead>
		<tr class="text-align">
			<th style="text-align: center; width: 5%">No</th>
            <th style="text-align: center; width: 25%">Course</th>
            <th style="text-align: center; width: 15%">Batch</th>
            <th style="text-align: center; width: 20%">Shift</th>
            <th style="text-align: center; width: 20%">Group</th>
            <th style="text-align: center; width: 20%">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		@foreach($courses as $course)

			<tr >
				<td>{{ $no++ }}</td>
				<td>{{ $course->program}}</td>
				<td>{{ $course->batch}}</td>
				<td>{{ $course->shift}}</td>
				<td>{{ $course->group}}</td>
				
				<td >
					<button id="{{ $course->course_id }}" value="viewC" class="btn btn-success btn-sm viewCourse"><i class="fa fa-eye"></i></button>

					<a href="{{ route('updateCourseById',['course_id'=>$course->course_id]) }}" id="hidden" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> 

					<button value="{{ $course->course_id }}" id="deleteCourse" class="btn btn-danger btn-sm del-class"><i class="fa fa-trash-o"></i></button>
				</td>

			</tr>
		@endforeach
	</tbody>
</table>

