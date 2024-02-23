{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="container-fluid">

	<div class="row page-titles mx-0 mb-3">
        <div class="col-sm-6 p-0">
            <div class="welcome-text">
				<h4>Hi, welcome back!</h4>
				<p class="mb-0">Your business dashboard template</p>
		    </div>
        </div>
        <div class="col-sm-6 p-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">{{ __('common.roles') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('common.edit_role') }}</a></li>
            </ol>
        </div>
    </div>

	<div class="card">
		<div class="card-header">
			<h4 class="card-title">{{ __('common.edit_role') }}</h4>
		</div>
		<form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
        @csrf
			<div class="card-body">
				<div class="basic-form">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">{{ __('common.role_name') }}</label>
						<div class="col-sm-9">
							<input type="text" name="name" id="name" class="form-control" autocomplete="name" value="{{ old('name', $role->name) }}">
							@error('name')
	                            <p class="text-danger">
	                                {{ $message }}
	                            </p>
	                        @enderror
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-end">
				<button type="submit" class="btn btn-primary">{{ __('common.update') }}</button>
				<a href="{{ route('admin.roles.index') }}" class="btn btn-danger">{{ __('common.back') }}</a>
			</div>
		</form>
	</div>

</div>

@endsection