<div class="promo">
    <h1>Promo</h1>
    <?php
    for ($i = 0 ; $i < 10 ; $i++) {
        ?>
        <div onclick="foodClick(<?php echo $i ?>)" class="menubox shadowbox">
            <img class="foodpicture" src="images/Pika.png">
            <div class="foodname"><a>Makanan <?php echo $i ?></a></div>
            <span class="fooddetail"><p>Pika pika Pika-pika pi. Pika-pika chu. Pika pika Pika-pika pi. Pika-pika chu. Pika pika Pika-pika pi. Pika-pika chu.</p></span>
        </div>
        <?php
    }
    ?>
</div>