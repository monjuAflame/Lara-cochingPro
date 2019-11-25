@extends('layouts.master')
@include ('fee.css.styleSheet')
@section('pageInfo')
<div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-user"></i> Payment</h3>
    <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="{{ url('/')}}">Home</a></li>
        <li><i class="fa fa-user"></i>payment</li>                          
        <li><i class="fa fa-pencil"></i>add payment</li>           
        

    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="panel panel-dafult">
			<div class="panel-heading" style="background: #00a0df;">
				<div class="com-md-3" style="margin-top: 15px;">
					<form action="{{ route('showPayment') }}" method="GET" class="search-payment">
						<div class="input-group">
							<input type="text" class="form-control" id="coching_id" name="coching_id" placeholder="Student ID">
							<div class="input-group-addon">
								<button style="border: none;background: none;"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
				</div>


				<div class="col-md-3" style="margin-top: 15px;">
					<label for="name">Name: <b class="student-name"></b></label>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-3" style="text-align: right;">
					<label for="" class="date-invoice">Date <b>{{ date('d-M-Y')}}</b></label>
				</div>
				<div class="col-md-3" style="text-align: right;">
					<label for="" class="invoice-number">Receipt NO<b></b></label>
				</div>
    		</div>
			<div class="panel-body">
				<table>
					<caption class="academicdetail">
						
					</caption>
					<thead>
						<tr>
							<th>Course</th>
							<th>Batch</th>
							<th>School Fee($)</th>
							<th>Amount($)</th>
							<th>Dis(%)</th>
							<th>Paid($)</th>
							<th>Amount Lack($)</th>
						</tr>
					</thead>
						<tr>
							<td>
								<select name="academic_id" id="AcademicID">
									<option value="">-----------</option>
								</select>
							</td>
							<td>
								<select>
									<option value="">-----------</option>
								</select>
							</td>
							<td>
								<input type="text" name="fee" id="fee" readonly="true">
								<input type="hidden" name="fee_id" id="FeeID">
								<input type="hidden" name="student_id" id="StudentID">
								<input type="hidden" name="level_id" id="LevelID">
								<input type="hidden" name="user_id" id="UserID">
								<input type="hidden" name="transDate" id="transDate">
							</td>
							<td>
								<input type="text" name="amount" id="Amount" required>
							</td>
							<td>
								<input type="text" name="discount" id="Discount">
							</td>
							<td>
								<input type="text" name="paid" id="Paid">
							</td>
							<td>
								<input type="text" name="balance" id="Balance">
							</td>
						</tr>

					<thead>
						<tr>
							<th colspan="2">Remark</th>
							<th colspan="5">Description</th>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="description" id="description">
							</td>
							<td colspan="5">
								<input type="text" name="remark" id="remark">
							</td>
						</tr>
					</thead>
				</table>
			</div>
			<div class="panel-footer" style="height: 40px;">
				
			</div>
    	</div>
    </div>
</div>
@endsection