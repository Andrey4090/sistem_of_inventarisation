<?php
/* Запрос в БД */
$dbh = new PDO('mysql:dbname=obj;host=localhost', 'root', '');
$sth = $dbh->prepare("SELECT * FROM `objects` ORDER BY `place`");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);


$host = 'localhost';  // Хост, у нас все локально
$user = 'root';    // Имя созданного вами пользователя
$pass = ''; // Установленный вами пароль пользователю
$db_name = 'obj';   // Имя базы данных
?>
<table>
	<thead>
		<tr>
			<th>Кабинет</th>
			<th>Название</th>
			<th>Описание</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($list as $row): ?>
		<tr>
			<td><?php echo $row['place']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['text']; ?></td>
		</tr>
		<?php endforeach; ?>    
	</tbody>
</table>