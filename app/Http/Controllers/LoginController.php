<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Role;
use App\User;
use App\FileUpload;
use File;
use Storage;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $username = 'username';
    protected $redirectTo = '/dashboard';
    protected $Guard = 'web';
    
    
    
    public function getLogin(){
        
        if(Auth::guard('web')->check()){
            return redirect('/dashboard');
        }
        return view('login');
    
    }


    public function postLogin(Request $request){
        $auth = Auth::guard('web')->attempt(['username'=>$request->username, 'password'=>$request->password]);
           
        if($auth){
            return redirect('/dashboard');
        }
        return redirect('/');
    }

    public function getRegister(){
        $roles = Role::get();
        return view('administration.registerAdministration',compact('roles'));
    
    }



    public function adminstrationRegister(Request $request){
        // dump($request->all());
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->image = FileUpload::adminstrationImage($request,'image');
        $user->sex = $request->sex;
        $user->active = $request->active;
        $user->save();
        return back();
    }

    
    
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
