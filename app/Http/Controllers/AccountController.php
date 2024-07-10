<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function editAccount($id){
        $user = User::find($id);
        return view('admin.user-edit', compact('user'));
    }
}
