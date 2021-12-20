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

<!-- Content Row -->
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							{{ trans('app.employee.total') }}
						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							{{ $totalEmployees }}
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
							{{ trans('app.hardware.total') }}
						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							{{ $totalHardwares }}
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-print fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
							{{ trans('app.accessory.total') }}
						</div>
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
									{{ $totalAccessories }}
								</div>
							</div>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	{{-- <div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
							<div class="row no-gutters align-items-center">
									<div class="col mr-2">
											<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
													Pending Requests</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
									</div>
									<div class="col-auto">
											<i class="fas fa-comments fa-2x text-gray-300"></i>
									</div>
							</div>
					</div>
			</div>
	</div>
</div> --}}

	<!-- Content Row -->

	<div class="card">

		<h5 class="card-header" style="text-align: center">
			<strong>
				{{ trans('app.employee.alias') }}
			</strong>
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

	@endsection
