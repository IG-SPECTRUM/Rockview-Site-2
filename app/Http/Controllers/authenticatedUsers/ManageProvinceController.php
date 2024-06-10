<?php

namespace App\Http\Controllers\authenticatedUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\global_models\Province;
use App\Models\global_models\ProvinceStation;
class ManageProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_provinces = Province::get()->count();
        $all_provinces = Province::latest()->paginate(20);
        return view("authenticated users/provinces/index",compact("total_provinces","all_provinces"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("authenticated users/provinces/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required"
        ],[
            "name.required"=>"This is a required field"
        ]);

        $new_province = Province::create([
            "name"=>strtolower($request->name)
        ]);

        if(!$new_province){
            return back()->with("error","Something went wrong. Try again.");
        }

        return back()->with("success","Successfully added");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decrypted_id = decrypt($id);
        $selected_province = Province::find($decrypted_id);

        $targeted_districts = ProvinceStation::where('province_id',$decrypted_id)->paginate(20);
        $total_targeted_districts = ProvinceStation::where('province_id',$decrypted_id)->get()->count();
        return view("authenticated users/provinces/show",compact("selected_province","targeted_districts","total_targeted_districts"));
    }

    //=================== adding places to be visited in a selected province
    public function add_stations(Request $request){
        $this->validate($request,[
            "location"=>"required",
            "date"=>"required"
        ],[
            "location.required" => "This is a required field",
            "date.required" => "This is a required field"
        ]);

        $province_id = decrypt($request->province);
        
        $new_record = ProvinceStation::create([
            "province_id" => $province_id,
            "station" => $request->location,
            "date" => $request->date,
        ]);

        if(!$new_record){
            return back()->with("error","Something went wrong. Try again.");
        }

        return back()->with("success","Successfully recorded");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $decrypted_id = decrypt($id);
        $selected_province = Province::find($decrypted_id);
        return view("authenticated users/provinces/edit",compact("selected_province"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "name"=>"required"
        ],[
            "name.required"=>"This is a required field"
        ]);

        $decrypted_id = decrypt($id);
        $selected_province = Province::find($decrypted_id);

        if(!$selected_province){
            return back()->with("error","Something went wrong. Try again.");
        }
        $selected_province->update($request->only("name"));
        return back()->with("success","Successfully updated");
    }


    //================= display form for editing district details for a selected province=============================
    public function edit_district_details_form($id){
        $decrypted_id = decrypt($id);
        $selected_district = ProvinceStation::find($decrypted_id);
        return view("authenticated users/provinces/edit-selected-disrict",compact("selected_district"));
    }

    public function update_district_details(Request $request, $id){
        $this->validate($request,[
            "name"=>"required",
            "date"=>"required"
        ],[
            "name.required" => "This is a required field",
            "date.required" => "This is a required field"
        ]);

        $decrypted_id = decrypt($id);
        $selected_district = ProvinceStation::find($decrypted_id);
        if(!$selected_district){
            return back()->with("error","Something went wrong. Try again.");
        }
        $selected_district->update([
            "station"=>$request->name,
            "date"=>$request->date
        ]);
        return back()->with("success","Successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_district(string $id)
    {
        $decrypted_id = decrypt($id);
        $selected_district = ProvinceStation::find($decrypted_id);
        if(!$selected_district){
            return back()->with("error","Something went wrong. Try again.");
        }
        $selected_district->delete();
        return back()->with("success","Successfully deleted");
    }
}
