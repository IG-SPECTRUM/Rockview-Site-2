@extends('layouts.staff-account-layout2')
@push('css')

@endpush
@section('content')
<!-- Modal -->
  <div class="modal fade" id="confirmation-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <h3 class="text-center text-capitalize mt-3">{{ $selected_program->name }}</h3>
        <div class="modal-body">
          <h4 class="text-center">Are you sure you want to delete?</h4>
          <div class="mb-3">
            <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('manage-programs.index') }}" class="btn btn-secondary mr-1" style="border-radius:21px">Back</a>
            <form action="{{ route('manage-programs.destroy',encrypt($selected_program->id)) }}" method="post">
              @csrf
              @method("DELETE")
              <input type="submit" class="btn btn-primary" value="Proceed" style="border-radius:21px">
            </form></div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@push("js")
<script>
    $("#confirmation-modal").modal("show");
</script>
@endpush