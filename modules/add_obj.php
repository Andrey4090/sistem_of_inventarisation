<?php 
if (isset($_POST['name']) && isset($_POST['text'])){
    // Переменные с формы
    $name = $_POST['name'];
    $place = $_POST['place'];
    $text = $_POST['text'];
    
    // Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "root"; // Логин БД
    $db_password = ""; // Пароль БД
    $db_base = 'obj'; // Имя БД
    $db_table = "objects"; // Имя Таблицы БД
    
    try {
        // Подключение к базе данных
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        // Собираем данные для запроса
        $data = array( 'name' => $name, 'place' => $place , 'text' => $text); 
        // Подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO $db_table (name,place, text) values (:name, :place, :text)");
        // Выполняем запрос с данными
        $query->execute($data);
        // Запишим в переменую, что запрос отрабтал
        $result = true;
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    
    if ($result) {
        echo '<p class="success">Успех. Информация занесена в базу данных</p>';
    }
}
?>
<form method="POST" action="">
  <input name="name" type="text" placeholder="Название" required/>
  <input name="place" type="text" placeholder="Кабинет(число)" pattern="[а-яА-Я0-9]+"required/>
  <input name="text" type="text" placeholder="Описание" required/>
  <input type="submit" value="Загрузить"/>
 </form>