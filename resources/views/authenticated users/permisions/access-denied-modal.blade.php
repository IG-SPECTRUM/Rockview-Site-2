@extends('layouts.staff-account-layout')
@push('css')

@endpush
@section('content')
<!-- Modal -->
  <div class="modal fade" id="confirmation-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <h3 class="text-center text-capitalize mt-3">Access Denied</h3>
        <div class="modal-body">
          <h4 class="text-center">You can not perform this action</h4>
          <div class="mb-3">
            <div class="d-flex justify-content-center align-items-center">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary mr-1" style="border-radius:21px">Back</a>
            </div>
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