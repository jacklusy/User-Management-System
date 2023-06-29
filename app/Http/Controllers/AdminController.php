<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard() {
        
        return view('admin.index');

    } // End Method

    public function AdminLogin() {
        return view('auth.login');
    } // End Method

    
    public function ProfileView() {
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.pages.profile',compact('adminData'));
    } // End Method


    public function AdminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // End Method

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

      

      
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->gender = $request->gender;

        if($request ->file('photo')){
            $file = $request ->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Vendor Active Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

}
