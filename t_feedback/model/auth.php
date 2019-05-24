<?php
require_once '../controller/Query.php';
require_once '../controller/Database.php';


$data = $_POST;


foreach ($query->auht() as $login)
{
    if($login['login'] === $data['loginuser'])
    {
        if ($login['pass'] === $data['passuser'])
        {
            $_SESSION['logged'] = $login['login'];
            header('Location: /t_feedback');
        }
    }
}