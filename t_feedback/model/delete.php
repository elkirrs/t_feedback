<?php
require_once '../controller/Query.php';

var_dump($_POST['check']);

if ($_POST['check'])
{
    $commentId = join(', ', $_POST['check']);
    $query->deletePost($commentId);
    header('Location: /t_feedback');
}