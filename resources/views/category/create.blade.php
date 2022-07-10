@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif

            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="fw-bold">Add New Category</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input autofocus type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 d-grid gap-2">
                            <button class="btn btn-dark">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection