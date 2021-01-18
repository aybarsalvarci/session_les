<?php 
    
    require_once 'baglan.php';
    require 'ayar.php';

    $yazilar = $db->prepare("SELECT * FROM yazilar");
    $yazilar->execute();

    if ($yazilar->rowCount()) {
        
        ?>
           
        <table border="1">
            <tr>
                <th>ID</th>
                <th>BAŞLIK</th>
                <th>İŞLEM</th>
            </tr>

        <?php
            
            foreach ($yazilar as $row) {
                ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['baslik']; ?></td>
                    <td><a href="detay.php?id=<?php echo $row['id'];?>">Devamını oku</td>
                </tr>

                 <?php
            }


            echo "</table>";

    }


 ?>