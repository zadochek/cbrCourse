<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Cbr</title>
</head>
<body>
    <form action="/convertr" method="POST">
        @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>Нужная валюта</p>
                <select name="currency">
                    <option value="EUR">EUR</option>
                    <option value="USD">USD</option>
                </select>
                <input type="text" disabled value="1">
            </div>
            <div class="col-md-6">
                <p>Имеющаяся валюта: RUB</p>
                <input type="text" value="{{ $currency->value ?? "" }} &#8381;">
            </div>
            <div class="col-md-12 mt-5">
                <button type="submit">Конвертировать</button>
            </div>
        </div>
    </div>
</form>
</body>
</html>
