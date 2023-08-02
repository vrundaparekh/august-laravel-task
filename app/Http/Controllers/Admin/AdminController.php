<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //This function return view of admin login
    public function index(){
        return view ('admin.login');
    }
    public function loginAttempt(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['status' => false, 'message' => "Invalid data", 'error' => $validator->errors()], 422);
        }
        $checkData = Admin::where('email',$request->email)->get();
        if($checkData){
            
            if(auth()->guard('admin')->attempt(['email'=> $request->email,'password' => $request->password])){
                return response(['status' => true, 'message' => "You are successfully logged in"], 200); 
            }
        }
        else{
            return response(['status' => false, 'message' => "Email Id or Password is Incorrect"], 500);
        }
        
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function logout(Request $request)
    {
        try {
            Auth::guard('admin')->logout();
            return redirect('admin/login');
        } catch (\Exception $e) {
            Log::error($e);
            return response(['status' => false, 'message' => config('constants.SOMETHING_WENT_WRONG')], 500);
        }
    }
    public function demo(){
        
        return view('admin.demo');
    }
}
