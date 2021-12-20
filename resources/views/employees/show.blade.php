@extends('layouts.default')

@section('title', trans('app.employee.detail'))

@section('content')

<div class="card">

	<h5 class="card-header" style="text-align: center">
		{{ trans('app.employee.detail') }} - <strong>{{ $employee->name }}</strong>
	</h5>

	<div class="card-body">
		<img src="{{ asset('images/login-icon-3048.png') }}" class="rounded mx-auto d-block" alt="" width="100px">

		<div class="text-center mb-1">
			<label for="">
				{{ trans('app.employee.created') }}
			</label>
			{{ date('d-m-Y', strtotime($employee->created_at)); }}
		</div>

		<div class="mb-3 row">
			<label class="col-md-1 col-form-label">
				{{ trans('app.employee.name') }}
			</label>
			<div class="col-md-11">
				<input type="text" class="form-control" value="{{ $employee->name }}" readonly>
			</div>
		</div>

		<div class="mb-3 row">
			<label class="col-md-1 col-form-label">
				{{ trans('app.employee.position') }}
			</label>
			<div class="col-md-11">
				<input type="text" class="form-control" value="{{ $employee->position->name }}" readonly>
			</div>
		</div>

		<div class="mb-3 row">
			<label class="col-md-1 col-form-label">
				{{ trans('app.employee.ip0') }}
			</label>
			<div class="col-md-11">
				<input type="text" class="form-control" value="{{ $employee->ip0 }}" readonly>
			</div>
		</div>

		<div class="mb-3 row">
			<label class="col-md-1 col-form-label">
				{{ trans('app.employee.ip1') }}
			</label>
			<div class="col-md-11">
				<input type="text" class="form-control" value="{{ $employee->ip1 }}" readonly>
			</div>
		</div>

		<div class="mb-3 row">
			<label class="col-md-1 col-form-label">
				{{ trans('app.employee.ip2') }}
			</label>
			<div class="col-md-11">
				<input type="text" class="form-control" value="{{ $employee->ip2 }}" readonly>
			</div>
		</div>

		<div class="mb-3 row">
			<label class="col-md-1 col-form-label">
				{{ trans('app.employee.hardware') }}
			</label>
			<div class="col-md-11">
				@foreach ($employee->hardwares as $hardware)
				<input type="text" class="form-control mb-2" value="{{ $hardware->name }}" readonly>
				@endforeach
			</div>
		</div>

		<div class="mb-3 row">
			<label class="col-md-1 col-form-label">
				{{ trans('app.employee.accessory') }}
			</label>
			<div class="col-md-11">
				@foreach ($employee->accessories as $accessory)
				<input type="text" class="form-control mb-2" value="{{ $accessory->name }}" readonly>
				@endforeach
			</div>
		</div>
	</div>

	<div class="card-footer">
		<a href="{{ route('employees.index') }}" class="btn btn-secondary">
			{{ trans('app.button.back') }}
		</a>
	</div>
</div>

@endsection
