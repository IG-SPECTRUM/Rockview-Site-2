<?php

namespace App\Http\Controllers\authenticatedUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\models\UserAccessControl;
use App\Models\User;
use App\Models\UserPassword;
class ManageAdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $can_view_admin = UserAccessControl::where('module','admin')->where('access','read')->where('user_id',auth()->id())->get()->first();
        if(!$can_view_admin && auth()->user()->user_type != "super admin"){
            return view("authenticated users/permisions/access-denied-modal");
        }
        $all_admins = User::latest()->paginate(10);
        $total_admins = User::get()->count();
        return view("authenticated users/admins/index", compact("all_admins","total_admins"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("authenticated users/admins/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required",
            "staff_id"=>"required|unique:users",
            "email"=>"required|email|unique:users",
            "image"=>"nullable|image"
        ]);

        $generate_password = str_shuffle("abcdefghijklnmopqrstuvwxz1234567890");
        $password = substr($generate_password,0,6);

        if(empty($request->image)){
            $new_admin = User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "image"=>"default-image.png",
                "user_type"=>"admin",
                "staff_id"=>$request->staff_id,
                "status"=>"active",
                "password" => Hash::make($password)
            ]);

            if(!$new_admin){
                return back()->with('error',"Unknown error occured, try again.");
            }

            UserPassword::create([
                "user_id" => $new_admin->id,
                "password" => $password
            ]);

            return back()->with("success","Successfully added");
        }


        if(isset($request->image)){
            $allowed_image_extensions = ["png","jpg","jpeg","gif"];
            $parent_image_extension = strtolower($request->image->extension());
            if(!in_array($parent_image_extension,$allowed_image_extensions)){
                return back()->with('image-extension-error',"Wrong image extension");
            }

            $admin_image = time()."".$_FILES['image']['name'];
            $admin_image_directory = "storage/staff-images/".basename($admin_image);

            $new_admin = User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "image"=>$admin_image,
                "user_type"=>"admin",
                "staff_id"=>$request->staff_id,
                "password" => Hash::make($password)
            ]);

            if(!$new_admin){
                return back()->with('error',"Unknown error occured, try again.");
            }

            UserPassword::create([
                "user_id" => $new_admin->id,
                "password" => $password
            ]);

            move_uploaded_file($_FILES['image']['tmp_name'],$admin_image_directory);
            // $resize_admin_image = Image::make("storage/staff-images/$admin_image")->resize(1280,1280);
            // $resize_admin_image->save();

            return back()->with('success','Successfully added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decrypted_id = decrypt($id);
        $admin = User::find($decrypted_id);
        return view("authenticated users/admins/show",compact("admin"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $decrypted_id = decrypt($id);
        $admin = User::find($decrypted_id);
        return view("authenticated users/admins/edit",compact("admin"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "name"=>"required",
            "staff_id"=>"required",
            "email"=>"required|email",
            "image"=>"nullable|image"
        ]);
        $decrypted_id = decrypt($id);
        $selected_admin = User::find($decrypted_id);
        if(!$selected_admin){
            return back()->with('error',"Unknown error occured, try again.");
        }
        
        if(empty($request->image)){
            $selected_admin->update([
                "name"=>$request->name,
                "email"=>$request->email,
                "user_type"=>"admin",
                "staff_id"=>$request->staff_id,
            ]);

            return back()->with("success","Successfully updated");
        }


        if(isset($request->image)){
            $allowed_image_extensions = ["png","jpg","jpeg","gif"];
            $parent_image_extension = strtolower($request->image->extension());
            if(!in_array($parent_image_extension,$allowed_image_extensions)){
                return back()->with('image-extension-error',"Wrong image extension");
            }

            $admin_image = time()."".$_FILES['image']['name'];
            $admin_image_directory = "storage/staff-images/".basename($admin_image);

            $selected_admin->update([
                "name"=>$request->name,
                "email"=>$request->email,
                "image"=>$admin_image,
                "user_type"=>"admin",
                "staff_id"=>$request->staff_id,
            ]);

            move_uploaded_file($_FILES['image']['tmp_name'],$admin_image_directory);
            // $parent = Image::make("storage/parents/$parent_image")->resize(1280,1280);
            // $parent->save();

            return back()->with('success','Successfully updated');
        }
    }

   
    public function block_admin(string $id)
    {
        $decrypted_id = decrypt($id);
        $admin = User::find($decrypted_id);
        if(!$admin){
            return back()->with("error","Something went wrong. Try again.");
        }
        $admin->status = "blocked";
        $admin->save();

        return back()->with("success","You have successfully blocked this account.");
    }

    public function unblock_admin($id){
        $decrypted_id = decrypt($id);
        $admin = User::find($decrypted_id);
        if(!$admin){
            return back()->with("error","Something went wrong. Try again.");
        }
        $admin->status = "active";
        $admin->save();
        return back()->with("success","You have successfully activated this account.");
    }
}
