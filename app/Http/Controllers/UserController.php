<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function UserAccount() {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.pages.profile',compact('userData'));
    }

    public function dashboard() {
        
        $user_id = Auth::user()->id;
        $members = member::find($user_id)
        ->join('users', 'members.user_id', '=', 'users.id')
        ->join('departments', 'members.department_id', '=', 'departments.id')
        ->select([
            'members.id',
            'members.department_id',
            'members.user_id',
            'users.firstname',
            'users.lastname',
            'users.email',
            'departments.departmentName'
        ])
        ->get();

        if (!$members) {
            abort(404);
        }
        return view('frontend.index',compact('members'));

    }

    public function UserDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );


        return redirect('/login')->with($notification);
    } // End Method
}
