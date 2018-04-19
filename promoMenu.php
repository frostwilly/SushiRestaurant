<div class="promo">
    <h1>Promo</h1>
    <?php
    while($data = $promoIterator->getNextMenu()) {
        ?>
        <div onclick="foodClick(<?php echo $data->getId(); ?>)" class="menubox shadowbox">
            <img class="foodpicture" src="images/Pika.png">
            <div class="foodname"><a>Makanan <?php echo $data->getName(); ?></a></div>
            <span class="fooddetail"><p>Price : <?php echo $data->getPrice(); ?></p></span>
        </div>
        <?php
    }
    ?>
</div>