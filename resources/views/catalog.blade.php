@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center">
        <h2>Каталог товаров</h2>

        <section id="filters">
            <form action="{{ route('catalog') }}" method="get">
                <fieldset>
                    <legend>Фильтрация по категориям</legend>
                    <label><input type="radio" name="category" value="all" checked> Все</label><br>
                    <label><input type="radio" name="category" value="laser"> Лазерные принтеры</label><br>
                    <label><input type="radio" name="category" value="inkjet"> Струйные принтеры</label><br>
                    <label><input type="radio" name="category" value="thermal"> Термопринтеры</label>
                </fieldset>

                <p>
                    <label for="sort">Упорядочить по:</label>
                    <select class="form-select form-select-sm" id="sort" name="sort">
                        <option value="date_desc">Новизне (сначала новые)</option>
                        <option value="year">Году производства</option>
                        <option value="name">Наименованию</option>
                        <option value="price">Цене</option>
                    </select>
                </p>
                <button class="bg-primary text-white border-0 rounded-2 px-3 py-2 w-100" type="submit">Применить</button>
            </form>
        </section>

        <br>

        <section class="d-flex flex-wrap gap-3" id="products-grid">
            @forelse ($products as $product)
                <a style="height: fit-content;" href="{{ route('product.show', $product['id']) }}">
                    <div class="card" style="max-width: 540px; height: 200px;">
                        <div class="row g-0 h-100">
                            <div class="col-md-4  h-100">
                                <img src="{{ asset($product['photo']) }}" class="img-fluid rounded-start  h-100"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $product['name'] }}</h3>
                                    <p class="card-text">Цена: <strong>{{ $product['price'] }} руб.</strong></p>
                                    <form action="#" method="post">
                                        @csrf
                                        <button class="bg-primary text-white border-0 rounded-2 px-3 py-2" type="submit">В
                                            корзину</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-center">По вашему запросу товаров не найдено.</p>
            @endforelse
        </section>


        <hr class="min-vw-full">

        <footer>
            <p>&copy; 2026 Copy Star. Все права защищены.</p>
        </footer>
    </div>
@endsection
