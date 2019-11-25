<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;
use App\Programe;
use App\Batch;
use App\Shift;
use App\Time;
use App\Group;
use App\Course;
use App\Student;
use App\Status;
use App\Fee;
use App\Transaction;
use App\StudentFee;
use App\ReceiptDetail;
use App\Receipt;
use App\FeeType;
use DB;
class FeeController extends Controller
{
    public function getPayment(){
    	return view('fee.searchPayment');
    }

    public function postInsertFeeType(Request $request){
    	if ($request->ajax()) {
    		Feetype::create($request->all());
    		echo 'Successfully Inserted!';
    		
    	}
    }

    public function student_details($coching_id){
    	return Status::latest('statuses.status_id')
                         ->join('students','students.student_id','=','statuses.student_id')
                          ->join('courses','courses.course_id','=','statuses.course_id')
                          ->join('batches','batches.batch_id','=','courses.batch_id')
                          ->join('programes','programes.program_id','=','batches.program_id')
                          ->join('shifts','shifts.shift_id','=','courses.shift_id')
                          ->join('groups','groups.group_id','=','courses.group_id')
                          ->join('times','times.time_id','=','courses.time_id')
                          ->join('academics','academics.academic_id','=','courses.academic_id')
                          ->where('students.coching_id',$coching_id);
    }

    public function show_school_fee($batch_id){
    	return Fee::join('academics','academics.academic_id','=','fees.academic_id')
                            ->join('batches','batches.batch_id','=','fees.batch_id')
                            ->join('feetypes','feetypes.fee_type_id','=','fees.fee_type_id')
                            ->join('programes','programes.program_id','=','batches.program_id')
                   			    ->where('batches.batch_id',$batch_id)
                            ->orderBy('fees.fee_id','desc');

    }
    public function read_student_fee($coching_id){
        return StudentFee::join('fees','fees.fee_id','=','studentfees.fee_id')
                         ->join('students','students.student_id','=','studentfees.student_id')
                         ->join('batches','batches.batch_id','=','studentfees.batch_id')
                         ->join('programes','programes.program_id','=','batches.program_id')
                         ->select('batches.batch_id',
                                  'batches.batch',
                                  'programes.program',
                                  'fees.amount as school_fee',
                                  'students.student_id',
                                  'studentfees.s_fee_id',
                                  'studentfees.amount as student_amount',
                                  'studentfees.discount')
                         ->where('students.coching_id',$coching_id)
                         ->orderBy('studentfees.s_fee_id','ASC');
    }
    public function read_student_transaction($coching_id){
        return ReceiptDetail::join('receipts','receipts.receipt_id','=','receiptdetails.receipt_id')
                            ->join('students','students.student_id','=','receiptdetails.student_id')
                            ->join('transactions','transactions.transact_id','=','receiptdetails.transact_id')
                            ->join('fees','fees.fee_id','=','transactions.fee_id')
                            ->join('users','users.id','=','transactions.user_id')
                            ->join('studentfees','studentfees.s_fee_id','=','transactions.s_fee_id')
                            ->where('students.student_id', $coching_id);
    }
    

    public function payment($viewName, $coching_id){

    	$studentDetail = $this->student_details($coching_id)->first(); 
    	$fees = $this->show_school_fee($studentDetail->batch_id)->first(); 
	    $readStudentFee = $this->read_student_fee($coching_id)->get();
      $readStudentTransaction = $this->read_student_transaction($coching_id)->get();

      $programs  = Programe::where('program_id',$studentDetail->program_id)->get();
      $batches  = Batch::where('batch_id',$studentDetail->batch_id)->get();

      $receipt_id = ReceiptDetail::where('student_id',$coching_id)->max('receipt_id');
     
      
      $feeType = Feetype::all();

    	return view($viewName, compact('studentDetail',
                                     'programs',
                                     'batches',
                                     'feeType',
                                     'fees',
                                     'readStudentFee',
                                     'receipt_id',
                                     'readStudentTransaction'))->with('coching_id', $coching_id);
    }


    public function showStudentPayment(Request $request){

      if ($request->coching_id != "") {
        $coching_id = $request->coching_id;
        return $this->payment('fee.payment',$coching_id);
      } else{
        return back();
      }

    }
    public function showStudentPaymentByID($student_id){
     
        return $this->payment('fee.payment',$student_id);
      
    }

    public function createFee(Request $request){
      if ($request->ajax()) {
        $fee = Fee::create($request->all());
        return response($fee);
      }
    }

    public function savePayment(Request $request){
      
        

          if ($request->amount!=0) {
                $studentFee = StudentFee::create($request->all());
                $transact = Transaction::create(['transact_date'=>$request->transact_date,
                                               'fee_id'=>$request->fee_id,
                                               'user_id'=>$request->user_id,
                                               'student_id'=>$request->student_id,
                                               's_fee_id'=>$studentFee->s_fee_id,
                                               'paid'=>$request->paid,
                                               'remark'=>$request->remark,
                                               'description'=>$request->description]);
            
                $receipt_id = Receipt::autoNumber();

                ReceiptDetail::create(['receipt_id'=>$receipt_id,
                                      'student_id'=>$request->student_id,
                                      'transact_id'=>$transact->transact_id]);

                $mesaage =  "Payment Save Successfully !";
          } else {
              $mesaage = "Ops! Payment Not Save.";
          }
          return back()->with('message',$mesaage);
        
      
    }
    public function extraPay(Request $request){

      
        $transact = Transaction::create($request->all());
            $transact_id = $transact->transact_id;
            $student_id = $transact->student_id;
            $receipt_id = Receipt::autoNumber();
            ReceiptDetail::create(['receipt_id'=>$receipt_id,'student_id'=>$student_id,'transact_id'=>$transact_id]);

        $mesaage =  "Extrapay Save Successfully !";


      return back()->with('message', $mesaage);
          
    }
    public function pay(Request $request){

      if ($request->ajax()) {
        $studentFee = StudentFee::join('batches','batches.batch_id','=','studentfees.batch_id')
                                ->join('programes','programes.program_id','=','batches.program_id')
                                ->join('fees','fees.fee_id','=','studentfees.fee_id')
                                ->join('students','students.student_id','=','studentfees.student_id')
                                ->select('batches.batch_id',
                                        'batches.batch',
                                        'programes.program_id',
                                        'programes.program',
                                        'fees.fee_id',
                                        'students.student_id',
                                        'studentfees.s_fee_id',
                                        'fees.amount as school_fee',
                                        'studentfees.amount as student_amount',
                                        'studentfees.discount')
                                ->where('studentfees.s_fee_id',$request->s_fee_id)
                                ->first();

        return response($studentFee);
      }

    }

    public function studentBatchDetails(Request $request){
        $details = Course::join('batches','batches.batch_id','=','courses.batch_id')
                            ->join('shifts','shifts.shift_id','=','courses.shift_id')
                            ->join('times','times.time_id','=','courses.time_id')
                            ->join('groups','groups.group_id','=','courses.group_id')
                            ->join('academics','academics.academic_id','=','courses.academic_id')
                            ->join('programes','programes.program_id','=','batches.program_id')
                            ->join('statuses','statuses.course_id','=','courses.course_id')
                            ->where('batches.batch_id',$request->batch_id)
                            ->where('statuses.student_id',$request->student_id)
                            ->select(DB::raw('CONCAT(programes.program,
                                              " / Batch-",batches.batch,
                                              " / Shift-",shifts.shift,
                                              " / Time-",times.time
                                              ) As detail'))
                            ->first();
        return $details;
    }

    public function printInvoice($receipt_id=null){

      $invoice = ReceiptDetail::join('receipts','receipts.receipt_id','=','receiptdetails.receipt_id')
                    ->join('students','students.student_id','=','receiptdetails.student_id')
                    ->join('transactions','transactions.transact_id','=','receiptdetails.transact_id')
                    ->join('fees','fees.fee_id','=','transactions.fee_id')
                    ->join('batches','batches.batch_id','=','fees.batch_id')
                    ->join('programes','programes.program_id','=','batches.program_id')
                    ->join('users','users.id','=','transactions.user_id')
                    ->select('students.student_id',
                            'students.coching_id',
                            'students.student_name',
                            'students.nick_name',
                            'students.sex',
                            'fees.amount as school_fee',
                            'fees.fee_id',
                            'transactions.transact_date',
                            'transactions.paid',
                            'users.name',
                            'transactions.s_fee_id',
                            'receipts.receipt_id',
                            'batches.batch_id')
                    ->where('receipts.receipt_id',$receipt_id)
                    ->first();
        $courseDetails = Course::join('batches','batches.batch_id','=','courses.batch_id')
                            ->join('shifts','shifts.shift_id','=','courses.shift_id')
                            ->join('times','times.time_id','=','courses.time_id')
                            ->join('groups','groups.group_id','=','courses.group_id')
                            ->join('academics','academics.academic_id','=','courses.academic_id')
                            ->join('programes','programes.program_id','=','batches.program_id')
                            ->join('statuses','statuses.course_id','=','courses.course_id')
                            ->where('batches.batch_id',$invoice->batch_id)
                            ->where('statuses.student_id',$invoice->student_id)
                            ->select(DB::raw('CONCAT(programes.program,
                                              " / Batch-",batches.batch,
                                              " / Shift-",shifts.shift,
                                              " / Time-",times.time,
                                              " / Group-",groups.group,
                                              " / Academic-",academics.academic,
                                              " / Start Date-",courses.start_date,
                                              " / ",courses.end_date
                                              ) As detail'))
                            ->first();
        $studentFee = StudentFee::where('s_fee_id',$invoice->s_fee_id)->first();
        $totalPaid = Transaction::where('s_fee_id',$invoice->s_fee_id)->sum('paid');                    

      return view('invoice.invoice',compact('invoice','courseDetails','studentFee','totalPaid'));
    }
    public function fullPrintInvoice($receipt_id=null){

      $invoice = ReceiptDetail::join('receipts','receipts.receipt_id','=','receiptdetails.receipt_id')
                    ->join('students','students.student_id','=','receiptdetails.student_id')
                    ->join('transactions','transactions.transact_id','=','receiptdetails.transact_id')
                    ->join('fees','fees.fee_id','=','transactions.fee_id')
                    ->join('batches','batches.batch_id','=','fees.batch_id')
                    ->join('programes','programes.program_id','=','batches.program_id')
                    ->join('users','users.id','=','transactions.user_id')
                    ->select('students.student_id',
                            'students.coching_id',
                            'students.student_name',
                            'students.nick_name',
                            'students.sex',
                            'fees.amount as school_fee',
                            'fees.fee_id',
                            'transactions.transact_date',
                            'transactions.paid',
                            'users.name',
                            'transactions.s_fee_id',
                            'receipts.receipt_id',
                            'batches.batch_id')
                    ->where('transactions.s_fee_id',$receipt_id)
                    ->first();
        $courseDetails = Course::join('batches','batches.batch_id','=','courses.batch_id')
                            ->join('shifts','shifts.shift_id','=','courses.shift_id')
                            ->join('times','times.time_id','=','courses.time_id')
                            ->join('groups','groups.group_id','=','courses.group_id')
                            ->join('academics','academics.academic_id','=','courses.academic_id')
                            ->join('programes','programes.program_id','=','batches.program_id')
                            ->join('statuses','statuses.course_id','=','courses.course_id')
                            ->where('batches.batch_id',$invoice->batch_id)
                            ->where('statuses.student_id',$invoice->student_id)
                            ->select(DB::raw('CONCAT(programes.program,
                                              " / Batch-",batches.batch,
                                              " / Shift-",shifts.shift,
                                              " / Time-",times.time,
                                              " / Group-",groups.group,
                                              " / Academic-",academics.academic,
                                              " / Start Date-",courses.start_date,
                                              " / ",courses.end_date
                                              ) As detail'))
                            ->first();
        $studentFee = StudentFee::where('s_fee_id',$invoice->s_fee_id)->first();
        $totalPaid = Transaction::where('s_fee_id',$invoice->s_fee_id)->sum('paid');                    
        $totalPaids = Transaction::where('s_fee_id',$invoice->s_fee_id)->get();                    

      return view('invoice.fullInvoice',compact('invoice','courseDetails','studentFee','totalPaid','totalPaids'));
    }

    //========================list=====================
    public function peymentList()
    {

      return view('fee.paymentlist');

    }

    public function showFeeReport(Request $request)
    {

      $fees = $this->feeInfo()
                    ->select("users.name",
                             "students.coching_id",
                             "students.student_name",
                             "students.nick_name",
                             "transactions.transact_date",
                             "fees.amount AS school_fee",
                             "studentfees.amount AS student_fee",
                             "studentfees.discount",
                             "transactions.paid")
                    ->whereDate('transactions.transact_date','>=',$request->form)
                    ->whereDate('transactions.transact_date','<=',$request->to)
                    ->orderBy('students.student_id')
                    ->get();
      return view('fee.report.feeReport',compact('fees'));

    }

    public function feeInfo()
    {

      return ReceiptDetail::join('students','students.student_id','=','receiptdetails.student_id')
                          ->join('transactions','transactions.transact_id','=','receiptdetails.transact_id')
                          ->join('studentfees','studentfees.s_fee_id','=','transactions.s_fee_id')
                          ->join('fees','fees.fee_id','=','transactions.fee_id')
                          ->join('users','users.id','=','transactions.user_id')
                          ->orderBy('students.coching_id','DESC');
                          
    }

    //=========================
    public function createStudentNewCourse(){
      Status::create(['student_id'=>65,'course_id'=>45]);
    }

    public function deletTransaction($transact_id){
        Transaction::destroy($transact_id);
        return back();
    }
    public function getTransactionByID(Request $request){
       return ReceiptDetail::join('receipts','receipts.receipt_id','=','receiptdetails.receipt_id')
                            ->join('transactions','transactions.transact_id','=','receiptdetails.transact_id')
                            ->join('fees','fees.fee_id','=','transactions.fee_id')
                            ->join('users','users.id','=','transactions.user_id')
                            ->join('studentfees','studentfees.s_fee_id','=','transactions.s_fee_id')
                            ->where('transactions.transact_id', $request->transact_id)
                            ->first();
         
    }
      public function getStudentFeeByID(Request $request){
       return StudentFee::join('fees','fees.fee_id','=','studentfees.fee_id')
                         ->join('students','students.student_id','=','studentfees.student_id')
                         ->join('batches','batches.batch_id','=','studentfees.batch_id')
                         ->join('programes','programes.program_id','=','batches.program_id')
                         ->select('batches.batch_id',
                                  'batches.batch',
                                  'programes.program_id',
                                  'programes.program',
                                  'fees.amount as school_fee',
                                  'students.student_id',
                                  'fees.fee_id',
                                  'studentfees.s_fee_id',
                                  'studentfees.amount as student_fees',
                                  'studentfees.discount')
                         ->where('studentfees.s_fee_id',$request->s_fee_id)
                         ->first();
         
    }
    public function updateTransaction(Request $request){
        if ($request->ajax()) {
          
            $transaction = Transaction::find($request->transact_id);
            $transaction->transact_date = $request->transact_date;
            $transaction->fee_id = $request->fee_id;
            $transaction->user_id = $request->user_id;
            $transaction->student_id = $request->student_id;
            $transaction->s_fee_id = $request->s_fee_id;
            $transaction->paid = $request->paid;
            $transaction->remark = $request->remark;
            $transaction->description = $request->description;
            $transaction->save();
        }   
    }
    public function updateStudentFees(Request $request){
        if ($request->ajax()) {
          
            $studentFee = StudentFee::find($request->s_fee_id);
            $studentFee->fee_id = $request->fee_id;
            $studentFee->student_id = $request->student_id;
            $studentFee->batch_id = $request->batch_id;
            $studentFee->amount = $request->amount;
            $studentFee->discount = $request->discount;
            $studentFee->save();
        }   
    }

}
