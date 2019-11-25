@extends('layouts.master')
@section('style')
<style type="text/css">
    .academic-details{
        width: 440px;
    }
    #table-class-info{
        width: 100%;
    }
    table  tbody > tr > td {
        vertical-align: middle;
        text-align: center;
    }
    table thead tr > th {
        text-align: center;
    }
    .search-body {
    margin-bottom: 10px;
    position: relative;
    padding-bottom: 45px;
}
</style>
@endsection
@section('pageInfo')
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_documents_alt"></i>Payment</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
            <li><i class="icon_documents_alt"></i>list</li> 
            <li><i class="fa fa-pencil"></i>payment List</li>                
            <li><p class="valid"></p></li>                
        </ol>
    </div>
@endsection
@section('content')

{{--include file--}}
@include('course.info.courseView')

<div class="row">
    <div class="col-lg-12">
        
            
    	   
         {{----------------------}}
            <div class="panel panel-defult">
                <div class="panel-heading">Transaction Report</div>
                <table>
                    <tr>
                        <td>Form</td>
                        <td>
                            <input type="text" name="form" id="form" value="{{ date('Y-m-d') }}" class="form-control" >
                        </td>
                        <td>To</td>
                        <td>
                            <input type="text" name="to" id="to" value="{{ date('Y-m-d') }}" class="form-control" >
                        </td>
                    </tr>
                </table>
                    
                
            
                <div class="panel-body" >
                    <h3 align="center">Fee Report <span id="total_records"></span></h3>
                    <hr>
                    <div  id="show-fee-paid">
                      
                     </div>
                </div>
            </div>
    </div>
</div>

@endsection

@section('script')
	<script type="text/javascript">
        
         $('#form').datepicker({
                dateFormat:'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                onSelect: function(form){
                   showFee(form,$('#to').val())
                }
        }); 
         $('#to').datepicker({
                dateFormat:'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                onSelect: function(to){
                    showFee($('#form').val(),to)
                }
        });   
        function showFee(form,to){
            $.get("{{ route('showFeeReport') }}",{form:form,to:to},function(data){
                
                $('#show-fee-paid').html(data);
            })
        }

    </script>

@endsection
