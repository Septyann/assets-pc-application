<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccessoryRequest;
use App\Http\Requests\UpdateAccessoryRequest;
use App\Models\Accessory;

class AccessoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$accessories = Accessory::all()->sortDesc();

		return view('accessories.index', compact('accessories'));
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
	 * @param  \App\Http\Requests\StoreAccessoryRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreAccessoryRequest $request)
	{
		Accessory::query()->create([
			'name' => $request->name
		]);

		$request->session()->flash('success', trans('messages.accessory.saved'));

		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Accessory  $accessory
	 * @return \Illuminate\Http\Response
	 */
	public function show(Accessory $accessory)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Accessory  $accessory
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Accessory $accessory)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateAccessoryRequest  $request
	 * @param  \App\Models\Accessory  $accessory
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateAccessoryRequest $request, Accessory $accessory)
	{
		$accessory->update([
			'name' => $request->name
		]);

		$request->session()->flash('success', trans('messages.accessory.updated'));

		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Accessory  $accessory
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Accessory $accessory)
	{
		$accessory->delete();

		request()->session()->flash('success', trans('messages.accessory.deleted'));

		return back();
	}
}
