<?php

namespace App\Http\Controllers\authenticatedUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\global_models\Contact;
use App\Models\ApplicantMessageStatus;
class ApplicantMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Contact::paginate(20);
        return view("authenticated users/applicantsmessages/index",compact("messages"));
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
        $selected_message_decrypted_id = decrypt($id);
        $message = Contact::find($selected_message_decrypted_id);

        //verify if message is already read by the authenticated admin
        $already_read = ApplicantMessageStatus::where('user_id',auth()->id())->where("contact_id",$selected_message_decrypted_id)->get()->first();
        if(!$already_read){
            //mark message as read
            ApplicantMessageStatus::create([
                "user_id"=>auth()->user()->id,
                "contact_id"=>$selected_message_decrypted_id
            ]);
        }
        return view("authenticated users/applicantsmessages/show",compact("message"));
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
