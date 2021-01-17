<?php

session_start();

if(isset($_GET['id'])){
    $_SESSION['id'] = $_GET['id'];
}

// şimdi  ayar.php de gelen get değerini kontrol ediyorum eğer id diye bir get değeri varsa bunu session a id olarak kaydediyorum.
// böylece 