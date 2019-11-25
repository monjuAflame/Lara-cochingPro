@extends('layouts.master')
@section('pageInfo')
<div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-user"></i> Adminstration</h3>
    <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="{{ url('/')}}">Home</a></li>
        <li><i class="fa fa-user"></i>adminstration</li>                          
        <li><i class="fa fa-list"></i>add adminstration List</li> 
        <li>{{ Session::get('massage') }}</li> 
    </ol>
</div>
@endsection
@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-defult">
          <div class="panel-heading"> User List</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table-hover table-striped table-bordered" id="table-user-info">
					    <h3 class="text-center">Total Users :{{$users->count()}} <span id="total_records"></span></h3>
					    <thead>
					        <tr class="text-align">
					            <th style="text-align: center; width: 4%">No</th>
					            <th style="text-align: center; width: 8%">Photo</th>
					            <th style="text-align: center; width: 8%">Name</th>
					            <th style="text-align: center; width: 20%">username</th>
					            <th style="text-align: center; width: 10%">Email</th>
					            <th style="text-align: center; width: 10%">Status</th>
					            <th style="text-align: center; width: 10%">Status</th>
					            <th style="text-align: center; width: 20%">Action</th>
					        </tr>
					    </thead>
						<tbody>
		@foreach($users as $key => $user)

			
			<tr>
                <td>{{ ++$key }}</td>
                <td>
                	<img class="img-responsive" src="../..{{$url."".$user->image}}"/>
                </td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->username}}</td>
                <td>{{ $user->email}}</td>
                <td>
                	{{ $user->sex==0 ?  'Male' : 'Female' }}		
                </td>
                <td>
                	<a href="">{{ $user->active==0 ?  'Active' : 'Deactive' }}</a>		
                </td>
               
                <td >
                    @if(Auth::user()->role_id==$user->role_id)
                    <button value="viewS" class="btn btn-success btn-sm viewStudent"><i class="fa fa-eye"></i></button>
                    @else
                    <button value="viewS" disabled class="btn btn-success btn-sm viewStudent"><i class="fa fa-eye"></i></button>
                    @endif 


                    @if(Auth::user()->role_id==$user->role_id)
                    <a href="{{ route('getprofile') }}" id="hidden" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    @else
                    <a href="{{ route('getprofile') }}" disabled id="hidden" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    @endif 

                    @if(Auth::user()->role_id!=$user->role_id)
	                    @if(Auth::user()->role_id==$user->role_id)
	                    	<button value="#" id="deleteCourse" class="btn btn-danger btn-sm del-class"><i class="fa fa-trash-o"></i></button>
	                    @else
	                    <button value="#" id="deleteCourse" class="btn btn-danger btn-sm del-class"><i class="fa fa-trash-o"></i></button>
						@endif
                    @else
                    <button value="#" disabled id="deleteCourse" class="btn btn-danger btn-sm del-class"><i class="fa fa-trash-o"></i></button>

                    @endif 

                    
                </td>

            </tr>
		@endforeach
    </tbody>
					</table>
				</div>
			</div>
		<div class="panel-footer" style="height: 40px;"></div>
	</div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-user-info').DataTable();
    })
</script>
@endsection
