<div class="modal fade" id="batch-modal-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Batch</h4>
			</div>
			<div class="modal-body">
				<form action="{{ route('postInsertBatch') }}" method="POST" id="form-create-batch">
					<div class="row">
						<div class="col-sm-12">
							<select class="form-control" name="program_id" id="program_id"></select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<input type="text" name="batch" id="batch" class="form-control" placeholder="Batch Name...">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<input type="text" name="description" id="description" class="form-control" placeholder="Description">
						</div>
					</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-dafult">Close</button>
				<button type="submit" class="btn btn-success btn-save-batch">Save</button>
			</div>
		</form>
		</div>
	</div>
</div>