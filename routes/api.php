php <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// // create Api Route for Employee
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('departments', DepartmentController::class);

Route::apiResource('users', UserController::class);
Route::apiResource('tags', TagController::class);