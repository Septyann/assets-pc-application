@extends('layouts.default')

@section('title', trans('app.hardware.alias'))

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
		{{ trans('app.hardware.alias') }}
	</h5>

	<div class="card-body">
		<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ModalCreate">
			{{ trans('app.hardware.create') }}
		</button>

		<!-- Modal Create -->
		<div class="modal fade" id="ModalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
			aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">
							{{ trans('app.hardware.create') }}
						</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="{{ route('hardwares.store') }}" method="POST">
							@csrf
							<div class="row">
								<label class="col-sm-2 col-form-label" for="">
									{{ trans('app.hardware.name') }}
									<span class="text-danger">*</span>
								</label>
								<div class="col-sm">
									<input type="text" name="name" id="" class="form-control" required>
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
					<th>{{ trans('app.hardware.name') }}</th>
					<th>{{ trans('app.general.action') }}</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($hardwares as $hardware)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $hardware->name }}</td>
					<td>
						<button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
							data-bs-target="#ModalEdit{{ $hardware->id }}">
							{{ trans('app.button.edit') }}
						</button>

						<!-- Modal Edit -->
						<div class="modal fade" id="ModalEdit{{ $hardware->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">
											{{ trans('app.hardware.create') }}
										</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form action="{{ route('hardwares.update', $hardware->id) }}" method="POST">
											@csrf
											@method('PUT')
											<div class="row">
												<label class="col-sm-2 col-form-label" for="">
													{{ trans('app.hardware.name') }}
													<span class="text-danger">*</span>
												</label>
												<div class="col-sm">
													<input type="text" name="name" id="" class="form-control" value="{{ $hardware->name }}">
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
						{{-- End Modal Edit --}}

						<form action="{{ route('hardwares.destroy', $hardware->id) }}" method="POST" class="d-inline">
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
