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
                <h4 class="fw-bold">All Category</h4>

                <a href="{{ route('category.create') }}">
                    <button class="btn btn-outline-dark">
                        Add New
                    </button>
                </a>
            </div>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories) > 0)
                    @foreach ($categories as $key=>$category)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $category->name }}</td>
                        <td class="text-center">
                            <!-- Edit Action Button -->
                            <a href="{{ route('category.edit', [$category->id]) }}">
                                <button class="btn btn-sm btn-success">Edit</button>
                            </a>

                            <!-- Delete Action Button -->
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $category->id }}">
                                Delete
                            </button>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('category.destroy', [$category->id]) }}" method="post">
                                        @csrf
                                        {{ method_field ('DELETE') }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel{{ $category->id }}">
                                                    CAUTION!</h5>
                                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this category?<br>Once deleted, it
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
@endsection