<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <h3>Заполните форму:</h3>
    <form action="" method="POST">
        <label for="name">Имя:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br><br>

        <label for="phone">Номер телефона:</label><br>
        <input type="text" id="phone" name="phone"><br><br>

        <input type="submit" value="Отправить">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        function validateForm($name, $email, $phone)
        {
            if (empty($name)) {
                return "'Имя' не должно быть пустым";
            } elseif (strlen($name) < 6) {
                return "Длина имени должна быть от 6";
            }

            if (empty($email)) {
                return "'Email' не должно быть пустым";
            } elseif (strlen($email) < 5 || strlen($email) > 100) {
                return "Длина email должна быть от 5 до 100 символов";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return "Неправильный формат email";
            }

            if (empty($phone)) {
                return "'Номер телефона' не должно быть пустым";
            } elseif (strlen($phone) != 11) {
                return "Номер телефона должен состоять из 11 цифр";
            }

            return "Форма успешно прошла валидацию";
        }

        $result = validateForm($name, $email, $phone);
        echo "<p><strong>$result</strong></p>";
    }
    ?>

</body>

</html>