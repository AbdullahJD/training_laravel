<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\EmployeeRepositoryInterfaces;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $emplyoees;

    public function __construct(EmployeeRepositoryInterfaces $emplyoees)
    {
        $this->emplyoee = $emplyoees;
    }

    public function index()
    {
        return $this->emplyoee->index();
    }

    public function create()
    {
        return $this->emplyoee->create();
    }

    public function store(Request $request)
    {
        return $this->emplyoee->store($request);
    }


    public function edit(string $id)
    {
        return $this->emplyoee->edit($id);
    }

    public function update(Request $request)
    {
        return $this->emplyoee->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->emplyoee->destroy($request);
    }
}
