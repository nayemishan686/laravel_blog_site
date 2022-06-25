<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // verification notice
    public function resend()
    {
        # code...
    }

    // password change
    public function password_change(){
        return view('auth.passwords.password_change');
    }

    //password update
    public function password_update(Request $request){
        $validated = $request->validate([
            'current_password' => 'required|',
            'new_password' => 'required|min:6|max:15|same:conf_password',
            'conf_password' => 'required',
        ]);

        if(Hash::check($request->current_password,Auth::user()->password)){
            $data = [
                'password' => Hash::make($request->new_password),
            ];
            DB::table('users')->where('id',Auth::id())->update($data);
            return redirect()->back()->with('success','Password Updated Successfully');
        }else{
            return redirect()->back()->with('error','Current Password not mathched');
        }
    }
}
