<?php

session_start();

if(isset($_GET['id'])){
    $get = $_GET['id'];
    $_SESSION['id'] = $get;
}