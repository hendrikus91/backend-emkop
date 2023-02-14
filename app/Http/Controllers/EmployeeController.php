<?php

namespace App\Http\Controllers;

use exception;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::when(request()->name, function($query, $name) {
            $query->where('name', 'like', '%'.$name.'%');
        })
        ->orderByDesc('id')
        ->paginate(10);


        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            Employee::create($request->all());

            return response()->json([
                'code' => 200,
                'message' => 'Data employee has been created',

            ], 200);

        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        try {
            return response()->json($employee);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        try {
            return response()->json($employee);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        try {

            $employee->update($request->all());

            return response()->json([
                'code' => 200,
                'message' => 'Data employee has been updated'
            ]);

        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try {

            $employee->delete();

            return response()->json([
                'code' => 200,
                'message' => 'Data employee has been deleted'
            ]);


        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
