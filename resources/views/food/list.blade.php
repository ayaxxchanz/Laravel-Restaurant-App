@extends('layouts.app')

@section('content')
<div class="container">
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
            <p><button class="btn btn-outline-light col-6 mx-auto">View</button></p>
        </div>
        @endforeach
    </div>
    @endforeach

    <!-- <div class="flex">

        </div>

        <div class="col text-center">
            <img src="https://www.sushitenomakase.com/wp-content/uploads/2021/08/d0b1a408-4ee4-4ddb-9439-50355b18ea0b-300x300.jpeg" width="50%">

            <p>Makanan</p>
        Column
        </div>
        <div class="col">
        Column
        </div>
        <div class="col">
        Column
        </div>
    </div> -->
</div>
@endsection