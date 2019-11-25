<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Transaction;
use App\Role;
use App\FileUpload;
use Auth;
use Storage;
class DashboardController extends Controller
{
	public function __construct() {
        $this->middleware('web');
    }
    
    public function dashboard(){

    	$students = Student::get();
    	$users = User::get();
    	$totalPay = Transaction::get()->sum('paid');

        $img = User::where('id', Auth::user()->id)->first();
        $url = Storage::url("admin_photo/".$img['image']."");

    	$message ='Welcome to Dashboard!!!';
    	return view('home.index',compact('students','users','totalPay','url'))->with('message', $message);
    }

    public function getprofile(){
        $img = User::where('id', Auth::user()->id)->first();
        $url = Storage::url("admin_photo/".$img['image']."");
        $rules = Role::get();
        return view('administration.profile', compact('url','rules'));
    }
    
    public function adminstrationUpdate(Request $request){
    
        $photoUrl = $this->photoExists($request);

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->password = $request->uppassword;
        $user->image = $photoUrl;
        $user->sex = $request->sex;
        $user->active = $request->active;
        $user->save();

        return back();
    }
    private function photoExists($request){

        $user = User::find($request->user_id);

        $userImage = $request->hasFile('image');
        
        if ($userImage) {
            Storage::disk('adminPhoto')->delete($user->image);
            $photoUrl = FileUpload::adminstrationImage($request,'image');
        } else {

            $photoUrl = $user->image;

        }
        return $photoUrl;
    }

    public function getUserIdForChangePassword(Request $request){
        return User::where('id',$request->id)->first();
    }

    public function getChangePass(){
        return view('administration.changePassword');
    }

    public function changePass(Request $request){
    
        if ($request->ajax()) {

            $user = User::find($request->id)->first();
            $haspass = $user->password;
           
            if ($haspass!=$request->opass) {
             return   $rong =  "wrong";
            } else {
             return   $rong = 'true';
            }



        }

    }

    public function getAdminstrationList(Request $request){
    
        $users =  User::all();
        $url = Storage::url("admin_photo/");
        return view('administration.administrationList',['users'=>$users,'url'=>$url]);
    }


}
