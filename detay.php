<?php


require_once 'ayar.php';
require_once 'baglan.php';

if(isset($_GET['id'])){

    //update işlemi

    $id = $_GET['id'];
    
    if(!isset($_COOKIE[$id])){
        $query = $db->prepare('SELECT goruntulenme FROM yazilar WHERE id = :id');
        $query->execute([':id' => $id]);
        $view = $query->fetch(PDO::FETCH_ASSOC);
        $view = $view['goruntulenme'];

        $query = $db->prepare('UPDATE yazilar SET goruntulenme = :view WHERE id = :id');
        $query->execute([':view' => $view+1, ':id' => $id]);
        setcookie($id, 1, time() + 120); 
    }



    $query = $db->query('SELECT * FROM yazilar ORDER BY id ASC')->fetchAll(PDO::FETCH_ASSOC);

    foreach($query as $row){
        echo $row['baslik'] . '<br/>';
        echo $row['icerik'] . '<br/>';
        echo $row['goruntulenme'];
        echo '<hr>';
    }
}
