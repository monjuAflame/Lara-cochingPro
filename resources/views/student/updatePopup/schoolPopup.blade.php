<div class="modal fade" id="schoolPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="#" method="POST">
				<input type="hidden" id="school_id" name="school_id" value="{{$studentById['school_id']}}">
				<div class="modal-header">
					<h4 class="modal-title">School Details<span class="text-right" style="float: right;"></span></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<label for="sn">School Name</label>
							<input type="text" name="school_name" id="school_name" class="form-control" value="{{ $studentById['school_name'] }}">
						</div>
						<br>
						<div class="col-sm-12">
							<label for="sr">School Roll</label>
							<input type="text" name="school_roll" id="school_roll" class="form-control" value="{{ $studentById['school_roll'] }}">
						</div>
						<br>
						<div class="col-sm-12">
							<label for="sc">School Code</label>
							<input type="text" name="school_code" id="school_code" class="form-control" value="{{ $studentById['school_code'] }}">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-dafult">Close</button>
					<button type="button" class="btn btn-success btn-save-school">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>