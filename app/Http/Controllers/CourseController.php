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
class CourseController extends Controller
{
    public function __construct() {
        $this->middleware('web');
    }

//===================get course===============
    public function getManageCourse(){
    	
    	$academics = Academic::orderBy('academic_id', 'DESC')->get();
    	$programs  = Programe::all();
    	$shifts    = Shift::all();
    	$times     = Time::all();
    	$groups    = Group::all();
        return view('course.addCourse', compact('academics', 'programs', 'shifts', 'times', 'groups'));
    }
//===================insert academic===============
    public function insertAcademic(Request $request){
    	if ($request->ajax()) {
    		return response(Academic::create($request->all()));
    	}
    }
//===================insert program===============
    public function insertClass(Request $request){
    	if ($request->ajax()) {
    		return response(Programe::create($request->all()));
    	}
    }
//===================insert batch===============
    public function insertBatch(Request $request){
    	if ($request->ajax()) {
    		return response(Batch::create($request->all()));
    	}
    }
//===================show batch===============
    public function showBatch(Request $request){
    	if ($request->ajax()) {
    		return response(Batch::where('program_id', $request->program_id)->get());
    	}
    }
//===================insert shift===============
    public function insertShift(Request $request)
    {
    	if ($request->ajax()) {
    		return response(Shift::create($request->all()));
    	}
    }
//===================insert time===============
    public function insertTime(Request $request)
    {
    	if ($request->ajax()) {
    		return response(Time::create($request->all()));
    	}
    }
//===================insert group===============
    public function insertGroup(Request $request)
    {
    	if ($request->ajax()) {
    		return response(Group::create($request->all()));
    	}
    }
//===================insert course===============
    public function insertCourse(Request $request){
    	if ($request->ajax()) {
    		$program = $request->program_id;
            $academic = $request->academic_id;
            $batch = $request->batch_id;
            $shift = $request->shift_id;
            $time = $request->time_id;
            $group = $request->group_id;
            $startDate = $request->start_date;
            $endDate = $request->end_date;

            if (empty($program) || empty($academic) ||empty($batch) ||empty($shift) ||empty($time) ||empty($group) ||empty($startDate) ||empty($endDate))
            {
                echo 'empty';
            } else {
                return response(Course::create($request->all()));
            }

    	}
    }
//===================course list===============
    public function courseList(){
        $academics = Academic::all();
        $programs  = Programe::all();
        $batches    = Batch::all();
        $shifts    = Shift::all();
        $groups    = Group::all();
        $times    = Time::all();
        $courses = Course::join('academics','academics.academic_id','=','courses.academic_id')
                            ->join('batches','batches.batch_id','=','courses.batch_id')
                            ->join('programes','programes.program_id','=','batches.program_id')
                            ->join('shifts','shifts.shift_id','=','courses.shift_id')
                            ->join('times','times.time_id','=','courses.time_id')
                            ->join('groups','groups.group_id','=','courses.group_id')
                            ->orderBy('courses.course_id','ASC')
                            ->get();
        return view('course.listCourse', compact('courses', 'programs', 'batches', 'shifts','groups', 'academics','times'));
    }
//===================filter courses search===============
    public function filterSearchCourse(Request $request){
        
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
        return view('course.info.courseInfo',['courses'=>$courses]);
    }
   //===================get courseInformation===============
    public function courseInformation($criterial){
        return Course::join('academics','academics.academic_id','=','courses.academic_id')
                            ->join('batches','batches.batch_id','=','courses.batch_id')
                            ->join('programes','programes.program_id','=','batches.program_id')
                            ->join('shifts','shifts.shift_id','=','courses.shift_id')
                            ->join('groups','groups.group_id','=','courses.group_id')
                            ->where($criterial)
                            ->where('courses.active',1)
                            ->orderBy('courses.course_id','DESC');
                            
        
    }
//===================update by id course===============
    public function updateCourseById($course_id){
        // $courses = Course::where('course_id',$course_id)->first();
        // $academicId = $courses->academic_id;
        // $academic = Academic::where('academic_id',$academicId)->get();
        // $batchId = $courses->batch_id;
        // $batch   = Batch::where('batch_id',$batchId)->get();
        // $batchp   = Batch::where('batch_id',$batchId)->first();
        // $programId = $batchp->program_id;
        // $program   = Programe::where('program_id',$programId)->get();
        // $shiftId = $courses->shift_id;
        // $shift   = Shift::where('shift_id',$shiftId)->get();
        // $timeId = $courses->time_id;
        // $time   = Time::where('time_id',$timeId)->get();
        // $groupId = $courses->group_id;
        // $group   = Group::where('group_id',$groupId)->get();

        $courseById = Course::join('academics','academics.academic_id','=','courses.academic_id')
                            ->join('batches','batches.batch_id','=','courses.batch_id')
                            ->join('programes','programes.program_id','=','batches.program_id')
                            ->join('shifts','shifts.shift_id','=','courses.shift_id')
                            ->join('times','times.time_id','=','courses.time_id')
                            ->join('groups','groups.group_id','=','courses.group_id')
                            ->where('courses.course_id',$course_id)
                            ->first();

        $academics = Academic::orderBy('academic_id', 'DESC')->get();
        $programs  = Programe::all();
        $shifts    = Shift::all();
        $times     = Time::all();
        $groups    = Group::all();
        return view('course.editCourse', compact('courseById', 'academics', 'programs', 'shifts', 'times', 'groups'));
        
        
    }
//===================update course===============
    public function updateCourse(Request $request){
        if ($request->ajax()) {
            $batch = $request->batch_id;
            if (!empty($batch)) {
                Course::updateOrCreate(['course_id'=>$request->course_id],$request->all());
                echo "success";
            } else {
                echo "error";
            }
        }
    }
    //===================delete course===============
    public function viewCourse(Request $request){
        if ($request->ajax()) {

            $course =  Course::join('academics','academics.academic_id','=','courses.academic_id')
                            ->join('batches','batches.batch_id','=','courses.batch_id')
                            ->join('programes','programes.program_id','=','batches.program_id')
                            ->join('shifts','shifts.shift_id','=','courses.shift_id')
                            ->join('times','times.time_id','=','courses.time_id')
                            ->join('groups','groups.group_id','=','courses.group_id')
                            ->where('courses.course_id',$request->id)
                            ->first();
        
         return   $output ="<table class='table-hover'>
                        <tr>
                            <td>Academic Year</td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>".$course->academic."</td>
                        </tr>
                        <tr>
                            <td>Course Name</td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>".$course->program."</td>
                        </tr>
                        <tr>
                            <td>Batch Name</td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>".$course->batch."</td>
                        </tr>
                        <tr>
                            <td>Shift</td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>".$course->shift."</td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>".$course->time."</td>
                        </tr>
                        <tr>
                            <td>Group</td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>".$course->group."</td>
                        </tr>
                        <tr>
                            <td>Start Time</td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>".$course->start_date."</td>
                        </tr>
                        <tr>
                            <td>End Time</td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>".$course->end_date."</td>
                        </tr>    
                    </table>";

        }
    }

    //===================delete course===============
    public function deleteCourse(Request $request){
        if ($request->ajax()) {
            $course_id=$request->course_id;
            if (!empty($course_id)) {
                $course = Course::find($course_id);
                $course->delete($course_id);
                echo "success";
            } else{
                echo "error";
            }
        }
    }
    










}

