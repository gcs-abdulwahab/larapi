<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

use Illuminate\Database\Eloquent\ModelNotFoundException;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Department::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        // Store the Department if validated
        $department = Department::create($request->validated());
        return response()->json($department, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        // using find or fail to check if the deparment exist or not and then return the department 
        if(Department::findOrFail($department->id)){
            return response()->json($department, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //TODO: Update the same name  generates the error and webpage is opened in the browser
        
        // using find or fail to check if the department exist or not and then update it
        if(Department::findOrFail($department->id)){
            $department->update($request->all());
            return response()->json($department, 200);
        }
        else{
            return response()->json(['message' => 'Department not found.'], 404);
        }
    }

 /**
 * Remove the specified resource from storage.
 */
public function destroy(Department $department)
{
//  TODO: Implement destroy() ModelNot Exception method
//  FIXME : Model Not Found Exception

    try {
        $department->findOrFail($department->id)->delete();
        return response()->json(null, 204);
    } catch (ModelNotFoundException $e) {
        return response()->json(['error' => 'Department not found.'], 404);
    }
}


}
