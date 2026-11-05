@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <img src="../../public/images/logo.jpg" alt="Логотип Copy Star" width="150">
            <p><em>Девиз компании: Качество копирования — наша звезда!</em></p>
        </div>

        <hr>

        <main>
            <h1>Новинки компании</h1>

            <div id="carouselExampleIndicators" class="carousel slide" style="height: 400px;">
                <div class="carousel-inner h-100">
                    @foreach ($products as $product)
                        @if ($loop->first)
                            <div class="position-relative carousel-item active h-100">
                                <img src="{{ asset($product['photo']) }}" class="d-block w-100 h-100" alt="{{ $product['name'] }}">
                                <h3 class="position-absolute end-50" style="bottom: 5%;">{{ $product['name'] }}</h3>
                            </div>
                        @else
                            <div class="position-relative carousel-item h-100">
                                <img src="{{ asset($product['photo']) }}" class="d-block w-100 h-100" alt="{{ $product['name'] }}">
                                <h3 class="position-absolute end-50" style="bottom: 5%;">{{ $product['name'] }}</h3>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev bg-secondary" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true">

                    </span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next bg-secondary" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </main>

        <hr>

        <footer>
            <p>&copy; 2026 Copy Star. Все права защищены.</p>
        </footer>

    </div>
@endsection
