@extends('layouts.default')

@section('title', trans('app.employee.alias'))

@section('content')

@if (session('success'))
<div class="alert alert-success" role="alert">
	<strong>
		{{ session('success') }}
	</strong>
</div>
@endif

<div class="card">

	<h5 class="card-header" style="text-align: center">
		{{ trans('app.employee.alias') }}
	</h5>

	<div class="card-body">

		<a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">
			{{ trans('app.employee.create') }}
		</a>

		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>{{ trans('app.general.number') }}</th>
					<th>{{ trans('app.employee.name') }}</th>
					<th>{{ trans('app.employee.position') }}</th>
					<th>{{ trans('app.employee.ip0') }}</th>
					<th>{{ trans('app.employee.ip1') }}</th>
					<th>{{ trans('app.general.action') }}</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($employees as $employee)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $employee->name }}</td>
					<td>{{ $employee->position->name }}</td>
					<td>{{ $employee->ip0 }}</td>
					<td>{{ $employee->ip1 }}</td>
					<td>
						<a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info">
							{{ trans('app.button.detail') }}
						</a>

						<a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">
							{{ trans('app.button.edit') }}
						</a>

						<form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger"
								onclick="return confirm('{{ trans('app.general.confirm') }}')">
								{{ trans('app.button.delete') }}
							</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<form action="{{ route('logout') }}" method="POST">
@csrf
<button type="submit" class="mt-3 btn btn-secondary">
	{{ trans('app.button.logout') }}
</button>
</form>

@endsection
