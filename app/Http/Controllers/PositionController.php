<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;

class PositionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$positions = Position::all();

		return view('positions.index', compact('positions'));
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
	 * @param  \App\Http\Requests\StorePositionRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StorePositionRequest $request)
	{
		Position::query()->create([
			'name' => $request->name
		]);

		$request->session()->flash('success', trans('messages.position.saved'));

		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Position  $position
	 * @return \Illuminate\Http\Response
	 */
	public function show(Position $position)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Position  $position
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Position $position)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdatePositionRequest  $request
	 * @param  \App\Models\Position  $position
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdatePositionRequest $request, Position $position)
	{
		$position->update([
			'name' => $request->name
		]);

		$request->session()->flash('success', trans('messages.position.updated'));

		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Position  $position
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Position $position)
	{
		$position->delete();

		request()->session()->flash('success', trans('messages.position.deleted'));

		return back();
	}
}
