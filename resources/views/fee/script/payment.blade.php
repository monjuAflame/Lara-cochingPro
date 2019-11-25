<script type="text/javascript">
        

            $('#add-fee-type').on('click',function(){
                $('#feeType-show').modal();
            })

            $('.btn-save-feeType').on('click', function(e){
                // var fee_type = $('#fee_type').val();
                e.preventDefault();
                var data = $('#feeTypeForm').serialize();
                $.post("{{ route('postInsertFeeType') }}", data ,function(data){
                    console.log(data);
                    $('span.success').html(data);
                    $('#feeType-show').modal('hide');
                    setTimeout(function(){
                            $('span.success').html(data);
                    }, 4000);
                })
            })
            //==================================
            $('.create-fee').on('click',function(){
                $('#createFeePopup').modal();
            })
            $('.create-fee-save').on('click',function(e){
                e.preventDefault();
                enableFormElement('#frmFee');
                var data = $('#frmFee').serialize();

                $.post("{{ route('createFee') }}",data,function(data){
                    $('#createFeePopup').modal('hide');
                    location.reload();
                })
            })
            //===========================
            
            $('.btn-paid').on('click', function (e){
                e.preventDefault();
                s_fee_id = $(this).data('id-paid');
                balance = $(this).val();
                //alert( s_fee_id +","+ balance);
                $.get("{{ route('pay') }}",{s_fee_id:s_fee_id},function(data){
                    console.log(data);
                    $('#Paid').attr('id','Pay');
                    $('#formPayment #s_fee_id').val(data.s_fee_id);
                    $('#BatchID').val(data.batch_id);
                    $('#Fee').val(data.school_fee);
                    $('#FeeID').val(data.fee_id);
                    $('#formPayment #Amount').val(data.student_amount);
                    $('#formPayment #Discount').val(data.discount);
                    $('#Pay').val(balance);
                    $('#Pay').focus();
                    $('#Pay').select();
                    $('#b').val(balance);
                    addIteam(data);
                    studentBatchDetails(data);

                })
            })
        function addIteam(data){
            $('#program_id').empty().append($('<option/>',{
                value : data.program_id,
                text  : data.program
            }))
            $('#batch_id').empty().append($('<option/>',{
                value : data.batch_id,
                text  : data.batch
            }))
        }

        function studentBatchDetails(data){
            $.get("{{ route('studentBatchDetails') }}",{batch_id:data.batch_id,student_id:data.student_id},function(data){
                console.log(data.detail);
                   $('.academicdetail').text(data.detail);
                })
        }
        //======================
        $('.btn-reset').on('click', function(e){
            e.preventDefault();
            var caption = $(this).val();
            if (caption == 'Reset') {
                $(this).val('Cancel');
                $('#btn-go').val('Save');
                $('#Pay').attr('id','Paid');
                $('#formPayment').attr('action','{{ route("savePayment")}}');
                enableFormElement('#formPayment');
                return
            }
            location.reload();
        })
        //==========update Student Fee=============
         $('.stufee-edit').on('click', function(e){
            var sfee = $(this).data('id-update-student-fee');
            console.log(sfee);
            $.get("{{ route('getStudentFeeByID') }}",{s_fee_id:sfee},function(data){
       
                $('#upStudentFee').modal();
                $('#frmStudentFees #program').val(data.program)
                $('#frmStudentFees #batch').val(data.batch)
                $('#frmStudentFees #batch_id').val(data.batch_id)
                $('#frmStudentFees #sfees').val(data.school_fee)
                $('#frmStudentFees #sfAmount').val(data.student_fees)
                $('#frmStudentFees #sfDiscount').val(data.discount)
                $('#frmStudentFees #student_id').val(data.student_id)
                $('#frmStudentFees #fee_id').val(data.fee_id)
                $('#frmStudentFees #s_fee_id').val(data.s_fee_id)
            })

            
         })
         $('.create-update-studentFees').on('click',function(e){
                e.preventDefault();
                enableFormElement('#frmStudentFees');
                var data = $('#frmStudentFees').serialize();
                var url = $('#frmStudentFees').attr('action')
           
                $.post(url,data,function(data){
                    $('#upStudentFee').modal('hide');
                    $('.sucmsg').html('successfully update !')
                    location.reload();
                })
        })
$(document).on("change keyup", "#sfAmount", function(){

    

    var fee = $('#sfees').val();
    var amt = $('#sfAmount').val();
    var paid = $('#Paid').val($('#sAmount').val());
    var dis = 0;

    if (paid != '' && amt != '') {
        paid = parseFloat($('#sfAmount').val())
        var dis = ((( parseFloat(fee) - parseFloat(paid)) / fee) * 100);
        $('#Due').val(parseFloat(amt) - parseFloat(paid));
    }
    
    if (parseFloat(amt) > parseFloat(fee)) {
        $('#sfDiscount').css("color",'red');
    } else{
        $('#sfDiscount').css("color",'green');
    }
    $('#sfDiscount').val(parseInt(dis));

});
        //==========update transaction=============
        $('.transaction-edit').on('click', function(e){
            var transact = $(this).data('id-transact');
            
            
            $.get("{{ route('getTransactionByID') }}",{transact_id:transact},function(data){
                
                $('#uptransaction-show').modal();
                $('#frmTransact #transact_date').val(data.transact_date)
                $('#frmTransact #username').val(data.username)
                $('#frmTransact #paid').val(data.paid)
                $('#frmTransact #remark').val(data.remark)
                $('#frmTransact #description').val(data.description)
                $('#frmTransact #s_fee_id').val(data.s_fee_id)
                $('#frmTransact #fee_id').val(data.fee_id)
                $('#frmTransact #student_id').val(data.student_id)
                $('#frmTransact #user_id').val(data.user_id)
                $('#frmTransact #transact_id').val(data.transact_id)

            })
            
        })
        $('.create-update-transaction').on('click',function(e){
                e.preventDefault();
                enableFormElement('#frmTransact');
                var data = $('#frmTransact').serialize();
                var url = $('#frmTransact').attr('action')
                console.log(data); 
                $.post(url,data,function(data){
                    $('.sucmsg').html('successfully update !')
                    $('#uptransaction-show').modal('hide');
                    location.reload();
                })
            })
        //=======================
        function enableFormElement(frmName){
                $.each($(frmName).find('input,select'), function(i,element){
                    $(element).attr('disabled',false).css({'background':'#fff','border':'1px solid #ccc'});
                })
            }
        //======================
        var n = $('#disabled').val();
        function disabled_input(){
            $.each($('body').find('.d'), function(i,iteam){

                $(iteam).attr('disabled',true).css({'background':'#f5f5f5',
                                                    'border':'1px solid #ccc'});
                $(iteam).attr('readonly',false);

            })
        }
        $(document).ready(function(){
            if (n==0) {
                disabled_input();
            }
        })

    
    </script>