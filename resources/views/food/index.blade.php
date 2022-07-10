@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-baseline mb-4">
                <h4 class="fw-bold">All Food</h4>

                <a href="{{ route('food.create') }}">
                    <button class="btn btn-outline-dark">
                        Add New
                    </button>
                </a>
            </div>

            <div style="overflow-x:auto;">
                <table class="table table-responsive table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price (RM)</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($foods) > 0)
                        @foreach ($foods as $key=>$food)
                        <tr>
                            <td class="col-md-1"><img src="{{ asset('images') }}/{{ $food->image }}" width="100"></td>
                            <td class="col-md-2">{{ $food->name }}</td>
                            <td class="col-md-6">{{ $food->description }}</td>
                            <td class="col-md-1">{{ $food->price }}</td>
                            <td class="col-md-1">{{ $food->category->name }}</td>
                            <td class="col-md-1 text-center">
                                <div class="mb-3 d-grid gap-2">
                                    <!-- Edit Action Button -->
                                    <a href="{{ route('food.edit', [$food->id]) }}" class="btn btn-sm btn-success">Edit
                                    </a>

                                    <!-- Delete Action Button -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $food->id }}">
                                        Delete
                                    </button>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="exampleModal{{ $food->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('food.destroy', [$food->id]) }}" method="post">
                                                @csrf
                                                {{ method_field ('DELETE') }}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{ $food->id }}">
                                                            CAUTION!
                                                        </h5>
                                                        <button type="button" class="btn-close btn-sm"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this category?<br>Once deleted,
                                                        it
                                                        cannot be restored.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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

            {{ $foods->links() }}
        </div>
    </div>
</div>
@endsection