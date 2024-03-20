<?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $usersurname = $_POST['usersurname'];
        $usergrandname = $_POST['usergrandname'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">Этот адрес уже зарегистрирован!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO users(username,usersurname,usergrandname,role,password,email) VALUES (:username,:usersurname,:usergrandname,:role,:password_hash,:email)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("usersurname", $usersurname, PDO::PARAM_STR);
            $query->bindParam("usergrandname", $usergrandname, PDO::PARAM_STR);
            $query->bindParam("role", $role, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Регистрация прошла успешно!</p>';
            } else {
                echo '<p class="error">Неверные данные!</p>';
            }
        }
    }
?>
    <form class="form" method="post" action="" name="signup-form">
        <div class="form-element">
        <label>Имя Пользователя</label>
        <input type="text" name="username" pattern="[а-яА-Я0-9]+" required />
        </div>
        <div class="form-element">
        <label>Фамилия Пользователя</label>
        <input type="text" name="usersurname" pattern="[а-яА-Я0-9]+" required />
        </div>
        <div class="form-element">
        <label>Отчество Пользователя</label>
        <input type="text" name="usergrandname" pattern="[а-яА-Я0-9]+" required />
        </div>
        <div class="form-element">
        <label>Роль Пользователя</label>
        <input type="text" name="role" pattern="[a-zA-Z0-9]+" required />
        </div>
        <div class="form-element">
        <label>Email</label>
        <input type="email" name="email" required />
        </div>
        <div class="form-element">
        <label>Пароль</label>
        <input type="password" name="password" required />
        </div>
        <button type="submit" name="register" value="register">Зарегестрироваться</button>
    </form>