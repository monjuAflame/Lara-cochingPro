@extends('layouts.master')
@section('content')
@include ('fee.css.styleSheet')
@include ('fee.popup.feeType')
@include ('fee.popup.createFee')
@include ('fee.popup.updateTransaction')
@include ('fee.popup.updateStudentFee')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_documents_alt"></i>Fee Payment</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{url('/')}}">Home</a></li>
            <li><i class="icon_documents_alt"></i>Payment</li> 
            <li><i class="fa fa-pencil"></i>Pay</li>                        
            <li><span class="success" style="color: green">{{ Session::get('message') }}</li>                        
        </ol>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-dafult">
            
            <div class="panel-heading" style="background: #00a0df;">
                <div class="col-md-3" style="margin-top: 15px;">
                    <form action="{{ route('showPayment') }}" method="GET" class="search-payment">
                        <div class="input-group">
                            <input type="text" class="form-control" id="coching_id" name="coching_id" placeholder="Coching ID" value="{{ $coching_id }}">
                            <div class="input-group-addon">
                                <button style="border: none;background: none;"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                
                <div class="col-md-4" style="margin-top: 15px;">
                    <label for="name">Name: <b class="student-name">{{ $studentDetail->student_name." ". $studentDetail->nick_name}}</b></label>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3" style="text-align: right;">
                    <label for="" class="date-invoice">Date <b>{{ date('d-M-Y')}}</b></label>
                </div>
                <div class="col-md-3" style="text-align: right;">
                    <label for="" class="invoice-number">Receipt NO: <b>{{ sprintf('%05d',$receipt_id) }}</b></label>
                </div>
            </div>
        <form action="{{ count($readStudentFee) != 0 ? route('extraPay') : route('savePayment') }}" method="POST" id="formPayment" >
            {{ csrf_field() }}
            <div class="panel-body">
                <table>
                    <h4 class="academicdetail" style="background: #1a2731;color: #fff;padding: 5px; text-align: center;">
                        {{ $studentDetail->program }} -
                        Batch: {{ $studentDetail->batch }} -
                        Shift: {{ $studentDetail->shift }} -
                        Time: {{ $studentDetail->time }} -
                        Group: {{ $studentDetail->group }}
                        
                    </h4>
                    <thead>
                        <tr>
                            <th>Programs</th>
                            <th>Batch</th>
                            <th>School Fee(taka)</th>
                            <th>Amount(taka)</th>
                            <th>Dis(%)</th>
                            <th>Paid(taka)</th>
                            <th>Amount Due(taka)</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>
                            <select name="program_id" id="program_id" class="d">
                                <option value="">-----------</option>
                                @foreach($programs as $program)
                                <option value="{{$program->program_id}}" 
                                    {{ $program->program_id==$studentDetail->program_id ? 'selected' : null }} >
                                    {{$program->program}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select id="batch_id" name="batch_id" class="d">
                                <option value="">-----------</option>
                                @foreach($batches as $batch)
                                    <option value="{{$batch->batch_id}}" {{ $batch->batch_id==$studentDetail->batch_id ? 'selected' : null }} >{{$batch->batch}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>

                            <div class="input-group">
                                <span class="input-group-addon create-fee" title="create fee" style="cursor: pointer;color: blue;padding: 0 3px;border-right: none;"><i class="fa fa-plus"></i></span>
                            
                                <input type="text" name="fee" value="{{ empty($fees->amount)? null : $fees->amount }}" id="Fee" readonly="true" class="d">
                          
                            </div>

                            <input type="hidden" name="fee_id" value="{{ empty($fees->fee_id)? null : $fees->fee_id }}" id="FeeID">

                            <input type="hidden" name="student_id" value="{{ $studentDetail->student_id }}" id="StudentID">

                            <input type="hidden" name="batch_id" value="{{ $studentDetail->batch_id }}" id="BatchID">

                            <input type="hidden" name="user_id" value="{{ Auth::id() }}" id="UserID">

                            <input type="hidden" name="transact_date" value="{{ date('Y-m-d H:i:s') }}" id="transDate">

                            <input type="hidden" name="s_fee_id" id="s_fee_id">
                        </td>
                        <td>
                            <input type="text" name="amount" id="Amount" class="d">
                        </td>
                        <td>
                            <input type="text" name="discount" id="Discount" class="d">
                        </td>
                        <td>
                            <input type="text" name="paid" id="Paid" required="">
                        </td>
                        <td>
                            <input type="text" name="due" id="Due" disabled>
                        </td>
                    </tr>

                    <thead>
                        <tr>
                            <th colspan="2">Remark</th>
                            <th colspan="5">Description</th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" name="remark" id="remark" required="">
                            </td>
                            <td colspan="5">
                                <input type="text" name="description" id="description" required="">
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="panel-footer">
            	<input type="submit" id="btn-go" name="btn-go" class="btn btn-small btn-primary btn-payment save-payment" value="{{ count($readStudentFee)!=0? 'Extra Pay' : 'Save' }}">
        
            	<input type="button" onclick="this.form.reset()" class="btn btn-default pull-right btn-reset" value="Reset">
            </div>
		    </form>
        </div>
       @if(count($readStudentFee) != 0  )
         @include('fee.list.studentFeeList')
         <input type="hidden" id="disabled" value="0">
        @endif
    </div>
</div>

@endsection

@section('script')
    @include ('fee.script.calculate')
    @include ('fee.script.payment')
@endsection