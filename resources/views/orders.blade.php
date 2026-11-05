@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Список ваших заказов</h2>

        <section class="order-list">

            <article class="order-item">
                <h3>Заказ № 1024 от 17.09.2026</h3>
                <p>Статус: <strong>Новый</strong></p>
                <ul>
                    <li>Лазерный принтер X1 — 1 шт.</li>
                </ul>
                <form action="#" method="post">
                    <button class="bg-danger text-white border-0 rounded-2 px-3 py-2" type="submit" name="delete_order" value="1024">Отменить заказ</button>
                </form>
            </article>

            <hr>

            <article class="order-item">
                <h3>Заказ № 985 от 10.09.2026</h3>
                <p>Статус: <em>Подтвержден</em></p>
                <ul>
                    <li>Струйный принтер Y2 — 2 шт.</li>
                </ul>
            </article>

        </section>
    </div>
@endsection
