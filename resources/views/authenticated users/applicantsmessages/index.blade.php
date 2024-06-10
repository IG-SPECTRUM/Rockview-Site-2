@extends("layouts/staff-account-layout")

@section("title")
    Applicants message
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <div class="page-refresher">
                <table class="table">
                    @foreach($messages as $message)
                        <tr>
                            <td> 
                                <?php 
                                    $is_message_read = \App\Models\ApplicantMessageStatus::where("user_id",auth()->id())
                                    ->where("contact_id",$message->id)->get()->first();
                                ?>
                                @if(!$is_message_read)
                                    <a href="{{ route('applicants-message.show',encrypt($message->id)) }}" class="text-dark">
                                        <b>{{ $message->name}} - {{ $message->subject}} <br> {{ $message->created_at->diffForHumans()}}</b>
                                    </a>
                                @else
                                <a href="{{ route('applicants-message.show',encrypt($message->id)) }}" class="text-dark">
                                        <small>{{ $message->name}} - {{ $message->subject}} <br> {{ $message->created_at->diffForHumans()}}</small>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="float-right">
                    {{ $messages->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push("js")
    <script>
        setInterval(() => {
            $(".page-refresher").load(" .page-refresher");
        }, 2000);
    </script>
@endpush