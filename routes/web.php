<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'LoginController@getLogin');
Route::post('/login', 'LoginController@postLogin');


Route::group(['middleware'=>'authen'], function (){
    Route::get('/logout', 'LoginController@logout');
    Route::get('/dashboard', 'DashboardController@dashboard');
});

Route::group(['middleware'=>['authen','roles'], 'roles'=>['admin','Receiptionist','Manager','CEO']], function (){
    Route::get('/adminstration/getprofile',['as'=>'getprofile','uses'=>'DashboardController@getprofile']);
    Route::post('/adminstration/update',['as'=>'adminstrationUpdate','uses'=>'DashboardController@adminstrationUpdate']);

    Route::get('/adminstration/get/adminstration',['as'=>'getAdminstrationList','uses'=>'DashboardController@getAdminstrationList']);

//===========================faltow===============================================
    Route::get('/adminstration/getuser/id',['as'=>'getUserIdForChangePassword','uses'=>'DashboardController@getUserIdForChangePassword']);
    Route::get('/adminstration/getChangePass',['as'=>'getChangePass','uses'=>'DashboardController@getChangePass']);
    Route::post('/adminstration/update/pass',['as'=>'changePass','uses'=>'DashboardController@changePass']);
});

Route::group(['middleware'=>['authen','roles'], 'roles'=>['admin']], function (){
    //===============adminstration================
    Route::get('/adminstration/getregister',['as'=>'getRegister','uses'=>'LoginController@getRegister']);
    Route::post('/adminstration/register',['as'=>'adminstrationRegister','uses'=>'LoginController@adminstrationRegister']);

    
    //============course==========
    //add course
    Route::get('/manage/course',['as'=>'getManageCourse','uses'=>'CourseController@getManageCourse']);
    Route::post('/course/academic',['as'=>'postInsertAcademic','uses'=>'CourseController@insertAcademic']);
    Route::post('/course/class',['as'=>'postInsertClass','uses'=>'CourseController@insertClass']);
    Route::post('/course/batch',['as'=>'postInsertBatch','uses'=>'CourseController@insertBatch']);
    Route::get('/course/batch/show',['as'=>'getShowBatch','uses'=>'CourseController@showBatch']);
    Route::post('/course/shift',['as'=>'postInsertShift','uses'=>'CourseController@insertShift']);
    Route::post('/course/time',['as'=>'postInsertTime','uses'=>'CourseController@insertTime']);
    Route::post('/course/group',['as'=>'postInsertGroup','uses'=>'CourseController@insertGroup']);
    Route::post('/course/insert',['as'=>'postInsertCourse','uses'=>'CourseController@insertCourse']);
    //list course
    Route::get('/course/list',['as'=>'listCourse','uses'=>'CourseController@courseList']);
    Route::get('/course/list/filter',['as'=>'filterSearchCourse','uses'=>'CourseController@filterSearchCourse']);
    //update course
    Route::get('/course/update/{course_id}',['as'=>'updateCourseById','uses'=>'CourseController@updateCourseById']);
    Route::post('/course/update',['as'=>'updateCourse','uses'=>'CourseController@updateCourse']);
    //view course
    Route::get('/course/view',['as'=>'viewCourse','uses'=>'CourseController@viewCourse']);
    //delete course
    Route::post('/course/delete',['as'=>'deleteCourse','uses'=>'CourseController@deleteCourse']);

    //============for student==========================================================
    Route::get('/manage/student',['as'=>'getManageStudent','uses'=>'StudentController@getManageStudent']);
    Route::get('/student/course/list/filter',['as'=>'filterCourseForStudent','uses'=>'StudentController@filterSearchCourseForStudent']);

    Route::post('/student/insert/gurdian',['as'=>'postInsertGurdian','uses'=>'StudentController@postInsertGurdian']);
    Route::post('/student/update/gurdian',['as'=>'postUpdateGurdian','uses'=>'StudentController@postUpdateGurdian']);

    Route::post('/student/insert/school',['as'=>'postInsertSchool','uses'=>'StudentController@postInsertSchool']);
    Route::post('/student/update/school',['as'=>'postUpdateSchool','uses'=>'StudentController@postUpdateSchool']);

    Route::post('/student/insert/address',['as'=>'postInsertAddress','uses'=>'StudentController@postInsertAddress']);
    Route::post('/student/update/address',['as'=>'postUpdateAddress','uses'=>'StudentController@postUpdateAddress']);

    //add Student
    Route::post('/student/insert',['as'=>'postInsertStudent','uses'=>'StudentController@postInsertStudent']);
    //list student
    Route::get('/student/list',['as'=>'listStudent','uses'=>'StudentController@studentList']);
    Route::get('/student/list/search',['as'=>'searchStudent','uses'=>'StudentController@searchStudent']);
    Route::get('/student/list/report',['as'=>'showStudentReport','uses'=>'StudentController@showStudentReport']);
    Route::get('/live_search/action', 'StudentController@action')->name('live_search.action');
    //update student
    Route::get('/student/update/{student_id}',['as'=>'updateStudentById','uses'=>'StudentController@updateStudentById']);
    Route::post('/student/update',['as'=>'postUpdateStudent','uses'=>'StudentController@postUpdateStudent']);
    //delete
    Route::post('/student/delete',['as'=>'deteteStudent','uses'=>'StudentController@deteteStudent']);
    //view
    Route::post('/course/view',['as'=>'viewStudentDetails','uses'=>'CourseController@viewStudentDetails']);

    //=============for payment=======================================================
    Route::post('/student/feeType',['as'=>'postInsertFeeType','uses'=>'FeeController@postInsertFeeType']);
    
    Route::get('/student/payment',['as'=>'getPayment','uses'=>'FeeController@getPayment']);
    Route::get('/student/payment/show',['as'=>'showPayment','uses'=>'FeeController@showStudentPayment']);
    Route::get('/student/payment/show/{student_id}',['as'=>'showPaymentbyid','uses'=>'FeeController@showStudentPaymentByID']);
    
    Route::post('/student/create/fee',['as'=>'createFee','uses'=>'FeeController@createFee']);
    Route::post('/student/create/studentfee',['as'=>'savePayment','uses'=>'FeeController@savePayment']);
    //===============pay fee===================
    Route::get('/student/fee/pay',['as'=>'pay','uses'=>'FeeController@pay']);
    Route::get('/student/fee/details',['as'=>'studentBatchDetails','uses'=>'FeeController@studentBatchDetails']);
    Route::post('/student/fee/extraPay',['as'=>'extraPay','uses'=>'FeeController@extraPay']);
    Route::get('/student/fee/delete/{transact_id}',['as'=>'deletTransaction','uses'=>'FeeController@deletTransaction']);


    Route::get('/student/fee/get/transact_id',['as'=>'getTransactionByID','uses'=>'FeeController@getTransactionByID']);
    Route::get('/student/fee/get/student_fee',['as'=>'getStudentFeeByID','uses'=>'FeeController@getStudentFeeByID']);

    Route::post('/student/fee/update/transaction',['as'=>'updateTransaction','uses'=>'FeeController@updateTransaction']);
    Route::post('/student/fee/update/studentFee',['as'=>'updateStudentFees','uses'=>'FeeController@updateStudentFees']);

    //================Invoice==================
    Route::get('/student/fee/printInvoice/{receipt_id}',['as'=>'printInvoice','uses'=>'FeeController@printInvoice']);
    Route::get('/student/fee/fullPrintInvoice/{receipt_id}',['as'=>'fullPrintInvoice','uses'=>'FeeController@fullPrintInvoice']);

    //================Report===================
    Route::get('/student/fee/list',['as'=>'peymentList','uses'=>'FeeController@peymentList']);
    Route::get('/student/fee/list/show',['as'=>'showFeeReport','uses'=>'FeeController@showFeeReport']);

    //=============create new course=============
    Route::get('student/course/new',['as'=>'createStudentNewCourse','uses'=>'FeeController@createStudentNewCourse']);

    //===========teacher==========================================
    Route::get('teache/add',['as'=>'getTeacher','uses'=>'TeacherController@getTeacher']);


});
