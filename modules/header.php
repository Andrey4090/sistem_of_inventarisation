<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>Форум</title>
</head>

<body>
  <nav>
    <ul>
      <li><a href="./index.php">Главная</a></li>
      <?php session_start();
      if (!$_SESSION['user_id']) {
        echo '<li><a href="./login_page.php">Вход</a></li>';
      }
      ?>
      <?php 
      if ($_SESSION['user_id']) {
        echo '<li><a href="./add_page.php">Добавить обект</a></li>';
        echo '<li><a href="./show_page.php">Обект инвентаризации</a></li>';
        echo '<li><a href="./upload_file_page.php">Файлы</a></li>';
        echo '<li><a href="./modules/logout.php">Выйти</a></li>';
      }
      ?>
    </ul>
    <?php session_start();
    echo "<p class='us_n'>Сотрудник: ", $_SESSION['user_surname'], " ", $_SESSION['user_name'], " ", $_SESSION['user_grandname'], "</p>", "<p class='us_n'>Роль: ", $_SESSION['user_role'], "</p>"; ?>
  </nav>
  <div class="main">