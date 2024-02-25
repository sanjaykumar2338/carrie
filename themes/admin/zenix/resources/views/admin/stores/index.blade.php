{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="{{ route('alert.store') }}">
                    @csrf <!-- CSRF token for security -->
                    <div class="mb-3">
                        <label for="store" class="form-label">Store</label>
                        <select class="form-select" id="store" name="store_id" required>
                            @foreach($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->storeName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="operator" class="form-label">Operator</label>
                        <select class="form-select" id="operator" name="operator" required>
                            <option value=">">Greater than (>)</option>
                            <option value="=">Equal to (=)</option>
                            <option value="<">Less than (<)</option>
                            <option value="<=">Less than or equal to (<=)</option>
                            <option value=">=">Greater than or equal to (>=)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="percent" class="form-label">Percent</label>
                        <input type="number" class="form-control" id="percent" name="percent" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alert Type</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alert_type" id="email" value="email" checked>
                            <label class="form-check-label" for="email">Email</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alert_type" id="text" value="text">
                            <label class="form-check-label" for="text">Text</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alert_type" id="both" value="both">
                            <label class="form-check-label" for="both">Both</label>
                        </div>
                    </div>
                    <div class="mb-3 form-switch">
                        <input class="form-check-input" type="checkbox" id="alert" name="alert" checked>
                        <label class="form-check-label" for="alert">Alert</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
