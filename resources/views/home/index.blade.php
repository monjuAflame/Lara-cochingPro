@extends('layouts.master')
@section('pageInfo')
<div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-home"></i> Dashboard</h3>
    <ol class="breadcrumb">
        <li><span class="success" style="color: green">{{ Session::get('message') }}</span></li>
    </ol>
</div>
@endsection

@section('content')

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box blue-bg">
		<i class="fa fa-user"></i>
		<div class="count">{{ $users->count() }}</div>
		<div class="title">Total User</div>						
	</div>			
</div>
{{-----------}}

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box green-bg">
		<i class="fa fa-user"></i>
		<div class="count">{{ $students->count() }}</div>
		<div class="title">Total Student</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box brown-bg">
		<i class="fa fa-user"></i>
		<div class="count">{{number_format($totalPay,2)}}</div>
		<div class="title">Total Transaction(taka)</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box purple-bg">
		<i class="fa fa-user"></i>
		<div class="count">1,00,000</div>
		<div class="title">Total Due</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box magenta-bg">
		<i class="fa fa-user"></i>
		<div class="count">1,00,000</div>
		<div class="title">Total Due</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->	
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box red-bg">
		<i class="fa fa-user"></i>
		<div class="count">1,00,000</div>
		<div class="title">Total Due</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->	


<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box orange-bg">
		<i class="fa fa-user"></i>
		<div class="count">1,00,000</div>
		<div class="title">Total Due</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->


<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box lime-bg">
		<i class="fa fa-user"></i>
		<div class="count">1,00,000</div>
		<div class="title">Total Due</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->	


<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box teal-bg">
		<i class="fa fa-user"></i>
		<div class="count">1,00,000</div>
		<div class="title">Total Due</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->	


<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box facebook-bg">
		<i class="fa fa-user"></i>
		<div class="count">1,00,000</div>
		<div class="title">Total Due</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->	


<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box linkedin-bg">
		<i class="fa fa-user"></i>
		<div class="count">1,00,000</div>
		<div class="title">Total Due</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->	


<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box twitter-bg">
		<i class="fa fa-user"></i>
		<div class="count">1,00,000</div>
		<div class="title">Total Due</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->	

@endsection
