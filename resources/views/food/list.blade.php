@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($categories as $category)
    <div class="row bg-danger mb-4" style="border-radius:10px;box-shadow: 0px 0px 10px 5px #bfbfbf;">
        <div class="bg-dark p-1" style="border-radius:10px 10px 0 0">
            <h1 class="text-warning px-4 pt-2 text-uppercase">{{ $category->name }}</h1>
        </div>
        @foreach (App\Models\Food::where('category_id', $category->id)->get() as $food)
        <div class="col-3 p-4 text-center text-light">
            <img src="{{ asset('images') }}/{{ $food->image }}"
                class="mb-2 rounded-circle w-50 border border-4 border-white">
            <br>
            <span class="fs-4 fw-bold">{{ $food->name }}</span>
            <br>
            <span>RM {{ $food->price }}</span>
            <p><a href="/food/{{ $food->id }}"><button class="btn btn-outline-light col-6 mx-auto">View</button></a></p>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
@endsection