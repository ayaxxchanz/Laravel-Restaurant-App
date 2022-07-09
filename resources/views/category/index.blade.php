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
                                <!-- Edit Action Button -->
                                <a href="{{ route('category.edit', [$category->id]) }}">
                                    <button class="btn btn-sm btn-success">Edit</button>
                                </a>

                                <!-- Delete Action Button -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $category->id }}">
                                        Delete
                                </button>
                            
                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('category.destroy', [$category->id]) }}"  method="post">
                                        @csrf
                                        {{ method_field ('DELETE') }}
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{ $category->id }}">CAUTION!</h5>
                                            <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this category?<br>Once deleted, it cannot be restored.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </td>
                            </tr>
                            @endforeach

                            @else

                            <td colspan="3" style="text-align:center;">No category to display.</td>

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
