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
                            <form action="{{ route('item.update', 'test') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                @csrf
                                <div class="modal-body">
                                    <br>
                                    <div class="col-12">
                                        <label class="form-label">edit name</label>
                                        <input type="hidden" name="id" value="{{ $items->id }}">
                                        <input class="form-control" name="name" type="text" value="{{ $items->name }}" autofocus>
                                    </div>
                                    <br>
                                    <div class="mb-3" data-select2-id="279">
                                        <label class="form-label">select category</label>
                                        <select class="form-control select2" name="category_id">
                                            <option value="" selected disabled>{{$items->category->name}}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <label for="serial_number" class="form-label">Sr.No</label>
                                        <input class="form-control" name="serial_number" type="number" value="{{ $items->serial_number }}" autofocus>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <label for="unit" class="form-label">unit</label>
                                        <input class="form-control" name="unit" type="number" value="{{ $items->unit }}" autofocus>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <label for="description" class="col-sm-3 col-form-label">edit description</label>
                                        <textarea class="form-control" name="description" id="description" rows="5">{{ $items->description }}</textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="status">status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="{{$items->status}}" selected>{{$items->status == 1 ? 'Enabled':'Not_enabled'}}</option>
                                            <option value="1">Enabled</option>
                                            <option value="0">Not_enabled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
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


