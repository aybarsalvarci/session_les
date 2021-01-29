<?php
require_once "./baglan.php";
$post = $_POST;

if(isset($post["process"]) && $post["process"] == "hit"){

    if(!isset($_COOKIE["increment"])){
        if(!isset($_COOKIE[$post["id"]])){
            $query = $db->prepare('SELECT goruntulenme FROM yazilar WHERE id = :id');
            $query->execute([':id' => $post["id"]]);
            $view = $query->fetch(PDO::FETCH_ASSOC);
            $view = $view['goruntulenme'];

            $query = $db->prepare('UPDATE yazilar SET goruntulenme = :view WHERE id = :id');
            $query->execute([':view' => $view+1, ':id' => $post["id"]]);
            setcookie($post["id"], 1, time() + 120); 
        }
        setcookie("increment", 1, time() + 120);
    }

    echo "true";

}