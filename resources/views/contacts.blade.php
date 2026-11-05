<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copy Star — Где нас найти?</title>
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="index.html">О нас</a></li>
                <li><a href="catalog.html">Каталог</a></li>
                <li><strong>Где нас найти?</strong></li>
            </ul>
        </nav>
    </header>

    <hr>

    <main>
        <h2>Контактная информация</h2>
        
        <address>
            <p><strong>Адрес:</strong> г. Москва, ул. Копировальная, д. 17, офис 104</p>
            <p><strong>Номер телефона:</strong> +7 (495) 000-00-00</p>
            <p><strong>Email:</strong> <a href="mailto:info@copystar.ru">info@copystar.ru</a></p>
        </address>

        <h3>Мы на карте:</h3>
        <!-- По ТЗ необходима карта, используем семантичный тег iframe как плейсхолдер -->
        <div id="map">
            <iframe src="about:blank" width="600" height="450" title="Карта проезда"></iframe>
            <p><small>(Здесь будет интерактивная API-карта Яндекс/Google)</small></p>
        </div>
    </main>

</body>
</html>
