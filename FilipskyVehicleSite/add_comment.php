<?php
// add_comment.php

// Включение отображения ошибок (только для разработки)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Подключение к базе данных
$conn = new mysqli("localhost", "root", "", "AlikovG");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка наличия всех необходимых POST-данных
if (!isset($_POST['login'], $_POST['tovar_id'], $_POST['user_id'], $_POST['comment'])) {
    die("Не все данные формы были отправлены.");
}

// Получение и очистка данных из формы
$login = htmlspecialchars($_POST['login']);
$tovar_id = (int)$_POST['tovar_id']; // Приводим к целому числу
$user_id = (int)$_POST['user_id'];   // Приводим к целому числу
$comment_text = htmlspecialchars($_POST['comment']);
$created_at = date("Y-m-d H:i:s"); // Добавим также время для точности

// SQL-запрос с использованием плейсхолдеров (?)
$sql = "INSERT INTO comment (`user_id`, `tovar_id`, `comment`, `login`, `created_at`) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Ошибка подготовки запроса: " . $conn->error);
}

// Привязка параметров: i=integer, s=string (всего 5 параметров)
// user_id (i), tovar_id (i), comment (s), login (s), created_at (s)
$stmt->bind_param("iisss", $user_id, $tovar_id, $comment_text, $login, $created_at);

if ($stmt->execute()) {
    // Успех. Можно добавить сообщение или просто перенаправить.
    // echo "Комментарий успешно добавлен!"; 
} else {
    echo "Ошибка выполнения запроса: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Перенаправление обратно на страницу товара, откуда пришел пользователь
header("Location: " . $_SERVER["HTTP_REFERER"]);
exit();
?>