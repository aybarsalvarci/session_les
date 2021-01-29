<?php


require_once 'ayar.php';
require_once 'baglan.php';

if(isset($_GET['id'])){


    $query = $db->query('SELECT * FROM yazilar ORDER BY id ASC')->fetchAll(PDO::FETCH_ASSOC);

    foreach($query as $row){
        echo $row['baslik'] . '<br/>';
        echo $row['icerik'] . '<br/>';
        echo $row['goruntulenme'];
        echo '<hr>';
    }
}
