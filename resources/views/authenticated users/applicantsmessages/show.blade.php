@extends("layouts/staff-account-layout2")

@section("title")
    Message Body
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <a href="{{ route('applicants-message.index') }}" class="btn btn-sm text-white float-right" style="background:#006400">Back</a>
            <div class="col-lg-5" style="margin-left:-12px">
                <b>Name:</b> <label class="ml-5">{{ $message->name}}</label><br>
                <b>Email:</b> <label class="ml-5">{{ $message->email}}</label><br>
                <b>Phone Number:</b> {{ $message->phone_number}}<br>
            </div><hr>
            <h4>{{ $message->subject}}</h4>
            <p>
                {{ $message->message }}
            </p>
        </div>
    </div>
@endsection
