@extends('Dashboard.layouts.master')
@section('title')
    Add Item
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
                            <form action="{{route('item.store')}}" method="post" autocomplete="off" enctype="multipart/form-data" class="row g-3">
                                {{ csrf_field() }}
                                <div class="col-12">
                                    <label class="form-label">Add name</label>
                                    <input class="form-control" name="name" type="text" autofocus>
                                </div>
                                <div class="mb-3" data-select2-id="279">
                                    <label class="form-label">select category</label>
                                    <select class="form-control select2" name="category_id">
                                        <option value="" selected disabled>------</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="serial_number" class="col-sm-3 col-form-label">Sr.No</label>
                                    <input class="form-control" name="serial_number" type="number" autofocus>
                                </div>
                                <div class="mb-3" data-select2-id="279">
                                    <label class="form-label">select Unit</label>
                                    <select class="form-control select2" name="unit_id">
                                        <option value="" selected disabled>------</option>
                                        @foreach ($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="description" class="col-sm-3 col-form-label">description</label>
                                    <textarea class="form-control" name="description" id="description" rows="5"></textarea>
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
