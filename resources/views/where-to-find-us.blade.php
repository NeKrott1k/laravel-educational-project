@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Где нас найти?</h1>
        <div class="">
            <div style="position:relative;overflow:hidden;">
                <a href="https://yandex.ru/maps/geo/izhevsk/ulitsa_pushkinskaya_268zh/?ll=53.204783%2C56.852613&z=16"
                    target="_blank" style="color:#eee;font-size:12px;position:absolute;top:0px;">
                    Ижевск, ул. Пушкинская 268Ж
                </a>
                <iframe
                    src="https://yandex.ru/map-widget/v1/?ll=53.204783%2C56.852613&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgg1NjcxOTM3NBJO0KDQvtGB0YHQuNGPLCDQnNC-0YHQutC-0LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwg0YPQuy4g0KHQtdGC0LXRg9GFLCAyNjjEiCwKDXZpSUI%2C&z=16"
                    width="100%" height="400" frameborder="0" allowfullscreen="true" style="position:relative;">
                </iframe>
            </div>

            <ul>
                <li>Адрес: <strong>с. Гослингово, ул. Драйв, д. 67</strong></li>
                <li>Номер телефона: <strong>+7 950 676 67 67</strong></li>
                <li>Email: <strong>support@copystar.com</strong></li>
            </ul>
        </div>
    </div>
@endsection
