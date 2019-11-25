<div class="modal fade" id="addressPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="#" method="POST">
				<input type="hidden" id="address_id" name="address_id" value="{{$studentById['address_id']}}">
			<div class="modal-header">
				
				<h4 class="modal-title">Address Details <span class="text-right" style="float: right;"></span></h4>
				
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<label for="village">Village</label>
						<input type="text" name="village" id="village" class="form-control" value="{{ $studentById['village'] }}">
					</div>
					<br>
					<div class="col-sm-12">
						<label for="post_office">Post Office</label>
						<input type="text" name="post_office" id="post_office" class="form-control" value="{{ $studentById['post_office'] }}">
					</div>
					<br>
					<div class="col-sm-12">
						<label for="zipcode">Zip Code</label>
						<input type="text" name="zipcode" id="zipcode" class="form-control" value="{{ $studentById['zipcode'] }}">
					</div>
					<br>

					<div class="col-sm-12">
						<label for="upazilla">Upa Zilla</label>
						<input type="text" name="upazilla" id="upazilla" class="form-control" value="{{ $studentById['upazilla'] }}">
					</div>
					<br>

					<div class="col-sm-12">
						<label for="district">District</label>
						<input type="text" name="district" id="district" class="form-control" value="{{ $studentById['district'] }}">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-dafult">Close</button>
				<button type="button" class="btn btn-success btn-save-address">Update</button>
			</div>
		</form>
		</div>
	</div>
</div>