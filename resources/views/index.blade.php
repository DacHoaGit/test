@extends('master')

@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-start gap-3 flex-wrap">
            @foreach ($products as $product)
                <div class="card" style="width: 18rem;">
                    <img height="286px" src="{{ asset('images/' . $product->image) }}" alt="Ảnh sản phẩm" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                    <div class="card-body">
                        <a href="#" class="card-link">{{ Auth::user() ? $product->price : 'Liên Hệ' }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
