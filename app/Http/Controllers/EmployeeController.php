<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return the json response of all the employees with status code 200
        return response()->json(Employee::all(), 200);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        // Store the Employee
        $employee = Employee::create($request->all());
        return response()->json($employee, 201);        
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        // return employee with status code 200
        return response()->json($employee, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //TODO: Update the same name  generates the error and webpage is opened in the browser
        // update the employee
        $employee->update($request->all());
        return response()->json($employee, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //TODO:  Delete the same name  generates the error and webpage is opened in the browser

        // delete the employee
        $employee->delete();
        return response()->json(null, 204);
    }
}
