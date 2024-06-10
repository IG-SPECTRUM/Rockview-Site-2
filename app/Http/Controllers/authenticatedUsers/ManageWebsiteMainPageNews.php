<?php

namespace App\Http\Controllers\authenticatedUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\global_models\Update;
class ManageWebsiteMainPageNews extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $updates = Update::latest()->paginate(6);
        return view("authenticated users/news/index",compact("updates"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("authenticated users/news/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "title"=>"required",
            "image"=>"required|image",
            "date"=>"required",
            "content"=>"required"
        ]);

        $allowed_image_extensions = ["png","jpg","jpeg","gif"];
        $parent_image_extension = strtolower($request->image->extension());
        if(!in_array($parent_image_extension,$allowed_image_extensions)){
            return back()->with('image-extension-error',"Wrong image extension");
        }

        $image = time()."".$_FILES['image']['name'];
        $image_directory = "storage/news/".basename($image);

        $new_update = Update::create([
            "heading"=>$request->title,
            "date"=>$request->date,
            "content"=>$request->content,
            "image"=>$image
        ]);

        if(!$new_update){
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
        $selected_course = Update::find($decrypted_id);

        if(!$selected_course){
            return back()->with("error","Unknown error occured. Try again.");
        }
        $image_directory = "storage/news/$selected_course->image";
       
        $selected_course->delete();
        //unlink($image_directory);
        return back()->with("success","success");    }
}
