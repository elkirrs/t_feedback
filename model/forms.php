<?php

$data = $_POST;

if ($data)
{

    $name = htmlspecialchars(trim($data['username']));
    $email = htmlspecialchars($data['email']);
    $text = htmlspecialchars($data['text']);

    $errors = [];

    if (mb_strlen($name, 'UTF-8') >= 50)
    {
        $errors[] = 'Имя не может привышать 50 символов';

    }

    if (mb_strlen($text, 'UTF-8') >= 200)
    {
        $errors[] = 'Сообщение не может быть юольше 200 символов';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors[]= 'Введен не верный формат email';
    }


    if ($errors)
    {
        echo "<div><p class='alert alert-danger'>" .
            array_shift($errors) . "
    </p>
</div>";
    }
    else
    {
        require_once 'upload.php';
        require_once 'controller/Query.php';
        require_once 'controller/Database.php';
        $query->insert("$name", "$email", "$text", "$uploadfile");

        header('location:  /t_feedback');

    }
}

