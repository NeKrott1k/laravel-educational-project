@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ваша корзина</h2>

        <table>
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Лазерный принтер X1</td>
                    <td>15 000 руб.</td>
                    <td>1 шт.</td>
                    <td>
                        <!-- Формы изменения количества без перезагрузки -->
                        <form action="#" method="post" style="display:inline;">
                            <button class="bg-primary text-white border-0 rounded-2 px-3 py-2" type="submit" name="action"
                                value="decrease">-</button>
                        </form>
                        <form action="#" method="post" style="display:inline;">
                            <button class="bg-primary text-white border-0 rounded-2 px-3 py-2" type="submit" name="action"
                                value="increase">+</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

        <p>Итого к оплате: <strong>15 000 руб.</strong></p>

        <!-- Оформление заказа с подтверждением пароля -->
        <section id="checkout">
            <div class="card">
                <div class="card-header w-100 d-flex align-items-center">{{ __('Оформление заказа') }}</div>

                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Введите ваш пароль для подтверждения:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('login') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" required autocomplete="password" autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn w-100 btn-primary">
                                    {{ __('Оформить заказ') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
