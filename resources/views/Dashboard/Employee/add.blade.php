@extends('Dashboard.layouts.master')
@section('title')
    Add Employee
@endsection
@section('content')
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Forms</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-12 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">Basic Form</h6>
                            <hr>
                            <form action="{{route('Employee.store')}}" method="post" autocomplete="off" enctype="multipart/form-data" class="row g-3">
                                {{ csrf_field() }}
                                <div class="col-12">
                                    <label class="form-label">Add name</label>
                                    <input class="form-control" name="name" type="text" autofocus>
                                </div>
                                <div class="col-12">
                                    <label for="Phone_number" class="col-sm-3 col-form-label">Phone Number</label>
                                    <input class="form-control" name="Phone_number" type="text" autofocus>
                                </div>
                                <div class="col-12">
                                    <label for="Personal_id" class="col-sm-3 col-form-label">Personal id</label>
                                    <input class="form-control" name="Personal_id" type="text" autofocus>
                                </div>
                                <div class="mb-3" data-select2-id="279">
                                    <label class="form-label">select Gender</label>
                                    <select class="form-control select2" name="Gender" required>
                                        <option value="" selected>-- اختار من القائمة --</option>
                                        <option value="1">ذكر</option>
                                        <option value="2">انثي</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="Job_title" class="col-sm-3 col-form-label">Job Title</label>
                                    <input class="form-control" name="Job_title" type="text" autofocus>
                                </div>
                                <div class="col-12">
                                    <label for="Additional_info" class="col-sm-3 col-form-label">Additional Info</label>
                                    <textarea class="form-control" name="Additional_info" id="Additional_info" rows="5"></textarea>
                                </div>
                                <div class="mb-3" data-select2-id="279">
                                    <label class="form-label">select Address Store</label>
                                    <select class="form-control select2" name="store_id">
                                        <option value="" selected disabled>------</option>
                                        @foreach ($stores as $store)
                                            <option value="{{$store->id}}">{{$store->Address}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3" data-select2-id="279">
                                    <label class="form-label">select Country</label>
                                    <select class="form-control select2" name="country_id">
                                        <option value="" selected disabled>------</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3" data-select2-id="279">
                                    <label class="form-label">select City</label>
                                    <select class="form-control select2" name="city_id">
                                        <option value="" selected disabled>------</option>
                                        @foreach ($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Go Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--end row-->
    </main>
@endsection
@section('js')
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--    <script>--}}
{{--        // Handle the change event of the country select input--}}
{{--        $('#countrySelect').change(function() {--}}
{{--            var countryId = $(this).val();--}}

{{--            // Make an AJAX request to fetch cities for the selected country--}}
{{--            $.ajax({--}}
{{--                type: "GET",--}}
{{--                url: "/get-cities/" + countryId,--}}
{{--                success: function(cities) {--}}
{{--                    // Clear the previous options from city select input--}}
{{--                    $('#citySelect').empty();--}}

{{--                    // Append the new cities options to city select input--}}
{{--                    $.each(cities, function(id, name) {--}}
{{--                        $('#citySelect').append('<option value="' + id + '">' + name + '</option>');--}}
{{--                    });--}}
{{--                },--}}
{{--                error: function() {--}}
{{--                    alert("Error occurred while fetching cities.");--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection
