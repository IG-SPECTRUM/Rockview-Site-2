<?php

namespace App\Http\Controllers\authenticatedUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\global_models\WebsiteHomePageCouse;
class ManageWebsiteMainPageCouses extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = WebsiteHomePageCouse::latest()->paginate(6);
        return view("authenticated users/website-home-page-couses/index",compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("authenticated users/website-home-page-couses/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>'required',
            "image"=>"required|image"
        ]);

        $allowed_image_extensions = ["png","jpg","jpeg","gif"];
        $parent_image_extension = strtolower($request->image->extension());
        if(!in_array($parent_image_extension,$allowed_image_extensions)){
            return back()->with('image-extension-error',"Wrong image extension");
        }

        $image = time()."".$_FILES['image']['name'];
        $image_directory = "storage/courses/".basename($image);

        $new_object = WebsiteHomePageCouse::create([
            "course"=>$request->name,
            "image"=>$image
        ]);

        if(!$new_object){
            return back()->with("error","Something went wrong. Try again.");
        }
        move_uploaded_file($_FILES['image']['tmp_name'],$image_directory);
        return back()->with("success","Successfully posted.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $decrypted_id = decrypt($id);
        $selected_course = WebsiteHomePageCouse::find($decrypted_id);

        if(!$selected_course){
            return back()->with("error","Unknown error occured. Try again.");
        }
        $image_directory = "storage/courses/$selected_course->image";
       
        $selected_course->delete();
        //unlink($image_directory);
        return back()->with("success","success");
    }
}
