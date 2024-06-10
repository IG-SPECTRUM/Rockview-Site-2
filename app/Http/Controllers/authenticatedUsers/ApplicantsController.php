<?php

namespace App\Http\Controllers\authenticatedUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\global_models\Applicant;
class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicants = Applicant::where("status",'applicant')->paginate(50);
        $total_applicants = Applicant::where("status",'applicant')->get()->count();
        return view("authenticated users/applicants/index",compact("total_applicants","applicants"));
    }


    public function applications_in_progress()
    {
        $applicants = Applicant::where("status",'in procegress')->paginate(50);
        $total_applicants = Applicant::where("status",'in procegress')->get()->count();
        return view("authenticated users/applicants/applications-in-progress",compact("total_applicants","applicants"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
