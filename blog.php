<?php

require './ayar.php';

if(isset($_SESSION['id'])){

    echo $_SESSION['id'];
}