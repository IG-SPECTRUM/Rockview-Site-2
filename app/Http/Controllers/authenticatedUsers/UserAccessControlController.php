<?php

namespace App\Http\Controllers\authenticatedUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAccessControl;
class UserAccessControlController extends Controller
{
    public function selected_user($id)
    {
        $user = decrypt($id);
        return view('admins/user-access-dashboard',compact('user'));
    }

      public function grant_access(Request $request)
    {
        $data = explode(',',$request->access);
        $module = $data[0];
        $access_granted = $data[1];

        $permission_already_granted = UserAccessControl::where( 'user_id',$request->user)
        ->where('module', $module)->where('access',$access_granted)->get()->last();
        
        if($permission_already_granted){
             return response()->json([
                'status' => 400,
                'error' => "The $access_granted permission is already granted to this user"
            ]);
        }

        $new_permission = UserAccessControl::create([
            'user_id' => $request->user,
            'module' => $module,
            'access' => $access_granted
        ]);

        if(!$new_permission){
            return response()->json([
                'status' => 400,
                'error' => "Unkown error occured. Try again later."
            ]);
        }
    }

    
    public function deny_access(Request $request)
    {
        $data = explode(',',$request->access);
        $module = $data[0];
        $access_granted = $data[1];

        $permission_already_granted = UserAccessControl::where( 'user_id',$request->user)
        ->where('module', $module)->where('access',$access_granted)->get()->last();
        
        if(!$permission_already_granted){
             return response()->json([
                'status' => 400,
                'error' => "Unkown error occured. Try again later"
            ]);
        }
        $permission_already_granted->delete();
    }
}
