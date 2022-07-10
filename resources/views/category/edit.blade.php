@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="{{ route('category.update', [$category->id]) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="fw-bold">Edit Category</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $category->name }}">

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