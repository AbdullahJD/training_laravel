@extends('Dashboard.layouts.master')
@section('title')
    Edit Employee
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
                            <form action="{{route('Employee.update', 'test')}}" method="post" autocomplete="off" enctype="multipart/form-data" class="row g-3">
                                @method('PUT')
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Add name</label>
                                    <input type="hidden" name="id" value="{{ $employee->id }}">
                                    <input class="form-control" name="name" type="text" value="{{$employee->name}}" autofocus>
                                </div>
                                <div class="col-12">
                                    <label for="Phone_number" class="col-sm-3 col-form-label">Phone Number</label>
                                    <input class="form-control" name="Phone_number" type="text" value="{{$employee->Phone_number}}" autofocus>
                                </div>
                                <div class="col-12">
                                    <label for="Personal_id" class="col-sm-3 col-form-label">Personal id</label>
                                    <input class="form-control" name="Personal_id" type="text" value="{{$employee->Personal_id}}" autofocus>
                                </div>
                                <div class="mb-3" data-select2-id="279">
                                    <label class="form-label">select Gender</label>
                                    <select class="form-control select2" name="Gender" required>
                                        <option value="1" {{$employee->Gender == 1 ? 'selected':''}}>ذكر</option>
                                        <option value="2" {{$employee->Gender == 2 ? 'selected':''}}>انثي</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="Job_title" class="col-sm-3 col-form-label">Job Title</label>
                                    <input class="form-control" name="Job_title" type="text" value="{{$employee->Job_title}}" autofocus>
                                </div>
                                <div class="col-12">
                                    <label for="Additional_info" class="col-sm-3 col-form-label">Additional Info</label>
                                    <textarea class="form-control" name="Additional_info" id="Additional_info" rows="5">{{$employee->Additional_info}}</textarea>
                                </div>
                                <div class="mb-3" data-select2-id="279">
                                    <label class="form-label">select Address Store</label>
                                    <select class="form-control select2" name="store_id">
                                        <option value="{{$employee->store->id}}" selected disabled>{{$employee->store->Address}}</option>
                                        @foreach ($stores as $store)
                                            <option value="{{$store->id}}">{{$store->Address}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3" data-select2-id="279">
                                    <label class="form-label">select Country</label>
                                    <select class="form-control select2" name="country_id">
                                        <option value="{{$employee->country->id}}" selected disabled>{{$employee->country->name}}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3" data-select2-id="279">
                                    <label class="form-label">select City</label>
                                    <select class="form-control select2" name="city_id">
                                        <option value="{{$employee->city->id}}" selected disabled>{{$employee->city->name}}</option>
                                        @foreach ($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Is_Active</label>
                                    <select class="form-control" id="is_active" name="is_active" required>
                                        <option value="{{$employee->is_active}}" selected>{{$employee->is_active == 1 ? 'Active':'Not_Active'}}</option>
                                        <option value="1">Active</option>
                                        <option value="0">Not_Active</option>
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
