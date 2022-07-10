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
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    All Food

                    <a href="{{ route('food.create') }}">
                        <button class="btn btn-outline-dark">
                            Add New
                        </button>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">Image</th>
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
                            <td><img src="{{ asset('images') }}/{{ $food->image }}" width="100"></td>
                            <td>{{ $food->name }}</td>
                            <td>{{ $food->description }}</td>
                            <td>{{ $food->price }}</td>
                            <td>{{ $food->category->name }}</td>
                            <td>
                                <!-- Edit Action Button -->
                                <a href="{{ route('food.edit', [$food->id]) }}">
                                    <button class="btn btn-sm btn-success">Edit</button>
                                </a>

                                <!-- Delete Action Button -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $food->id }}">
                                        Delete
                                </button>
                            
                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="exampleModal{{ $food->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('food.destroy', [$food->id]) }}"  method="post">
                                        @csrf
                                        {{ method_field ('DELETE') }}
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{ $food->id }}">CAUTION!</h5>
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

                    {{ $foods->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
