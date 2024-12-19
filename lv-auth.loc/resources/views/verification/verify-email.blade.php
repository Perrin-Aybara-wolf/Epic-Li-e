<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    verify-email form
    <form method="post" action="{{route('verification.send')}}">
        @csrf
        <div>Не получили письмо?</div>
        <button>Отправить снова</button>
    </form>
</body>

</html>