@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    All Category
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($categories) > 0)
                            @foreach ($categories as $key=>$category)
                            <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('category.edit', [$category->id]) }}">
                                    <button class="btn btn-sm btn-success">Edit</button>
                                </a>
                            
                                <a href="">
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </a>
                            </td>
                            </tr>
                            @endforeach

                            @else

                            <td colspan="4" style="text-align:center;">No category to display.</td>

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
