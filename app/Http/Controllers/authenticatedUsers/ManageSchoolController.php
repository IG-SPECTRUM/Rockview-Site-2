<?php

namespace App\Http\Controllers\authenticatedUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\global_models\Facaulty;
use App\Models\global_models\Program;
use App\Models\global_models\FacaultyProgram;
class ManageSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_schools = Facaulty::latest()->paginate(10);
        $total_schools = Facaulty::get()->count();
        return view("authenticated users/schools/index",compact("all_schools","total_schools"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("authenticated users/schools/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required"
        ]);

        $new_school = Facaulty::create([
            "name" =>strtolower($request->name)
        ]);
        if(!$new_school){
            return back()->with("error","Something went wrong. Try again.");
        }
        return back()->with("success","Successfully added.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decrypted_id = decrypt($id);
        $selected_school = Facaulty::find($decrypted_id);

        $none_added_programs = Program::get();

        //================= quering all programs attached to the selected school==============================
        $school_programs = FacaultyProgram::where("facaulty_id",$decrypted_id)->paginate(10);
        $total_school_programs = FacaultyProgram::where("facaulty_id",$decrypted_id)->get()->count();
        return view("authenticated users/schools/show",compact("selected_school","none_added_programs","total_school_programs","school_programs"));
    }


    public function add_program_to_school(Request $request){
        $this->validate($request,[
            "school"=>"required",
            "program"=>"required"
        ],[
            "school.required"=>"Something went wrong. Try again.",
            "program.required"=>"Please select a program."
        ]);
        $school = decrypt($request->school);
        $program = decrypt($request->program);

        $new_assignment = FacaultyProgram::create([
            "program_id" => $program,
            "facaulty_id" => $school
        ]);
        if(!$new_assignment){
            return back()->with("error","Unknown error occured. Try again.");
        }
        return back()->with("success","success");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $decrypted_id = decrypt($id);
        $selected_school = Facaulty::find($decrypted_id);
        return view("authenticated users/schools/edit",compact("selected_school"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "name"=>"required"
        ]);


        $decrypted_id = decrypt($id);
        $selected_school = Facaulty::find($decrypted_id);

        $selected_school->update([
            "name" =>strtolower($request->name)
        ]);
        if(!$selected_school){
            return back()->with("error","Something went wrong. Try again.");
        }
        return back()->with("success","Successfully updated.");
    }

    public function delete_program_confirmation($program_id, $school_id){
        $decrypted_program_id = decrypt($program_id);
        $selected_program = FacaultyProgram::find($decrypted_program_id);
        $decrypted_school_id = decrypt($school_id);
        return view("authenticated users/schools/delete-confirmation",compact("selected_program","decrypted_school_id"));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $decrypted_program_id = decrypt($id);
        $selected_program = FacaultyProgram::find($decrypted_program_id);
        if(!$selected_program){
            return redirect()->route('schools.show',$selected_program->facaulty_id)->with("error","Something went wrong. Try again.");
        }
        $selected_program->delete();
        return redirect()->route('schools.show',encrypt($selected_program->facaulty_id))->with("success","Successfully deleted.");
    }
}
