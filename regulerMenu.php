<div class="reguler">
    <h1>Reguler</h1>
	<?php
    while($data = $regulerIterator->getNextMenu()) {
        ?>
		<div class="menubox shadowbox">
			<img class="foodpicture" src="images/Pika.png">
			<div class="foodname"><a><?php echo $data->getName(); ?></a></div>
			<span class="fooddetail"><p>Price : <?php echo $data->getPrice(); ?></p></span>
			<input class="foodid" type="hidden" value="<?php echo $data->getId(); ?>">
		</div>
        <?php
    }
    ?>
</div>