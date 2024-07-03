<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showAdminLoginPage(){
        return view('admin.auth.login');
    }

    public function loginAdmin(Request $request){
        try{
            $rules = [
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator->errors());
            }else{
                if(Auth::attempt($request->only('email', 'password'))){
                    $user = Auth::user();
                    if($user->hasRole('admin')){
                        return redirect()->route('admin.dashboard');
                    }
                    Auth::logout();
                    return back()->withErrors([
                        'email' =>  'Your do not have access to admin panel..!'
                    ]);
                }else{
                    return back()->withErrors([
                        'email' =>  'The provided credentials do not match our records'
                    ]);
                }
            }
        }catch(Exception $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
