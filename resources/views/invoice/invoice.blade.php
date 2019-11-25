<!DOCTYPE html>
<html>
<head>
	<title>Student Invoice</title>
	{{--Bootstrap--}}   
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet" /> 
	<style type="text/css">
		html,body{
			padding: 0;
			margin: 0;
			width:100%;
			background: #fff;
			font-size: 13px;
			font-family: 'Sans Serif','Times New Romain';
		}
		a.logo {
		    font-size: 30px;
		    font-weight: 300;
		    color: #000;
		    float: left;
		    margin-top: 15px;
		    text-transform: uppercase;
		}
		.lite {
		    color: #00a0df !important;
		}
		table{
			width: 700px;
			margin: 0 auto;
			text-align: left;
			border-collapse: collapse;
		}
		th{
			padding-left: 2px;
		}
		td {
			padding: 2px;
		}
		.amu{
			text-align: right;padding-right: 10px;font-family: 'Sans Serif','Times New Romain';
		}
		.line-top{
			border-left: 1px solid;
			padding-left: 10px;
			font-family: 'Sans Serif','Times New Romain';
		}
		.verify {
			font-family: 'Sans Serif','Times New Romain';
		}
		.imagelogo {
			width: 50px;height: 70px;
		}
		.th{
			background: #ddd;
			border: 1px solid;text-align: center;
		}
		.line-row{
			background: #fff;
			border: 1px solid;text-align: center;
		}
		#container{
			width: 100%;
			margin: 0 auto;
		}
		.divide{
			width: 100%;
			margin: 0 auto;
		}
		hr{
			width: 100%;
			margin-left: 0;margin-right: 0;
			padding: 0;
			margin-top: 35px;
			margin-bottom: 20px;border: 0 none;
			border-top: 1px dotted #321321;
			height: 0;
		}
		button{
			margin:0 auto;
			text-align: center;
			width: 100%;
			height: 100%;
			cursor: pointer;
			font-weight: bold;

		}
		.lenth-limit{
			max-height: 350px;min-height: 300px;
		}
		.div-button{
			width: 100%;
			margin-top: 0;
			height: 50px;
			text-align: center;margin-bottom: 10px;border-bottom: 1px solid;
			background: #ccc;
		}
	</style>
</head>
<body>
	<div class="div-button">
		<button onclick="printContent('divide')">Print</button>
	</div>

	<div id="divide">
		<?php for ($i=0; $i<2; $i++) { ?>
		<div class="container">
			<div class="lenth-limit">
				{{----------}}
				<table>
					<tr>
						<td style="padding-left: 40px; width: 50px;">
							<a class="logo" href="#"><i class="fa fa-institution"></i></a>
						</td>
						<td class="amu">
							<b style="font-weight: normal;">PHANJEREE COCHING</b><br>
							<b>Raozan, Chattogram</b>
						</td>
						<td class="line-top">
							<b style="font-weight: normal;">PHANJEREE</b><br>
							<b>Receipt</b>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right;"></td>
						<td colspan="0" style="text-align: right; padding-left: 50px;">
							<b>Receipt No : {{ sprintf('%05d',$invoice->receipt_id) }}</b>
						</td>
					</tr>
				</table>

				{{------------}}
				<table>
					<tr>
						<td style="width: 120px; padding: 5px 0">
							CochingId: <b>{{ sprintf('%05d',$invoice->coching_id) }}</b> 
						</td>
						<td style="width: 200px; padding: 5px 0">
							Student Name: <b>{{ $invoice->student_name}}</b>
						</td>
						<td style="width: 200px; padding: 5px 0">
							Nick Name: <b>{{ $invoice->nick_name}}</b>
						</td>
						<td>Gender:
							<b>
								@if ($invoice->sex == 0 ) Male @else Female @endif
							</b>
						</td>
					</tr>
				</table>

				{{------------}}

				<table>
					<thead>
						<tr>
							<th class="th" style="text-align: left;">Description</th>
							<th class="th" style="width: 70px;">Fee</th>
							<th class="th" style="width: 70px;">Dis</th>
							<th class="th" style="width: 70px;">Amount</th>
							<th class="th" style="width: 70px;">Pay</th>
							<th class="th" style="width: 70px;">Balance</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="line-row" style="text-align: left;">
								{{ $courseDetails->detail}}
							</td>
							<td class="line-row">
								$ {{ number_format($invoice->school_fee,2) }}
							</td>
							<td class="line-row">
								{{ $studentFee->discount }}%
							</td>
							<td class="line-row">
								$ {{ number_format($studentFee->amount,2) }}
							</td>
							<td class="line-row">
								$ {{ number_format($invoice->paid,2) }}
							</td>
							<td class="line-row">
								{{ number_format($studentFee->amount - $totalPaid,2) }}
							</td>
						</tr>
					</tbody>
				</table>
				{{---------}}
				<table>
					<tr>
						<td class="verify"><b>Notice:</b>
							<p style="display: inline-block;">
								All payment are not refundable or transferable
							</p>
						</td>
						<td style="margin-bottom: 5px" ><b>Cashier:</b> {{ $invoice->name }}
							<br><br>
							Printed: {{ date('d-M-Y g:i:s A') }}
						</td>
						<td style="vertical-align: top;">
							Printed By: {{ Auth::user()->name}}
						</td>
					</tr>
				</table>
			</div>
			<br><br><br><br><br><br>
			<table>
				<tr>
					<td style="font-size: 10px;text-align: center;">
						#326, PANGEREECOCHING, front of Jonota bank, Audodia road, Gohira, Raozan, Chottogram, Postal Code:12156
					</td>
				</tr>
				<tr>
					<td style="font-size: 10px;text-align: center;">
						Phone:(015) 33 85 92 16, E-mail: pangaree@gmail.com
					</td>

				</tr>
			</table>
		</div>
		@if($i==0)
			<br>
			<hr>
		@endif
	<?php } ?>
	</div>
	<script type="text/javascript">

		function printContent(el){


			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
			window.close();


		}

	</script>








</body>
</html>