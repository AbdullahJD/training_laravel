@extends('Dashboard.layouts.master')

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
                        <li class="breadcrumb-item active" aria-current="page">categories</li>
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
                    <a href="{{route('category.create')}}" class="btn btn-primary" role="button" aria-pressed="true">Add Category</a>
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
                            <th>Description</th>
                            <th>Image</th>
                            <th>Is_Active</th>
                            <th>Processes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                @if($category->image)
                                    <img src="{{asset('Dashboard/assets/category/'.$category->image->filename)}}"
                                         height="50px" width="50px" alt="">

                                @else
                                    <img src="{{asset('Dashboard/assets/images/avatars/avatar-1.png')}}" height="50px"
                                         width="50px" alt="">
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-light-success text-success w-100">
                                {{$category->is_active == 1 ? 'Active':'Not_Active'}}
                                </span>
                            </td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <a href="#edit{{$category->id}}" class="text-warning" data-bs-toggle="modal" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="#delete{{$category->id}}" class="text-danger" data-bs-toggle="modal" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                            @include('Dashboard.Category.edit')
                            @include('Dashboard.Category.delete')
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>

@endsection
