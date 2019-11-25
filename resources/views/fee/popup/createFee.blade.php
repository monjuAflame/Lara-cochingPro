<style>
	.table-fee{
		border: none;
	}
	.table-fee tr ,td ,th {
		border: none;
	}
</style>

<div class="modal fade" id="createFeePopup" role="dialog">
	<div class="modal-dialog model-md">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<b><i class="fa fa-apple"></i> Create School Fee</b>
				</div>
				{{-----------}}
				<form action="#" method="POST" id="frmFee">
					<div class="panel-body">
						<div class="table-responsive">
							{{----table start----}}
							<table class="table-fee">
								<tr>
									<td><label>Fee Type</label></td>
									<td>
										<select name="fee_type_id" id="fee_type_id" class="form-control" disabled>
											@foreach($feeType as $ft)
												<option value="{{ $ft->fee_type_id }}" >{{ $ft->fee_type }}</option>
											@endforeach
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Fee Type</label></td>
									<td>
										<input type="text" name="fee_heading" id="fee_heading" value="Fees" disabled>
									</td>
								</tr>
								<tr>
									<td><label>Academic Year</label></td>
									<td>
										<input type="text" value="{{ $studentDetail->academic }}" disabled>
										<input type="hidden" name="academic_id" id="academic_id" value="{{ $studentDetail->academic_id }}">
									</td>
								</tr>
								<tr>
									<td><label>Program</label></td>
									<td>
										<input type="text" value="{{ $studentDetail->program }}" disabled>
									</td>
								</tr>
								<tr>
									<td><label>Batch</label></td>
									<td>
										<input type="text" value="{{ $studentDetail->batch }}" disabled>
										<input type="hidden" name="batch_id" id="batch_id" value="{{ $studentDetail->batch_id }}" disabled>
									</td>
								</tr>
								<tr>
									<td><label>School Fee($)</label></td>
									<td>
										<input type="text" name="amount" id="amount" placeholder="Amount" class="form-control" autocomplete="off" required>
									</td>
								</tr>

							</table>
							{{---end table---}}
						</div>
					</div>
					<div class="panel-footer">
						<input type="submit" class="btn btn-default create-fee-save" value="Create Fee">
						<button type="button" class="btn btn-default pull-right" data-dismiss='modal'>Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>