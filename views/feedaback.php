<?php
require_once 'controller/Query.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="views/assets/css/bootstrap.css">
    <title>feedback</title>
</head>
<body>
<header>
    <div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-5 mb-0 bg-white border-bottom shadow-lg">
        <h5 class="my-0 mr-md-auto font-weight-normal">Feedback</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <ul class="nav nav-pills">
                <li class="nav-item">

                    <?php if (isset($_SESSION['logged'])) : ?>

                    <h5 class="my-0 mr-md-auto font-weight-normal">Вы авторизованы как <?= $_SESSION['logged']; ?>
                        <a href="model/logaut.php"><button class="btn btn-outline-danger">Выйти</button></a>
                    </h5>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div class="container">
    <div class="row px-2 my-5">
        <div class="col-sm p-4 px-3 shadow-lg py-3 mx-2">
            <form action="model/delete.php" method="post">
            <h5 class="border-bottom border-gray pb-2 mb-0">Все отзывы
                <button type="submit" name="delete">Удалить</button>
            </h5>

            <?php
            foreach ($query->selectReview() as $feedback) { ?>
                <div class="media text-muted pt-3">
                    <input type="checkbox" id="<?= $feedback['id']; ?>" value="<?= $feedback['id']; ?>" name="check[]">
                    <svg  width="32" height="32">
                        <img class="bd-placeholder-img mr-2 rounded" src="<?= $feedback['foto']; ?>" alt="" width="100" height="100" ></svg>
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark"><?= $feedback['name']; ?></strong>
                        <?= $feedback['text']; ?>
                        <i class="d-block text-gray-dark"><?= $feedback['date']; ?></i>
                    </p>
                </div>
            <?php } ?>
            </form>

        </div>
    </div>
</div>

                    <?php else : ?>

                    <a class="btn btn-outline-warning" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Авторизация</a>
                    <div class="dropdown-menu">
                        <nav class="navbar">
                            <form action="model/auth.php" method="post">
                                <input type="text" class="form-control my-1" placeholder="admin" name="loginuser">
                                <input type="password" class="form-control my-1 " placeholder="123" name="passuser">
                                <button type="submit" class="btn btn-primary">Войти</button>
                            </form>
                        </nav>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>






<div class="container">
    <div class="row px-2">
        <div class="col-sm p-4 px-3 shadow-lg py-3 mx-2 my-5">
            <h5 class="border-bottom border-gray pb-2 mb-0">Все отзывы</h5>

            <?php
            foreach ($query->selectReview() as $feedback) { ?>
            <div class="media text-muted pt-3">
                <svg  width="32" height="32">
                    <img class="bd-placeholder-img mr-2 rounded" src="<?= $feedback['foto'] ;?>" alt="" width="100" height="100" ></svg>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark"><?= $feedback['name']; ?></strong>
                    <?= $feedback['text']; ?>
                    <i class="d-block text-gray-dark"><?= $feedback['date']; ?></i>
                </p>
            </div>

            <?php } ?>

        </div>
    </div>
</div>

<?php endif; ?>

<main role="main" class="container my-4">
    <div class="my-4 bg-white rounded shadow-lg">
        <div class="accordion shadow-lg" id="accordionExample">
            <div class="card">
                <div class="card-header" id="heading1">
                    <h5 class="mb-0 text-center">
                        <button class="btn btn-link collapsed text-decoration-none text-dark text-center" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            <h3 class="mb-0 font-weight-light">Форма обратной связи</h3>
                        </button>
                    </h5>
                </div>

                <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php
                            require_once 'model/forms.php';
                            ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Имя</label>
                                    <input type="text" class="form-control" placeholder="Введите имя" name="username" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Ваше фото</label>
                                    <input type="file" class="form-control-file" name="userfile" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Email</label>
                                    <input type="text" class="form-control" placeholder="example@email.com" name="email" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Сообщение</label>
                                <textarea class="form-control" placeholder="Введите сообщение" rows="2" name="text" ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="send">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>



</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="views/assets/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
</html>
</html>