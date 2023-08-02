@extends('Dashboard.layouts.master')
@section('title')
    edit Store
@endsection

@section('css')
    <link href="{{asset('Dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('Dashboard/assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
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
                            <h6 class="mb-0 text-uppercase">Edit</h6>
                            <hr>
                            <form action="{{ route('store.update', 'test') }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <br>
                                    <div class="col-12">
                                        <label for="Address" class="col-sm-3 col-form-label">Address</label>
                                        <input type="hidden" name="id" value="{{ $store->id }}">
                                        <textarea class="form-control" name="Address" id="Address" rows="5">{{$store->Address}}</textarea>
                                    </div>

                                    <br>
                                    <div class="col-6">
                                        <label for="Telephone_number" class="col-sm-3 col-form-label">Telephone Number</label>
                                        <input class="form-control" name="Telephone_number" type="number" autofocus value="{{$store->Telephone_number}}">
                                    </div>
                                    <br>
                                    <div class="col-6">
                                        <label for="commercial_register" class="col-sm-3 col-form-label">Commercial Register</label>
                                        <input class="form-control" name="commercial_register" type="text" autofocus value="{{$store->commercial_register}}">
                                    </div>
                                    <br>
                                    <div class="mb-3" data-select2-id="279">
                                        <label class="form-label">select Item</label>
                                        <select class="form-control select2" name="item_id">
                                            @foreach($store->items as $item)
                                                <option value="{{$item->id}}" selected disabled>{{$item->name}}</option>
                                            @endforeach
                                                @foreach ($items as $store_item)
                                                <option value="{{ $store_item->id }}">{{$store_item->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="is_active">status</label>
                                        <select class="form-control" id="is_active" name="is_active" required>
                                            <option value="{{$store->is_active}}" selected>{{$store->is_active == 1 ? 'Active':'Not_Active'}}</option>
                                            <option value="1">Active</option>
                                            <option value="0">Not_Active</option>
                                        </select>
                                    </div>
{{--                                    @endforeach--}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--end row-->
    </main>
@endsection

@section('js')
    <script src="{{asset('Dashboard/assets/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('Dashboard/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('Dashboard/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('Dashboard/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('Dashboard/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('Dashboard/assets/js/pace.min.js')}}"></script>
    <script src="{{asset('Dashboard/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('Dashboard/assets/js/form-select2.js')}}"></script>

    <!--app-->
    <script src="{{asset('Dashboard/assets/js/app.js')}}"></script>
@endsection






