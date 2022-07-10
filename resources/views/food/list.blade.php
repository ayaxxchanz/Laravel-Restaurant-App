@extends('layouts.app')

@section('content')
<div class="text-center container-fluid pb-5">
    <img src="/images/logo.png" width="100%">
</div>
<div class="container p-2">
    @foreach ($categories as $category)
    <div class="row bg-danger mb-4">
        <div class="bg-dark p-1">
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