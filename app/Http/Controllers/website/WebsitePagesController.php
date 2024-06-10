<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\global_models\Facaulty;
use App\Models\global_models\Program;
use App\Models\global_models\ProvinceStation;
use App\Models\global_models\Contact;
use App\Models\global_models\WebsiteHomePageCouse;
use App\Models\global_models\Update;
use App\Models\global_models\MainPagerImageSlider;
use App\Models\global_models\Applicant;
class WebsitePagesController extends Controller
{
    public function home(){
        $programs = WebsiteHomePageCouse::latest()->paginate(6);
        $updates = Update::latest()->paginate(6);
        $image_slides = MainPagerImageSlider::paginate(6);
        return view("public-pages/index",compact("programs","updates","image_slides"));
    }

    public function show_application_form(){
        return view("public-pages/application-form/application-form");
    }


    public function submit_application_form(Request $request){
        $this->validate($request,[
            "name"=>"required",
            "country"=>"required",
            "phone"=>"required",
            "email"=>"required|email",
            "program"=>"required",
            "admission_year"=>"required",
            "intake"=>"required",
            "mode_of_study"=>"required",
            "education_level"=>"required",
            "description"=>"required",
            "nrc_number"=>"required",
            
        ]);

        //generating student number
        $admission_year = $request->admission_year;
        $month = $request->intake;
        $generated_student_number = "";
        if($month == "january"){
            $generated_student_number = substr($admission_year,2,4).""."01".substr(time(),7,10);
        }elseif($month == "june"){
            $generated_student_number = substr($admission_year,2,4).""."06".substr(time(),6,10);
        }elseif($month == "august"){
            $generated_student_number = substr($admission_year,2,4).""."07".substr(time(),7,10);
        }elseif($month == "december"){
            $generated_student_number = substr($admission_year,2,4).""."12".substr(time(),7,10);
        }
        
        $applicant = Applicant::create([
            "name" => $request->name,
            "country" => $request->country,
            "phone_number" => $request->phone,
            "email" => $request->email,
            "year" => $request->admission_year,
            "intake" => $request->intake,
            "mode_of_study" => $request->mode_of_study,
            "level_of_education" => $request->education_level,
            "results_description" => $request->description,
            "national_id" => $request->nrc_number,
            "student_id" => $generated_student_number,
            "status" => "in procegress",
            "program_id" => $request->program,
            "image"=>"default-image.png"
        ]);

        if(!$applicant){
            return back()->with("error","Something went wrong. Please try again.");
        }
    
        return redirect()->route("applicant-payment-method",[encrypt($applicant->student_id),$applicant->name]);
    }

    public function redirect_new_applicant_to_payment_page($applicant_id, $applicant_name){
        $applicant_id = decrypt($applicant_id);
        return view("public-pages/application-form/select-payment-method",compact("applicant_id","applicant_name"));
    }

    public function programs_index_page(){
        $available_schools = Facaulty::latest()->paginate(10);
        return view("public-pages/programs/index",compact("available_schools"));
    }

    public function anti_scam(){
        return view("public-pages/antiscam");
    }

    public function bursary(){
        $get_provinces_ids = ProvinceStation::get()->unique("province_id");
        return view("public-pages/bursaries",compact("get_provinces_ids"));
    }

    public function fees(){
        $programs = Program::latest()->paginate(20);
        return view("public-pages/fees",compact("programs"));
    }

    public function show_contact_page(){
        return view("public-pages/contact");
    }

    public function submit_contact_form(Request $request){
        $this->validate($request,[
            "name"=>"required",
            "email"=>"required|email",
            "phone_number"=>"required",
            "subject"=>"required",
            "message"=>"required"
        ]);

        $new_message = Contact::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "subject"=>$request->subject,
            "message"=>$request->message,
            "phone_number"=>$request->phone_number,
            "message_status"=>"unread"
        ]);
        if(!$new_message){
            return back()->with('error',"Something went wrong. Try again.");
        }

        return back()->with("success","Your message has been submited successfully.");
    }
}
