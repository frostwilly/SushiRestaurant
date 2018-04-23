<div class="promo">
    <h1>Promo</h1>
    <?php
    while($data = $promoIterator->getNextMenu()) {
        ?>
        <div class="menubox shadowbox">
            <img class="foodpicture" src="images/Sushi/Promo/<?= str_replace(' ','',$data->getName()); ?>.jpg">
            <div class="foodname"><a><?php echo $data->getName(); ?></a></div>
            <span class="fooddetail"><p>Price : <?php echo $data->getPrice(); ?></p></span>
			<input class="foodid" type="hidden" value="<?php echo $data->getId(); ?>">
        </div>
        <?php
    }
    ?>
</div>