<div class="panel panel-default" style="margin-top: 30px">
	<div class="panel-heading">Pay List <span style="color: green; padding-left: 20px;" class="sucmsg"></span></div>
	<div class="panel-body">
		<div class="table-responsive">
			<table style="border-collapse: collapse;" class="table-hover table-bordered" id="list-student-fee">
				<thead>
					<tr>
						<th style="text-align: center">No</th>
						<th style="text-align: center">Program</th>
						<th style="text-align: center">Batch</th>
						<th style="text-align: center">Fee</th>
						<th style="text-align: center">Amount</th>
						<th style="text-align: center">Discount</th>
						<th style="text-align: center">Paid</th>
						<th style="text-align: center">Balance</th>
						<th style="text-align: center">Action</th>
					</tr>
				</thead>
				<tbody id="tbody-student-fee">

					{{-------test-------}}
					@foreach($readStudentFee as $key => $sf)

					<tr data-id="" id="sfeeId">
						<td style="text-align: center;">{{ ++$key }}</td>
						<td style="text-align: center;">{{ $sf->program }}</td>
						<td style="text-align: center;">{{ $sf->batch }}</td>
						<td style="text-align: center;">$ {{ number_format($sf->school_fee,2)}}</td>
						<td style="text-align: center;">$ {{ number_format($sf->student_amount,2)}}</td>
						<td style="text-align: center;">{{ $sf->discount}}%</td>
						<td style="text-align: center;">
						Tk. {{ number_format($readStudentTransaction->where('s_fee_id',$sf->s_fee_id)->sum('paid'),2) }}
						<input type="hidden" name="b" id="b">
						</td>
						<td style="text-align: center; color: red; font-weight: bold;">
						Tk. {{ number_format($sf->student_amount - $readStudentTransaction->where('s_fee_id',$sf->s_fee_id)->sum('paid'),2)}}
						</td>

						<td style="text-align: center; width: 115px;">
							<a href="#" class="btn btn-success btn-xs stufee-edit" title="edit" data-id-update-student-fee="{{ $sf->s_fee_id }}">
								<i class="fa fa-edit"></i>
							</a>
							
							<button type="button" class="btn btn-danger btn-xs btn-paid" title="Complete" value="{{ $sf->student_amount - $readStudentTransaction->where('s_fee_id',$sf->s_fee_id)->sum('paid') }}" data-id-paid="{{ $sf->s_fee_id }}">
								<i class="fa fa-usd"></i>
							</button>
							
							<button class="btn btn-primary btn-xs accordion-toggle" data-toggle="collapse" data-target="#demo{{ $key }}" title="Partial"><i class="fa fa-eye"></i></button>
							
							<a href="{{ route('fullPrintInvoice',$sf->s_fee_id) }}" title="Print" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-print"></i></a>
							
						</td>
					</tr>
					
					
					{{--------}}
					<tr>
						<th colspan="9" class="hiddenrow">
							 @include('fee.list.transactionList')
						</th>
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="panel-footer" style="height: 40px;"></div>
</div>