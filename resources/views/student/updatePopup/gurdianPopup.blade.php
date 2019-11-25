<div class="modal fade" id="gurdianPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="#" method="POST">
				<input type="hidden" id="gurdian_id" name="gurdian_id" value="{{$studentById['gurdian_id']}}">
				<div class="modal-header">
					<h4 class="modal-title">Gurdian details<span class="text-right" style="float: right;"></span></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<label for="fname">Father Name</label>
							<input type="text" name="father_name" id="father_name" class="form-control" value="{{ $studentById['father_name'] }}">
						</div>
						<br>
						<div class="col-sm-12">
							<label for="mname">Mother Name</label>
							<input type="text" name="mother_name" id="mother_name" class="form-control" value="{{ $studentById['mother_name'] }}">
						</div>
						<br>
						<div class="col-sm-12">
							<label for="gname">Gurdian Name</label>
							<input type="text" name="gurdian_name" id="gurdian_name" class="form-control" value="{{ $studentById['gurdian_name'] }}">
						</div>
						<br>

						<div class="col-sm-12">
							<label for="gphone">Gurdian Phone</label>
							<input type="text" name="gurdian_phone" id="gurdian_phone" class="form-control" value="{{ $studentById['gurdian_phone'] }}">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-dafult">Close</button>
					<button type="button" class="btn btn-success btn-save-gurdian">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>