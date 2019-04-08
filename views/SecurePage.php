<?php

include_once "layout/Header.php";

if (isset($_SESSION['kavi']) == false ||
    $_SESSION['kavi'] == null ||
    $_SESSION['kavi'] == false)
{
    header("Location: ../views/login.php");
}