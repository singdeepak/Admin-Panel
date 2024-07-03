<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function userStore(Request $request){
        try{
            $rules = [
                'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|email|unique:users,email',
                'contact' => 'required|digits:10|numeric',
                'password' => 'required|min:8|max:15',
                'role' => 'required',
                'status' => 'required'
            ];

            $messages = [
                'name.required' => 'The name field is required.',
                'name.string' => 'The name must be a string.',
                'name.max' => 'The name may not be greater than :max characters.',
                'name.regex' => 'The name may only contain letters, spaces, and hyphens.',

                'email.required' => 'The email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email address is already taken.',

                'contact.required' => 'The contact field is required.',
                'contact.digits' => 'The contact must be exactly :digits digits.',
                'contact.numeric' => 'The contact must be a number.',

                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least :min characters long.',
                'password.max' => 'The password must be less than :max characters.',

                'role.required' => 'The role field is required.',

                'status.required' => 'The status field is required.',
            ];

            $validator = validator($request->all, $rules, $messages);
            if($validator->fails()){
                return response()->json(['status' => false, 'message' => $validator->errors()->first()], 422);
            }else{
                $user = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'contact' => $request->contact,
                    'password' => bcrypt($request->password),
                    'role' => $request->role,
                    'status' => $request->status
                ];

                if(User::create($user)){
                    return response()->json(['status' => true, 'message' => 'User created successfully']);
                }else{
                    return response()->json(['status' => false, 'message' => 'User not created']);
                }
            }

        }catch(Exception $e){
            Log::info($e->getMessage());
            return response()->json(['status' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
