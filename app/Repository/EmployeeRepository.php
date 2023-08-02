<?php

namespace App\Repository;

use App\Interfaces\EmployeeRepositoryInterfaces;
use App\Models\City;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class EmployeeRepository implements EmployeeRepositoryInterfaces
{

    public function index()
    {
        $employees = Employee::with('store')->get();
        return view('Dashboard.Employee.index',compact('employees'));
    }

    public function create()
    {
        $stores = Store::all();
        $countries = Country::all();
        $cities = City::all();
        return view('Dashboard.Employee.add',compact('stores','countries','cities'));
    }

    public function store($request)
    {
        try {
            $employees = new Employee();
            $employees->name = $request->name;
            $employees->Phone_number = $request->Phone_number;
            $employees->Personal_id = $request->Personal_id;
            $employees->Gender = $request->Gender;
            $employees->Job_title = $request->Job_title;
            $employees->Additional_info = $request->Additional_info;
            $employees->is_active = 1;
            $employees->store_id = $request->store_id;
            $employees->country_id = $request->country_id;
            $employees->city_id = $request->city_id;
            $employees->save();

            DB::commit();
            toastr()->success('The data has been saved successfully');
            return redirect()->route('Employee.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $employee = Employee::findorfail($id);
        $stores = Store::all();
        $countries = Country::all();
        $cities = City::all();
        return view('Dashboard.Employee.edit',compact('employee','stores','countries','cities'));
    }

    public function update($request)
    {
        try {
            $employees = Employee::findorfail($request->id);
            $employees->name = $request->name;
            $employees->Phone_number = $request->Phone_number;
            $employees->Personal_id = $request->Personal_id;
            $employees->Gender = $request->Gender;
            $employees->Job_title = $request->Job_title;
            $employees->Additional_info = $request->Additional_info;
            $employees->is_active = $request->is_active;
            $employees->store_id = $request->store_id;
            $employees->country_id = $request->country_id;
            $employees->city_id = $request->city_id;
            $employees->save();

            DB::commit();
            toastr()->success('The data has been modified successfully');
            return redirect()->route('Employee.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Employee::destroy($request->id);
        toastr()->error('The data has been deleted successfully');
        return redirect()->back();
    }
}
