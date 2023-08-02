@extends('Dashboard.layouts.master')
@section('title')
    Store
@endsection
@section('content')
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Store</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <a href="{{route('store.create')}}" class="btn btn-primary" role="button" aria-pressed="true">Add Store</a>
                    <form class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                        <input class="form-control ps-5" type="text" placeholder="search">
                    </form>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Address</th>
                            <th>Telephone Number</th>
                            <th>Commercial Register</th>
                            <th>Is Active</th>
                            <th>Items</th>
{{--                            <th>quantity</th>--}}
                            <th>Processes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stores as $store)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$store->Address}}</td>
                                <td>{{$store->Telephone_number}}</td>
                                <td>{{$store->commercial_register}}</td>
                                <td>
                                <span class="badge bg-light-success text-success w-100">
                                {{$store->is_active == 1 ? 'Active':'Not_Active'}}
                                </span>
                                </td>
                                <td>
                                    @foreach($store->items as $item)
                                            {{$item->name}}
                                    @endforeach
                                </td>
{{--                                <td>--}}
{{--                                    @foreach ($store->items as $item)--}}
{{--                                        {{ $item->pivot->quantity }}--}}
{{--                                    @endforeach--}}
{{--                                </td>--}}
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('store.edit',$store->id)}}" class="text-warning"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="#delete{{$store->id}}" class="text-danger" data-bs-toggle="modal" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                    </div>
                                </td>
                            </tr>
{{--                            @include('Dashboard.Store.edit')--}}
                            @include('Dashboard.Store.delete')
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
