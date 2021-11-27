<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHardwareRequest;
use App\Http\Requests\UpdateHardwareRequest;
use App\Models\Hardware;

class HardwareController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$hardwares = Hardware::all();

		return view('hardwares.index', compact('hardwares'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreHardwareRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreHardwareRequest $request)
	{
		Hardware::query()->create([
			'name' => $request->name
		]);

		$request->session()->flash('success', trans('messages.hardware.saved'));

		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Hardware  $hardware
	 * @return \Illuminate\Http\Response
	 */
	public function show(Hardware $hardware)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Hardware  $hardware
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Hardware $hardware)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateHardwareRequest  $request
	 * @param  \App\Models\Hardware  $hardware
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateHardwareRequest $request, Hardware $hardware)
	{
		$hardware->update([
			'name' => $request->name
		]);

		$request->session()->flash('success', trans('messages.hardware.updated'));

		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Hardware  $hardware
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Hardware $hardware)
	{
		$hardware->delete();

		request()->session()->flash('success', trans('messages.hardware.deleted'));

		return back();
	}
}
