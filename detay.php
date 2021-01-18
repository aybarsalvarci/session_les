<?php 

    require_once 'baglan.php';
    require 'ayar.php';

      if ($_GET['id']) {
        
        $id = $_GET['id'];
        
        $sorgu = $db->prepare("SELECT * FROM yazilar WHERE id=:id");
        $sorgu->execute([':id' => $id]);

        if ($sorgu->rowCount()) {
        
            $row = $sorgu->fetch(PDO::FETCH_ASSOC);
        
            
            
            if(!isset($_COOKIE[$row['id']])){
                $update = $db->prepare("UPDATE yazilar SET goruntulenme=:g WHERE id=:id");
                $update->execute(array(':g' => $row['goruntulenme'] + 1,':id'=>$id));
                setcookie($row['id'], "1", time() + 3600);
            }

            

            echo $row['baslik'];
            echo'<hr/>';
            echo $row['icerik']."<hr>";
            echo '<b>Görüntülenme</b> => '.$row['goruntulenme'];

        }else{

          header('location:hit.php');
        }

      }else{
          header('location:hit.php');
      }

?>


<br><br><br><br><br><br><br><br><br>

<?php


    if($_GET['id']){

        $id = $_GET['id'];

        $sorgu = $db->prepare("SELECT * FROM yazilar WHERE id != :id");
        $sorgu->execute([':id' => $id]);

        if($sorgu->rowCount()){

            $data = $sorgu->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $row): ?>

                <p><?= $row['baslik'] ?></p>
                <p><?= $row['icerik'] ?></p>
                <p><?= $row['goruntulenme'] ?></p>
                <hr>
             <?php    
            endforeach;


        }


    }



?>
