<?php
    session_start();
    include('config.php');
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Неверные пароль или имя пользователя!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_role'] = $result['role'];
                $_SESSION['user_name'] = $result['username'];
                $_SESSION['user_surname'] = $result['usersurname'];
                $_SESSION['user_grandname'] = $result['usergrandname'];
                echo '<p class="success">Поздравляем, вы прошли авторизацию!</p>';
                header("location:/index.php");
            } else {
                echo '<p class="error"> Неверные пароль или имя пользователя!</p>';
            }
        }
    }
?>
<form  class="form_db" method="post" action="" name="signin-form">
  <div class="form-element">
    <label>Почта Пользователя</label>
    <input type="email" name="email" required />
  </div>
  <div class="form-element">
    <label>Пароль</label>
    <input type="password" name="password" required />
  </div>
  <button type="submit" name="login" value="login">Войти</button>
</form>