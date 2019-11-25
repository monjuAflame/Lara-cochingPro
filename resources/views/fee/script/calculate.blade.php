<script type="text/javascript">
	

$(document).on("change keyup", "#Amount", function(){

	

	var fee = $('#Fee').val();
	var amt = $('#Amount').val();
	var paid = $('#Paid').val($('#Amount').val());
	var dis = 0;

	if (paid != '' && amt != '') {
		paid = parseFloat($('#Amount').val())
		var dis = ((( parseFloat(fee) - parseFloat(paid)) / fee) * 100);
		$('#Due').val(parseFloat(amt) - parseFloat(paid));
	}
	if (amt!='' && paid!='') {
		$('#Paid').val();
		$('#Discount').val();
	}
	if (parseFloat(amt) > parseFloat(fee)) {
		$('#Discount').css("color",'red');
	} else{
		$('#Discount').css("color",'green');
	}
	$('#Discount').val(parseInt(dis));

});

//====================================================

$(document).on("change keyup", "#Discount", function(){

	

	var fee = parseFloat($('#Fee').val());
	var dis = 0;
	dis = ((fee * parseFloat($(this).val()))) / 100;
	var amt = fee - dis;
	
	$('#Paid').val(parseFloat(amt));
	$('#Amount').val(parseInt(amt));

});

//=======================================


$(document).on("change keyup", "#Paid", function(){

	

	b = $('#Amount').val();

	var pay = $('#Paid').val();

	if (pay=='') {$('#Due').val(0)}
	if (pay!='') {
		paid = parseFloat($('#Paid').val());
	}

	if (pay!='' && b!='') {
		var due = parseFloat(b) - parseFloat(paid)
		$('#Due').val(parseFloat(due));
	}
	if ($('#Due').val()<0) {
		$('#Due').css("color",'red');
	} else{
		$('#Due').css("color",'black');
	}

});
//=======================================


$(document).on("change keyup", "#Pay", function(){

	

	b = $('#b').val();

	var pay = $('#Pay').val();

	if (pay=='') {$('#Due').val(0)}

	if (pay!='') {
		paid = parseFloat($('#Pay').val());
	}

	if (pay!='' && b!='') {
		var lak = parseFloat(b) - parseFloat(paid)
		$('#Due').val(parseFloat(lak));
	}
	if ($('#Due').val()<0) {
		$('#Due').css("color",'red');
	} else{
		$('#Due').css("color",'black');
	}

});



</script>