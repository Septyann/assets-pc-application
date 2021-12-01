<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Accessory;
use App\Models\Employee;
use App\Models\Hardware;
use App\Models\Position;

class EmployeeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$employees = Employee::all();

		return view('employees.index', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$positions = Position::all();

		$hardwares = Hardware::all();

		$accessories = Accessory::all();

		return view('employees.create', compact('positions', 'hardwares', 'accessories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreEmployeeRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreEmployeeRequest $request)
	{
		// dd($request->all());

		Employee::query()->create([
			'name' => $request->name,
			'position_id' => $request->position_id,
			'ip0'	=> $request->ip0,
			'ip1'	=> $request->ip1,
			'ip2'	=> $request->ip2,
		]);

		$request->session()->flash('success', trans('messages.employee.saved'));

		return redirect()->route('employees.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function show(Employee $employee)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Employee $employee)
	{
		$positions = Position::all();

		$hardwares = Hardware::all();

		$accessories = Accessory::all();

		return view(
			'employees.edit',
			compact(
				'employee',
				'positions',
				'hardwares',
				'accessories',
			)
		);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
	 * @param  \App\Models\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateEmployeeRequest $request, Employee $employee)
	{
		$employee->update([
			'name' => $request->name,
			'position_id' => $request->position_id,
			'ip0' => $request->ip0,
			'ip1' => $request->ip1,
			'ip2' => $request->ip2,
		]);

		$request->session()->flash('success', trans('messages.employee.updated'));

		return redirect()->route('employees.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Employee $employee)
	{
		$employee->delete();

		request()->session()->flash('success', trans('messages.employee.deleted'));

		return back();
	}
}
