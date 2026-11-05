@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center mt-5">
        <div class="card mb-3 shadow-sm" style="max-width: 800px;">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="{{ asset($product['photo']) }}" class="img-fluid rounded-start w-100 h-100"
                        style="object-fit: cover;" alt="{{ $product['name'] }}">
                </div>
                <div class="col-md-7">
                    <div class="card-body d-flex flex-column h-100">
                        <h2 class="card-title">{{ $product['name'] }}</h2>

                        <p class="card-text mb-1"><strong>Категория:</strong> {{ ucfirst($product['category']) }}</p>
                        <p class="card-text mb-1"><strong>Год выпуска:</strong> {{ $product['year'] }}</p>
                        <p class="card-text mb-3"><strong>Цена:</strong> <span
                                class="text-primary fs-4">{{ number_format($product['price'], 0, ',', ' ') }} руб.</span>
                        </p>

                        <p class="card-text flex-grow-1"><strong>Описание:</strong><br>{{ $product['description'] }}</p>

                        <div class="mt-auto">
                            <form action="#" method="post">
                                @csrf
                                <button class="bg-primary text-white border-0 rounded-2 px-4 py-2 mb-2" type="submit">В
                                    корзину</button>
                            </form>
                            <a href="{{ route('catalog', request()->query()) }}"
                                class="btn btn-outline-secondary btn-sm">
                                ← Вернуться в каталог
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
