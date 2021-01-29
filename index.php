<?php 
    
    require_once 'baglan.php';
    require 'ayar.php';

    $yazilar = $db->prepare("SELECT * FROM yazilar ORDER BY goruntulenme DESC");
    $yazilar->execute();

    if ($yazilar->rowCount()) {
        
        ?>
           
        <table border="1">
            <tr>
                <th>ID</th>
                <th>BAŞLIK</th>
                <th width="4px">Tıklanma Sayısı</th>
                <th>İŞLEM</th>
            </tr>

        <?php
            
            foreach ($yazilar as $row) {
                ?>

                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['baslik'] ?></td>
                    <td><?= $row['goruntulenme'] ?></td>
                    <td><a href="#" class="view" id="<?= $row['id']?>">Devamını oku</a></td>
                </tr>

                 <?php
            }


            echo "</table>";

    }


 ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(function(){
        $('.view').click(function(event){
            // event.preventDefault();
            var id = $(this).attr("id");
            
            $.ajax({
                url : "./Controller.php",
                method : "POST",
                data : {
                    "id" : id,
                    "process" : "hit"
                },
                success: function(resp){
                    if(resp){
                        
                        window.location.href="./detay.php?id=" + id;
                    }
                }
            });

        });
    });
</script>