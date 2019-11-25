<div class="accordion-body collapse {{$key==0 ? 'id' : null }}" id="demo{{ $key }}">
	<table>
		<thead>
			<tr style="background: #f1d359">
				<th style="text-align: center;"><i class="fa fa-clock-o"></i></th>
				<th>Transaction Date</th>
				<th>Cashier</th>
				<th>Paid ($)</th>
				<th>Remark</th>
				<th>Description</th>
				<th style="text-align: center;">Action</th>
			</tr>
		</thead>

		<tbody>
			@php
				$i = 1
			@endphp
			@foreach($readStudentTransaction->where('s_fee_id',$sf->s_fee_id) as $key => $st)
			
			<!-- @if($st->s_fee_id == $sf->s_fee_id) -->
			<tr style="background: #fff6d1">
				<td>{{ $i++ }}</td>
				<td>{{ $st->transact_date }}</td>
				<td>{{ $st->username }}</td>
				<td>Tk. {{ number_format($st->paid,2) }}</td>
				<td>{{ $st->remark }} </td>
				<td>{{ $st->description }}</td>
				<td style="text-align: center; width: 112px;">

					<button data-id-transact="{{ $st->transact_id }}" class="btn btn-primary btn-xs transaction-edit" ><i class="fa fa-edit"></i></button>
					
					<a href="{{ route('deletTransaction',$st->transact_id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>

					<a href="{{ route('printInvoice',$st->receipt_id) }}" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-print"></i></a>
				</td>
			</tr>
			<!-- @endif -->
			@endforeach
			<tr style="background: #f1d359">
				<td></td>
				<td></td>
				<td style="color: green">Total Paid</td>
				<td style="color: green">Tk. {{ number_format($readStudentTransaction->where('s_fee_id',$sf->s_fee_id)->sum('paid'),2)}}</td>
				<td style="color: red">Due</td>
				<td style="color: red">Tk. {{ number_format($sf->student_amount - $readStudentTransaction->where('s_fee_id',$sf->s_fee_id)->sum('paid'),2)}}</td>
				<td></td>
			</tr>
		</tbody>
	</table>

</div>