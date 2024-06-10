<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class StaffLoginController extends Controller
{
    public function show_login_form(){
        return view("adminloginform/form");
    }

    public function login_user(Request $request){
        $this->validate($request,[
            "staff_id" => "required",
            "password" => "required"
        ]);

        //================ verify if admin exist
        $admin = User::where("staff_id",$request->staff_id)->get()->first();
        if(!$admin){
            return redirect()->back()->with("wrong-id","This ID does not exist");
        }

        //=============== verify if account is blocked
        if($admin->status == "blocked"){
            return back()->with("blocked-account","Access denied. Your account is currently de-activated.");
        }

        $can_login = auth()->attempt($request->only(["staff_id","password"]));
        if(!$can_login){
            return redirect()->back()->with("wrong-password","Wrong password");
        }

        return redirect()->route("dashboard");
    }

    public function logout(){
        auth()->logout();
        return redirect()->route("login");
    }
}
