@extends('Dashboard.layouts.master')
@section('title')
    Employee
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
                        <li class="breadcrumb-item active" aria-current="page">Employee</li>
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
                    <a href="{{route('Employee.create')}}" class="btn btn-primary" role="button" aria-pressed="true">Add Employee</a>
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
                            <th>Phone Number</th>
                            <th>Personal id</th>
                            <th>Gender</th>
                            <th>Job Title</th>
                            <th>Additional Info</th>
                            <th>Is Active</th>
                            <th>Place Work</th>
                            <th>Processes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->Phone_number}}</td>
                                <td>{{$employee->Personal_id}}</td>
                                <td>{{$employee->Gender == 1 ? 'ذكر' :'انثي'}}</td>
                                <td>{{$employee->Job_title}}</td>
                                <td>{{$employee->Additional_info}}</td>
                                <td>
                                <span class="badge bg-light-success text-success w-100">
                                {{$employee->is_active == 1 ? 'Active':'Not_Active'}}
                                </span>
                                </td>
                                <td>{{$employee->country->name}}-{{$employee->city->name}}-{{$employee->store->Address}}</td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('Employee.edit',$employee->id)}}" class="text-warning"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="#delete{{$employee->id}}" class="text-danger" data-bs-toggle="modal" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @include('Dashboard.Employee.delete')
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
