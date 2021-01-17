<?php

require './ayar.php';

if(isset($_GET['id'])){
    $get = $_GET['id'];
    $_SESSION['id'] = $get;
}

?>


<a href="?id=1">Id gönder</a>
<a href="./blog.php">Blog.php</a>