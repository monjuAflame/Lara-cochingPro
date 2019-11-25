<style>
	.table-fee{
		border: none;
	}
	.table-fee tr ,td ,th {
		border: none;
	}
</style>

<div class="modal fade" id="upStudentFee" role="dialog">
	<div class="modal-dialog model-md">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<b><i class="fa fa-apple"></i>Update Student Fees</b>
				</div>
				{{-----------}}
				<form action="{{ route('updateStudentFees') }}" method="POST" id="frmStudentFees">
					<div class="panel-body">
						<div class="table-responsive">
							{{----table start----}}
							<table class="table-fee">
								
								<input type="text" id="fee_id" name="fee_id" class="hidden">
								<input type="text" id="student_id" name="student_id" class="hidden">
								<input type="text" id="s_fee_id" name="s_fee_id" class="hidden">
								<tr>
									<td><label>Program</label></td>
									<td>
										<input type="text" id="program" name="program" disabled>
										
									</td>
								</tr>
								<tr>
									<td><label>Batch</label></td>
									<td>
										<input type="text" name="batch" id="batch" disabled>
										<input type="text" name="batch_id" id="batch_id" class="hidden">
									</td>
								</tr>
								<tr>
									<td><label>Coching Fees(Tk.)</label></td>
									<td>
										<input type="text" name="sfees" id="sfees" disabled>
									</td>
								</tr>
								<tr>
									<td><label>Student Amount(Tk.)</label></td>
									<td>
										<input type="text" name="amount" id="sfAmount">
									</td>
								</tr>
								<tr>
									<td><label>Discount(%)</label></td>
									<td>
										<input type="text" name="discount" id="sfDiscount" disabled>
									</td>
								</tr>

							</table>
							{{---end table---}}
						</div>
					</div>
					<div class="panel-footer">
						<input type="submit" class="btn btn-default create-update-studentFees" value="Update Transaction">
						<button type="button" class="btn btn-default pull-right" data-dismiss='modal'>Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>