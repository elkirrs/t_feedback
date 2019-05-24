<?php


$uploaddir = 'uploads/';
$uploadfile =  $uploaddir . basename($_FILES['userfile']['name']);
if (is_uploaded_file($_FILES['userfile']['tmp_name']))
{
    move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);

}

