@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row fs-5 bg-dark text-warning text-uppercase text-center pt-2">
        <h1>{{ $food->name }}</h1>
    </div>
    <div class="row mb-4 fs-5 text-light">
        <div class="col-md-4 p-0"><img src="/images/{{ $food->image }}" width="100%"></div>
        <div class="bg-danger col-md-8 p-4">
            <h4 class="fw-bold text-uppercase">Deskripsi</h4>
            {{ $food->description }}
            <hr style="height:2px;opacity:0.85;">
            <div class="row justify-content-end">
                <h4 class="w-25 fw-bold text-uppercase text-end mt-4">RM {{ $food->price }}</h4>
            </div>
        </div>
    </div>
</div>

@endsection