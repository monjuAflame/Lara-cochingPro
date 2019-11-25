<style>
	.table-fee{
		border: none;
	}
	.table-fee tr ,td ,th {
		border: none;
	}
</style>

<div class="modal fade" id="uptransaction-show" role="dialog">
	<div class="modal-dialog model-md">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<b><i class="fa fa-apple"></i>Update Transaction</b>
				</div>
				{{-----------}}
				<form action="{{ route('updateTransaction') }}" method="POST" id="frmTransact">
					<div class="panel-body">
						<div class="table-responsive">
							{{----table start----}}
							<table class="table-fee">
								<input type="text" id="transact_id" name="transact_id" class="hidden">
								<input type="text" id="fee_id" name="fee_id" class="hidden">
								<input type="text" id="user_id" name="user_id" class="hidden">
								<input type="text" id="student_id" name="student_id" class="hidden">
								<input type="text" id="s_fee_id" name="s_fee_id" class="hidden">
								<tr>
									<td><label>Transaction Date</label></td>
									<td>
										<input type="text" id="transact_date" name="transact_date" disabled>
									</td>
								</tr>
								<tr>
									<td><label>Cashier</label></td>
									<td>
										<input type="text" name="username" id="username" disabled>
									</td>
								</tr>
								<tr>
									<td><label>Paid(Tk.)</label></td>
									<td>
										<input type="text" name="paid" id="paid">
									</td>
								</tr>
								<tr>
									<td><label>Remark</label></td>
									<td>
										<input type="text" name="remark" id="remark">
									</td>
								</tr>
								<tr>
									<td><label>Description</label></td>
									<td>
										<input type="text" id="description" name="description">
									</td>
								</tr>

							</table>
							{{---end table---}}
						</div>
					</div>
					<div class="panel-footer">
						<input type="submit" class="btn btn-default create-update-transaction" value="Update Transaction">
						<button type="button" class="btn btn-default pull-right" data-dismiss='modal'>Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>