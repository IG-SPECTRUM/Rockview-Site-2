<?php

namespace App\Http\Controllers\authenticatedUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\global_models\Program;
class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_programs =  Program::get()->count();
        $all_programs = Program::latest()->paginate(20);
        return view("authenticated users/programs/index",compact("all_programs","total_programs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("authenticated users/programs/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required",
            "qualification"=>"required",
            "tuition_fee"=>"required"
        ],[
            "name.required"=>"This field is required",
            "qualification.required"=>"This field is required",
            "tuition_fee.required"=>"This field is required",
        ]);

        $new_program = Program::create([
            "name"=>strtolower($request->name),
            "qualification"=>$request->qualification,
            "tuition_fee"=>$request->tuition_fee
        ]);

        if(!$new_program){
            return back()->with("error","Something went wrong. Try again.");
        }
        return back()->with("success","Successfully added.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $decrypted_id = decrypt($id);
        $selected_program = Program::find($decrypted_id);
        return view("authenticated users/programs/edit",compact("selected_program"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "name"=>"required",
            "qualification"=>"required",
            "tuition_fee"=>"required"
        ],[
            "name.required"=>"This field is required",
            "qualification.required"=>"This field is required",
            "tuition_fee.required"=>"This field is required",
        ]);

        $decrypted_id = decrypt($id);
        $selected_program = Program::find($decrypted_id);

        $selected_program->update([
            "name"=>strtolower($request->name),
            "qualification"=>$request->qualification,
            "tuition_fee"=>$request->tuition_fee
        ]);

        if(!$selected_program){
            return back()->with("error","Something went wrong. Try again.");
        }
        return back()->with("success","Successfully updated.");
    }


    public function delete_confirmation($id){
        $decrypted_id = decrypt($id);
        $selected_program = Program::find($decrypted_id);
        return view("authenticated users/programs/delete-confirmation",compact("selected_program"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $decrypted_id = decrypt($id);
        $selected_program = Program::find($decrypted_id);
       if(!$selected_program){
        return redirect()->route("manage-programs.index")->with("error","Something went wrong. Try again.");
       }  
       $selected_program->delete();
       return redirect()->route("manage-programs.index")->with("success","Successfully deleted");
    }
}
