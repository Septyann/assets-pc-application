@extends('layouts.default')

@section('title', trans('app.user.alias'))

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
		<strong>
			{{ trans('app.user.alias') }}
		</strong>
	</h5>

	<div class="card-body">

		<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ModalCreate">
			{{ trans('app.user.create') }}
		</button>

		<!-- Modal Create -->
		<div class="modal fade" id="ModalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
			aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">
							{{ trans('app.user.create') }}
						</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="{{ route('users.store') }}" method="POST">
							@csrf
							{{-- Name --}}
							<div class="row mb-3">
								<label class="col-md-3 col-form-label" for="">
									{{ trans('app.user.name') }}
									<span class="text-danger">*</span>
								</label>
								<div class="col-md">
									<input type="text" name="name" id="" class="form-control" required>
								</div>
							</div>

							{{-- Username --}}
							<div class="row mb-3">
								<label class="col-md-3 col-form-label" for="">
									{{ trans('app.user.username') }}
									<span class="text-danger">*</span>
								</label>
								<div class="col-md">
									<input type="text" name="username" id="" class="form-control" required>
								</div>
							</div>

							{{-- Email --}}
							<div class="row mb-3">
								<label class="col-md-3 col-form-label" for="">
									{{ trans('app.user.email') }}
									<span class="text-danger">*</span>
								</label>
								<div class="col-md">
									<input type="email" name="email" id="" class="form-control" required>
								</div>
							</div>

							{{-- Password --}}
							<div class="row mb-3">
								<label class="col-md-3 col-form-label" for="">
									{{ trans('app.user.password') }}
									<span class="text-danger">*</span>
								</label>
								<div class="col-md">
									<input type="password" name="password" id="" class="form-control" required>
								</div>
							</div>

							{{-- Confirm Password --}}
							<div class="row">
								<label class="col-md-3 col-form-label" for="">
									{{ trans('app.user.confirm_password') }}
									<span class="text-danger">*</span>
								</label>
								<div class="col-md">
									<input type="password" name="password" id="" class="form-control" required>
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">
							{{ trans('app.button.save') }}
						</button>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
							{{ trans('app.button.close') }}
						</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		{{-- End Modal Create --}}

		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>{{ trans('app.general.number') }}</th>
					<th>{{ trans('app.user.name') }}</th>
					<th>{{ trans('app.user.email') }}</th>
					<th>{{ trans('app.general.action') }}</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						<a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
							{{ trans('app.button.edit') }}
						</a>

						<form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
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
