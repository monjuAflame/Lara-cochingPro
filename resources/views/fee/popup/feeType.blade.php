<div class="modal fade" id="feeType-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Fee Type</h4>
			</div>
			<form action="#" method="POST" name="feeTypeForm" id="feeTypeForm">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<label for="">Fee Type</label>
							<input type="text" name="fee_type" id="fee_type" class="form-control" placeholder="fee type">
						</div>
						<div class="col-sm-12">
							<label for="">Program</label>
							<select name="program_id" id="program_id" class="form-control">
                                <option value="">-----------</option>
								@foreach($programs as $program)
									<option value="{{$program->program_id}}">{{$program->program}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-sm-12">
							<label for="">Fee Type</label>
							<input type="text" name="fee_type_amount" id="fee_type_amount" class="form-control" placeholder="000.00">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-dafult">Close</button>
					<button type="button" class="btn btn-success btn-save-feeType">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>