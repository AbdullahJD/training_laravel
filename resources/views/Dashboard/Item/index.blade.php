@extends('Dashboard.layouts.master')
@section('title')
    Item
@endsection
    @section('content')
{{--        @include('Dashboard.messages_alert')--}}
        <main class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tables</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Item</li>
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
                        <a href="{{route('item.create')}}" class="btn btn-primary" role="button" aria-pressed="true">Add Item</a>
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
                                <th>Name</th>
                                <th>Category Name</th>
                                <th>Serial Number</th>
                                <th>status</th>
                                <th>Unit</th>
                                <th>description</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($item as $items)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$items->name}}</td>
                                    <td>{{$items->category->name}}</td>
                                    <td>{{$items->serial_number}}</td>
                                    <td>
                                <span class="badge bg-light-success text-success w-100">
                                {{$items->status == 1 ? 'Enabled':'Not_enabled'}}
                                </span>
                                    </td>
                                    <td>{{$items->unit->name}}</td>
                                    <td>{{$items->description}}</td>
                                    <td>
                                        <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                            <a href="{{route('item.edit',$items->id)}}" class="text-warning"   data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="#delete{{$items->id}}" class="text-danger" data-bs-toggle="modal" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @include('Dashboard.Item.delete')
{{--                                @include('Dashboard.Item.edit')--}}
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

    @endsection
