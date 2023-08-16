@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Update trip details</h3>
        <form action="{{ route('admin.trip_sheet.update', ['id' => $trip->id]) }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="trip_id" class="col-sm-2 col-form-label">Trip ID</label>
                <div class="col-sm-10">
                    <input name="trip_id" type="number" class="form-control" id="trip_id" placeholder="ex: 101"
                        value="{{ $id }}" disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="super_name" class="col-sm-2 col-form-label">Guid Name</label>
                <div class="col-sm-10">
                    <select name="super_name" id="super_name" class="form-select form-select-sm"
                        aria-label=".form-select-sm example" required>
                        <option selected>Select Supervisor</option>
                        @foreach ($super_details as $user)
                            <option data-value="{{ $user->mobile }}" value="{{ $user->user_id . ' - ' . $user->user_name }}"
                                {{ $trip->super_name == $user->user_id . ' - ' . $user->user_name ? 'selected' : '' }}>
                                {{ $user->user_id . ' - ' . $user->user_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="mobile" class="col-sm-2 col-form-label">Guid Mobile</label>
                <div class="col-sm-10">
                    <input name="super_mobile" type="text" class="form-control" id="mobile"
                        placeholder="ex: 01758***" value="{{ $trip->super_mobile }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="driver_name" class="col-sm-2 col-form-label">Drive Name</label>
                <div class="col-sm-10">
                    <input name="driver_name" type="text" class="form-control" id="driver_name" placeholder="ex: MR"
                        value="{{ $trip->driver_name }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="reg_no" class="col-sm-2 col-form-label">Reg No</label>
                <div class="col-sm-10">
                    <input name="reg_no" type="text" class="form-control" id="reg_no" placeholder="ex: 15-4563"
                        value="{{ $trip->reg_no }}" required>
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>


    <script>
        document.getElementById("super_name").addEventListener("change", function() {
            var selectedOption = this.options[this.selectedIndex];
            var mobileValue = selectedOption.getAttribute("data-value");
            document.getElementById("mobile").value = mobileValue;
        });
    </script>
@endsection
