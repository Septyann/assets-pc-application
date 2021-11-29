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
					<td>{{ $employee->ip0 }}</td>
					<td>{{ $employee->ip1 }}</td>
					<td>
						<button class="btn btn-sm btn-info" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
							aria-controls="offcanvasTop">
							{{ trans('app.button.detail') }}
						</button>

						{{-- offcanvas --}}
						<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
							<div class="offcanvas-header">
								<h5 id="offcanvasTopLabel">Offcanvas top</h5>
								<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
									aria-label="Close"></button>
							</div>
							<div class="offcanvas-body">
								...
							</div>
						</div>
						{{-- end of offcanvas --}}

						<a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">
							{{ trans('app.button.edit') }}
						</a>

						<form action="{{ route('accessories.destroy', $employee->id) }}" method="POST" class="d-inline">
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

@endsection
