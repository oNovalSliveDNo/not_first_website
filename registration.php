<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Регистрация</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <h1>Регистрация</h1>
            <form method="POST" action="/registration.php">
                <div class="mb-3">
                    <label for="email" class="form-label">Почта</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="login" name="login" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Зарегистрироваться</button>
            </form>
        </div>
    </body>
    <?php
    if (isset($_POST['submit'])) {
        require_once('db.php'); // Подключаем файл для работы с БД

        // Подключаемся к базе данных
        $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

        // Проверка соединения
        if (!$link) {
            die("Connection error: " . mysqli_connect_error());
        }

        // Получение данных из формы
        $email = $_POST['email'];
        $username = $_POST['login'];
        $password = $_POST['password'];

        // Проверка на пустые значения
        if (!$email || !$username || !$password) {
            die('Please enter all values!');
        }

        // Запрос на добавление данных в таблицу
        $sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username', '$password')";

        // Выполнение запроса и проверка на ошибки
        if (!mysqli_query($link, $sql)) {
            echo "Failed to add a user: " . mysqli_error($link);
        } else {
            echo "The user has been successfully registered!";
        }

        // Закрытие соединения
        mysqli_close($link);
    }
    ?>
</html>
