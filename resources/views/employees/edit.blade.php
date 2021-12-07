@extends('layouts.default')

@section('title', trans('app.employee.create'))

@section('content')

<div class="card">

	<h5 class="card-header" style="text-align: center">
		{{ trans('app.employee.edit') }}
	</h5>

	<form action="{{ route('employees.update', $employee->id) }}" method="POST">
		@method('PUT')
		@csrf

		<div class="card-body">
			<h5>{{ trans('app.employee.employee_info') }}</h5>
			<hr>
			<div class="row mb-3">
				<label class="col-sm-2" for="">
					{{ trans('app.employee.name') }}
					<span class="text-danger">*</span>
				</label>
				<div class="col-sm">
					<input type="text" name="name" id="" class="form-control" value="{{ $employee->name }}" required>
				</div>
			</div>
			<div class="row mb-3">
				<label for="" class="col-sm-2">
					{{ trans('app.employee.position') }}
					<span class="text-danger">*</span>
				</label>
				<div class="col-sm">
					<select name="position_id" id="" class="form-select">
						<option selected value="{{ $employee->position->id }}">
							{{ $employee->position->name }}
						</option>
						@foreach ($positions as $position)
						<option value="{{ $position->id }}">
							{{ $position->name }}
						</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label for="" class="col-sm-2">
					{{ trans('app.employee.ip') }}
					<span class="text-danger">*</span>
				</label>
				<div class="col-sm">
					<input type="text" name="ip0" class="form-control" placeholder="IP 0" value="{{ $employee->ip0 }}">
				</div>
				<div class="col-sm">
					<input type="text" name="ip1" class="form-control" placeholder="IP 1" value="{{ $employee->ip1 }}">
				</div>
				<div class="col-sm">
					<input type="text" name="ip2" class="form-control" placeholder="IP 2 (this ip maybe can null)" value="{{ $employee->ip2 }}">
				</div>
			</div>
			<hr>
			<br>

			<h5>{{ trans('app.employee.hardware') }} & {{ trans('app.employee.accessory') }}</h5>
			<hr>
			<div class="row mb-3">
				<label for="" class="col-sm">
					{{ trans('app.employee.hardware') }}
					<span class="text-danger">*</span>
				</label>
				<div class="col-sm">
					@foreach ($hardwares as $hardware)
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="hardwares[]" value="{{ $hardware->id }}" {{ in_array($hardware->id, $ownedHardwares) ? 'checked' : '' }}>
						<label for="">
							{{ $hardware->name }}
						</label>
					</div>
					@endforeach
				</div>

				{{-- <label for="" class="col-sm">
					{{ trans('app.employee.accessory') }}
					<span class="text-danger">*</span>
				</label>
				<div class="col-sm">
					@foreach ($accessories as $accessory)
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="hardware_id[]" value="{{ $accessory->id }}">
						<label for="">
							{{ $accessory->name }}
						</label>
					</div>
					@endforeach
				</div> --}}
			</div>
		</div>

		<div class="card-footer">
			<button type="submit" class="btn btn-primary mr-2">
				{{ trans('app.button.save') }}
			</button>
			<button type="reset" class="btn btn-secondary mr-2">
				{{ trans('app.button.reset') }}
			</button>
			<a href="{{ route('employees.index') }}" class="btn btn-secondary">
				{{ trans('app.button.back') }}
			</a>
		</div>
	</form>

</div>

@endsection
