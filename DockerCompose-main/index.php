<?php
require 'php/DataBaseClass.php';
$database = new DataBaseClass();
$userList = $database->selectTable();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная страница</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="php/post.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Окно добавления пользователя</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Мне лень делать проверку!</strong> Багаюзить можно
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Электронная почта</label>
                        <input name="email" type="email" class="form-control" id="exampleFormControlInput1"
                               placeholder="name@example.com" required value="@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Пароль</label>
                        <input name="password" type="password" class="form-control" id="exampleFormControlInput2"
                               placeholder="***" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <h1 class="text-center">Пользователя системы</h1>
    <div class="d-flex align-items-center flex-column">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Логин</th>
                <th scope="col">Пароль</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($userList as $user) {
                ?>
                <tr>
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo $user->login; ?></td>
                    <td><?php echo $user->password; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Добавить пользователя
        </button>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>