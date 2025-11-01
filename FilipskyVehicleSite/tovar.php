<?php
// tovar.php

// Включение отображения ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// --- 1. Подключение к базе данных ---
$host='localhost';
$user='root';
$pass='';
$dbname='AlikovG';

$conn = mysqli_connect($host, $user, $pass, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- 2. Получение и проверка ID товара ---
// Получаем ID товара из POST, приводим к целому числу.
$id = (int)($_POST['id'] ?? $_GET['id'] ?? 0); 

if ($id <= 0) {
    die("Неверный или отсутствующий ID товара.");
}

// --- 3. Запрос данных товара ---
$stmt_tovar = $conn->prepare("SELECT * FROM `tovar` WHERE `id` = ?");
$stmt_tovar->bind_param("i", $id);
$stmt_tovar->execute();
$result1 = $stmt_tovar->get_result();

// Извлекаем данные товара ОДИН раз
$row1 = $result1->fetch_array();
$stmt_tovar->close();

// Проверяем, найден ли товар
if (!$row1) {
    die("Товар с ID $id не найден.");
}

// --- 4. Запрос комментариев для этого товара (данные будут использованы ниже) ---
$stmt_comment = $conn->prepare("SELECT `login`, `comment`, `user_id`, `created_at` FROM `comment` WHERE `tovar_id` = ? ORDER BY `created_at` DESC");
$stmt_comment->bind_param("i", $id);
$stmt_comment->execute();
$result_comments = $stmt_comment->get_result();

// Переменная $id теперь содержит корректный ID для использования в форме
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>tovarish</title>
</head>
<body>
    <header>
        <div class="header_button_container">
            <a href='index.php'><button class="header_button">Главная</button></a>
            <a href='reg.php'><button class="header_button">Регистрация</button></a>
            <a href='auto.php'><button class="header_button">Авторизация</button></a>
            <a href='profile.php'><button class="header_button">Профиль</button></a>
        </div>
    </header>
    <main>
        <div class="main_panel_tovar">
            
            <center>
                <div class="main_product">
                    <!-- Используем $row1[индекс] для отображения данных товара -->
                    <img src="img/<?php echo htmlspecialchars($row1[6]); ?>" alt="tovar" width="50%" height="50%">
                    <p class='fix_dla_p'><?php echo htmlspecialchars($row1[1]); ?></p>
                    <p class='fix_dla_p'><?php echo htmlspecialchars($row1[2]); ?></p>
                    <p class='fix_dla_p'><?php echo htmlspecialchars($row1[3]); ?></p>
                    <p class='fix_dla_p'>$<?php echo htmlspecialchars($row1[5]); ?></p>
                    <p class='fix_dla_p'><?php echo htmlspecialchars($row1[0]); ?></p>
                </div>
            </center>
            
            <div class="comment_section">
                <div class="comment_view_scrollbar">
                    <?php
                    // Цикл для отображения комментариев (использует $result_comments из верхнего PHP-блока)
                    while($row_comment = $result_comments->fetch_assoc())
                    {
                    ?>
                    <div class="comment_block">
                        <p><hr class="vertical_line"><h3><?php echo htmlspecialchars($row_comment['login']); ?></h3></p>
                        <p><?php echo htmlspecialchars($row_comment['comment']); ?></p>
                        <small>Дата: <?php echo htmlspecialchars($row_comment['created_at']); ?></small>
                    </div>
                    <?php
                    }
                    $stmt_comment->close();
                    ?>
                </div>

                <div class="comment_redaction_section">
                    <h3>Оставить комментарий</h3>
                    <form action="add_comment.php" method="post">
                        <label for="comment">Комментарий:</label>
                        <textarea id="comment" name="comment" rows="4" required></textarea>
                        
                        <!-- Используем $id, который мы получили и проверили в верхнем PHP-блоке -->
                        <input type="hidden" name="login" value="current_user_login"> 
                        <input type="hidden" name="user_id" value="123"> 
                        <input type="hidden" name="tovar_id" value="<?php echo htmlspecialchars($id); ?>">
                        
                        <br>
                        <button type="submit">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        
    </footer>
</body>
</html>
