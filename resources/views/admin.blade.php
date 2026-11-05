@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Панель администратора</h1>
            <div class="d-flex align-items-center gap-2">
                <span>Добавить</span>
                <button type="button" data-bs-toggle="modal" data-bs-target="#createProductModal"
                    class="btn btn-primary">Товар</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                    Категорию
                </button>
            </div>
        </div>

        <p>Вы вошли как: <strong>{{ Auth::user()->login }}</strong></p>
        <section id="admin-orders">
            <h2>Просмотр списка всех заказов</h2>

            <p>Фильтровать по статусу:
                <a href="?status=all">Все</a> |
                <a href="?status=new">Новые</a> |
                <a href="?status=confirmed">Подтвержденные</a> |
                <a href="?status=cancelled">Отмененные</a>
            </p>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Таймстамп</th>
                        <th scope="col">ФИО заказчика</th>
                        <th scope="col">Кол-во товаров</th>
                        <th scope="col">Текущий статус</th>
                        <th scope="col">Управление</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>17.09.2026 12:00</td>
                        <td>Иванов Иван Иванович</td>
                        <td>1 шт.</td>
                        <td>Новый</td>
                        <td>
                            <!-- Подтверждение -->
                            <form action="#" method="post" style="display:inline;">
                                <button class="bg-primary text-white border-0 rounded-2 px-3 py-2" type="submit"
                                    name="status" value="confirm">Подтвердить</button>
                            </form>
                            <!-- Отмена с указанием причины -->
                            <form action="#" method="post" style="display:flex; flex-direction: column; gap: 3px;">
                                <input class="form-control" type="text" name="reason" placeholder="Причина отказа"
                                    required>
                                <button class="bg-primary text-white border-0 rounded-2 px-3 py-2" type="submit"
                                    name="status" value="cancel">Отменить</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="admin-products">
            <h3>Все товары:</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Изображение</th>
                        <th scope="col">Название</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Страна производства</th>
                        <th scope="col">Дата выпуска</th>
                        <th scope="col">Модель</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Кол-во на складе</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td scope="row"><img class="w-50 h-50" src="{{ asset($product->photo) }}" alt="">
                            </td>
                            <td scope="row">{{ $product->name }}</td>
                            <td scope="row">{{ $product->category }}</td>
                            <td scope="row">{{ $product->description }}</td>
                            <td scope="row">{{ $product->origin_country }}</td>
                            <td scope="row">{{ $product->release_year }}</td>
                            <td scope="row">{{ $product->model }}</td>
                            <td scope="row">{{ $product->price }}</td>
                            <td scope="row">{{ $product->quantity_in_stock }}</td>
                            <td scope="row" class="d-flex flex-column gap-2 h-100">
                                <form method="POST" style="display:none;" id='deleteProductForm-{{ $product->id }}'
                                    action="{{ route('deleteProduct', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button"
                                    onclick="if(confirm('Удалить?')) document.getElementById('deleteProductForm-{{ $product->id }}').submit();"
                                    class="bg-danger text-white border-0 rounded-2 px-3 py-2">Удалить</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editProductModal_{{ $product->id }}">
                                    Редактировать
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section id="admin-categories">
            <h3>Все категории:</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Название</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td scope="row">{{ $category->name }}</td>
                            <td scope="row">
                                <form method="POST" style="display:none;" id='deleteCategoryForm-{{ $category->id }}'
                                    action="{{ route('deleteCategory', $category->id) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button"
                                    onclick="if(confirm('Удалить?')) document.getElementById('deleteCategoryForm-{{ $category->id }}').submit();"
                                    class="bg-danger text-white border-0 rounded-2 px-3 py-2">
                                    Удалить
                                </button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal_{{ $category->id }}">
                                    Редактировать
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

    </div>
    @include('admin.modals.category-form', ['category' => null])

    @foreach ($categories as $category)
        @include('admin.modals.category-form', [
            'category' => $category,
        ])
    @endforeach

    @include('admin.modals.product-form', ['product' => null, 'categories' => $categories])

    @foreach ($products as $product)
        @include('admin.modals.product-form', [
            'product' => $product,
            'categories' => $categories,
        ])
    @endforeach
@endsection
