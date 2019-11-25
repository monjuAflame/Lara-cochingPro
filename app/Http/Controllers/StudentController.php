<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programe;
use App\Shift;
use App\Time;
use App\Batch;
use App\Group;
use App\Academic;
use App\Course;
use App\Student;
use App\Gurdian;
use App\School;
use App\Address;
use App\FileUpload;
use App\Status;
use File;
use Storage;
use DB;
class StudentController extends Controller
{
	public function __construct() {
        $this->middleware('web');
    }
    
    public function getManageStudent(){
    	$programs  = Programe::all();
        $shifts    = Shift::all();
        $times     = Time::all();
        $batches   = Batch::all();
        $groups    = Group::all();
        $academics = Academic::orderBy('academic_id', 'DESC')->get();
        $student_id   = Student::max('student_id');
    	return view('student.studentRegister',compact('programs','academics','shifts','times','batches','groups','student_id'));
    }

    //===================filter courses search for student===============
    public function filterSearchCourseForStudent(Request $request){
        
        if ($request->program_id != "") {
            $criterial = array('programes.program_id'=>$request->program_id);
        } 
        if ( $request->batch_id != "") {
            $criterial = array('batches.batch_id'=>$request->batch_id);
        } 
        if ( $request->shift_id != "") {
            $criterial = array('shifts.shift_id'=>$request->shift_id);
        } 
        if ( $request->group_id != "") {
            $criterial = array('groups.group_id'=>$request->group_id);
        } 
        if ($request->program_id != "" && 
            $request->batch_id != "" &&
            $request->shift_id != "" &&
            $request->group_id != "") {
            $criterial = array(
                                'programes.program_id'=>$request->program_id,
                                'batches.batch_id'=>$request->batch_id,
                                'shifts.shift_id'=>$request->shift_id,
                                'groups.group_id'=>$request->group_id
                            );
        }
        if ($request->program_id != "" && 
            $request->batch_id != "" &&
            $request->shift_id != "") {
            $criterial = array(
                                'programes.program_id'=>$request->program_id,
                                'shifts.shift_id'=>$request->shift_id
                            );
        }
        if ($request->program_id != "" && 
            $request->batch_id != "" &&
            $request->group_id != "") {
            $criterial = array(
                                'programes.program_id'=>$request->program_id,
                                'groups.group_id'=>$request->group_id
                            );
        }

        if ($request->program_id == "" && 
            $request->batch_id == "" &&
            $request->shift_id == "" &&
            $request->group_id == "") {
            $criterial = array(
                                'courses.active'=>$request->active
                            );
        }


        $courses = $this->courseInformation($criterial)->get();
        return view('student.info.courseInfo',['courses'=>$courses]);
    }
   //===================get courseInformation===============
    public function courseInformation($criterial){
        return Course::join('academics','academics.academic_id','=','courses.academic_id')
                            ->join('batches','batches.batch_id','=','courses.batch_id')
                            ->join('programes','programes.program_id','=','batches.program_id')
                            ->join('shifts','shifts.shift_id','=','courses.shift_id')
                            ->join('groups','groups.group_id','=','courses.group_id')
                            ->join('times','times.time_id','=','courses.time_id')
                            ->where($criterial)
                            ->where('courses.active',1)
                            ->orderBy('courses.course_id','DESC');
                            
        
    }

    
    public function postInsertGurdian(Request $request){
        if ($request->ajax()) {
                return response(Gurdian::create($request->all()));

            // $gurdian = new Gurdian;
            // $gurdian->father_name = $request->father_name;
            // $gurdian->mother_name = $request->mother_name;
            // $gurdian->gurdian_name = $request->gurdian_name;
            // $gurdian->gurdian_phone = $request->gurdian_phone;

            



        
        }   
        
    }
    
    public function postUpdateGurdian(Request $request){
        if ($request->ajax()) {
          
            $gurdian = Gurdian::find($request->gurdian_id);
            $gurdian->father_name = $request->father_name;
            $gurdian->mother_name = $request->mother_name;
            $gurdian->gurdian_name = $request->gurdian_name;
            $gurdian->gurdian_phone = $request->gurdian_phone;
            $gurdian->save();
        }   
        
    }
    //==================
    public function postInsertSchool(Request $request){
        if ($request->ajax()) {
           return response(School::create($request->all()));
        }   
        
    }
    public function postUpdateSchool(Request $request){
        if ($request->ajax()) {
          
            $school = School::find($request->school_id);
            $school->school_name = $request->school_name;
            $school->school_roll = $request->school_roll;
            $school->school_code = $request->school_code;
            $school->save();
        }   
        
    }
    //===============
    public function postInsertAddress(Request $request){
        if ($request->ajax()) {
           return response(Address::create($request->all()));
        }   
        
    }
     public function postUpdateAddress(Request $request){
        if ($request->ajax()) {
          
            $address = Address::find($request->address_id);
            $address->village = $request->village;
            $address->post_office = $request->post_office;
            $address->zipcode = $request->zipcode;
            $address->upazilla = $request->upazilla;
            $address->district = $request->district;
            $address->save(); 
        }   
        
    }
    //=========

    public function postInsertStudent(Request $request){
        
        // return $request->all();
        
            if ($request->course_id == "") {
                return back()->with('cmessage','Course require!!');
            } elseif ($request->gurdian_id == "") {
                return back()->with('gmessage','Gurdian require!!');
            } elseif ($request->school_id == "") {
                return back()->with('smessage','School require!!');
            } elseif ($request->address_id == "") {
                return back()->with('amessage','Address require!!');
            } else {
                $st = new Student;
            
                $st->coching_id = $request->coching_id;
                $st->user_id = $request->user_id;
                $st->gurdian_id = $request->gurdian_id;
                $st->school_id = $request->school_id;
                $st->address_id = $request->address_id;

                $st->student_name = $request->student_name;
                $st->nick_name = $request->nick_name;
                $st->sex = $request->sex;
                $st->dob = $request->dob;
                $st->email = $request->email;
                $st->phone = $request->phone;
                $st->status = $request->status;
                $st->datereg = $request->dateregistered;
                $st->s_active = $request->s_active;

                $st->photo = FileUpload::photo($request,'photo');
                $save = $st->save();
                if($save){

                   $student_id = $st->student_id;
                   Status::insert(['student_id'=>$student_id,'course_id'=>$request->course_id]);
                   return redirect()->route('showPayment',['coching_id'=>$st->coching_id])->with('message','student successfuly inserted');

                }
            }
        
        
    }
    //==================student list and serach=================
    public function studentList(){
        $programs  = Programe::all();
        $shifts    = Shift::all();
        $times     = Time::all();
        $batches   = Batch::all();
        $groups    = Group::all();
        $academics = Academic::orderBy('academic_id', 'DESC')->get();
        $student_id   = Student::max('student_id');
        return view('student.studentList',compact('programs','academics','shifts','times','batches','groups','student_id'));
    } 
    public function showStudentReport(Request $request){


        $stReports = $this->showInfo($request->course_id);
        $urls = Storage::url("student_photo/");
        return view('student.info.studentListReport',['stReports'=>$stReports,'url'=>$urls]);
    }
    public function showInfo($course_id){

        return Status::join('students','students.student_id','=','statuses.student_id')
                     ->join('courses','courses.course_id','=','statuses.course_id')
                     ->join('batches','batches.batch_id','=','courses.batch_id')
                     ->join('programes','programes.program_id','=','batches.program_id')
                     ->join('academics','academics.academic_id','=','courses.academic_id')
                     ->join('shifts','shifts.shift_id','=','courses.shift_id')
                     ->join('groups','groups.group_id','=','courses.group_id')
                     ->join('times','times.time_id','=','courses.time_id')
                     ->select(DB::raw('students.coching_id,
                                      CONCAT(students.student_name," ",students.nick_name) as name,
                                      (CASE WHEN students.sex=0 THEN "Male" ELSE "Female" END) as sex,
                                      students.dob,
                                      programes.program,
                                      CONCAT(programes.program," / Batch: ", batches.batch," / Shift: ",shifts.shift," / Group: ",groups.group," / Time: ",times.time," / StartDate: ",courses.start_date," / EndDate:",courses.end_date) as detals'))
                     ->where('courses.course_id',$course_id)
                     ->get();

    }
    //==============first way==================
    // public function searchStudent(Request $request){
        
        

    //         if ($request->ajax()) {
    //             $query = $request->get('query');

    //               if($query != '') {
    //                $data = DB::table('students')
    //                         ->join('statuses','statuses.student_id','=','students.student_id')
    //                         ->join('courses','courses.course_id','=','statuses.course_id')
    //                         ->join('batches','batches.batch_id','=','courses.batch_id')
    //                         ->join('programes','programes.program_id','=','batches.program_id')
    //                         ->where('students.student_name', 'like', '%'.$query.'%')
    //                         ->orwhere('students.nick_name', 'like', '%'.$query.'%')
    //                         ->orwhere('programes.program', 'like', '%'.$query.'%')
    //                         ->orwhere('batches.batch', 'like', '%'.$query.'%')
    //                         ->orderBy('students.student_id', 'desc')
    //                         ->get();
                     
    //             } else {

    //                 $data = Student::join('statuses','statuses.student_id','=','students.student_id')
    //                       ->join('courses','courses.course_id','=','statuses.course_id')
    //                       ->join('batches','batches.batch_id','=','courses.batch_id')
    //                       ->join('programes','programes.program_id','=','batches.program_id')
    //                       ->orderBy('students.student_id', 'desc')
    //                       ->get();
    //             }
                
                
    //             return view('student.info.studentListSearch',['students'=>$data]);
    //         }
            
    // }
    //====================second way==============
    public function action(Request $request)
    {
         if($request->ajax()){
            $output = '';
            $query = $request->get('query');
                
                if($query != '') {
                   $datas = DB::table('students')
                            ->join('statuses','statuses.student_id','=','students.student_id')
                            ->join('courses','courses.course_id','=','statuses.course_id')
                            ->join('batches','batches.batch_id','=','courses.batch_id')
                            ->join('programes','programes.program_id','=','batches.program_id')
                            ->where('students.student_name', 'like', '%'.$query.'%')
                            ->orwhere('students.nick_name', 'like', '%'.$query.'%')
                            ->orwhere('programes.program', 'like', '%'.$query.'%')
                            ->orwhere('batches.batch', 'like', '%'.$query.'%')
                            ->orderBy('students.student_id', 'desc')
                            ->get();
                     
                } else {

                    $datas = Student::orderBy('students.student_id', 'desc')
                          ->get();
                }

             $url = Storage::url("student_photo/");
             return view('student.info.studentListSearch', ['datas'=>$datas,'url'=>$url]);
          
            
            // $total_row = $datas->count();
            
            // if($total_row > 0){
            //     $no=1;

            //     foreach($datas as $data) {
            //         $url = Storage::url("student_photo/".$data->photo."");
            //         $output .= '
            //             <tr>
            //                  <td>'.$no++.'</td>
            //                  <td>'.$data->student_id.'</td>
            //                  <td>
            //     <img class="img-responsive" src="../'.$url.'"/>
            //                  </td>
            //                  <td>'.$data->student_name.'</td>
            //                  <td>'.$data->nick_name.'</td>
            //                  <td>'.$data->program.'</td>
            //                  <td>'.$data->batch.'</td>
            //                  <td>
            //                     <button id="'.$data->student_id.'" value="viewC" class="btn btn-success btn-sm viewStudent"><i class="fa fa-eye"></i>
            //                     </button>
                                 
            //                     <a href="'.route('updateStudentById',['student_id'=>$data->student_id]).'" id="hidden" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
            //                     </a> 
            //                     <button value="'. $data->student_id .'" id="deleteCourse" class="btn btn-danger btn-sm del-class"><i class="fa fa-trash-o"></i></button>
            //                  </td>
            //             </tr>


            //         ';
            //    }

            // } else {
            //    $output = '
            //    <tr>
            //     <td align="center" colspan="10">No Data Found</td>
            //    </tr>
            //    ';
            // }
            //   $data = array(
            //    'table_data'  => $output,
            //    'total_data'  => $total_row
            //   );

            // echo json_encode($data);
        }
    }







    //===================update by id course===============
    public function updateStudentById($student_id){

        $studentById = Student::join('statuses','statuses.student_id','=','students.student_id')
                            ->join('courses','courses.course_id','=','statuses.course_id')
                            ->join('gurdians','gurdians.gurdian_id','=','students.gurdian_id')
                            ->join('schools','schools.school_id','=','students.school_id')
                            ->join('addresses','addresses.address_id','=','students.address_id')
                            ->join('batches','batches.batch_id','=','courses.batch_id')
                            ->join('programes','programes.program_id','=','batches.program_id')
                            ->join('shifts','shifts.shift_id','=','courses.shift_id')
                            ->join('groups','groups.group_id','=','courses.group_id')
                            ->join('times','times.time_id','=','courses.time_id')
                            ->join('academics','academics.academic_id','=','courses.academic_id')
                            ->where('students.student_id',$student_id)
                            ->first();

        $img = Student::where('student_id',$student_id)->first();
        $url = Storage::url("student_photo/".$img['photo']."");

        $academics = Academic::orderBy('academic_id', 'DESC')->get();
        $programs  = Programe::all();
        $shifts    = Shift::all();
        $times     = Time::all();
        $groups    = Group::all();
        return view('student.editStudent', compact('studentById', 'url', 'programs', 'shifts', 'times', 'groups'));
        
        
    }

    public function postUpdateStudent(Request $request){
        
        // return $request->all();

           $photoUrl = $this->photoExistsStatus($request);
        


        
            if ($request->course_id == "") {
                return back()->with('cmessage','Course require!!');
            } elseif ($request->gurdian_id == "") {
                return back()->with('gmessage','Gurdian require!!');
            } elseif ($request->school_id == "") {
                return back()->with('smessage','School require!!');
            } elseif ($request->address_id == "") {
                return back()->with('amessage','Address require!!');
            } else {

            

                $st = Student::find($request->student_id);
            
                $st->coching_id = $request->coching_id;
                $st->user_id = $request->user_id;
                $st->gurdian_id = $request->gurdian_id;
                $st->school_id = $request->school_id;
                $st->address_id = $request->address_id;

                $st->student_name = $request->student_name;
                $st->nick_name = $request->nick_name;
                $st->sex = $request->sex;
                $st->dob = $request->dob;
                $st->email = $request->email;
                $st->phone = $request->phone;
                $st->status = $request->status;
                $st->datereg = $request->dateregistered;
                $st->s_active = $request->s_active;
                $st->photo = $photoUrl;
                
                if($st->save()){

                    $status = Status::find($request->status_id);
                    $status->student_id = $request->student_id;
                    $status->course_id = $request->course_id;
                    $status->save();

                    return back()->with('sucsessmessage','student successfuly Updated');
                   // return redirect()->route('gotPayment',['student_id'=>$student_id]);

                }




            }
        
        
    }
    private function photoExistsStatus($request){

        $student = Student::find($request->student_id);

        $studentImage = $request->hasFile('photo');
        
        if ($studentImage) {
            Storage::disk('photo')->delete($student->photo);
            $photoUrl = FileUpload::photo($request,'photo');

        } else {

            $photoUrl = $student->photo;

        }
        return $photoUrl;
    }
    //===================delete by id course===============

    public function deteteStudent(Request $request){
        

         if ($request->ajax()) {

            

        }
    }


}
