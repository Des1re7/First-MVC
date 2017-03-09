<div id="main" class="table">
   <div class="tr">
	   <div class="td">Buy</div>
	   <div class="td">Name</div>
	   <div class="td">Description</div>
	   <div class="td">Price</div>
	   <div class="td">Photo</div>
   </div>
   <?php
	foreach($data as $row)
	{
	?>
		<div class="tr">
		   <div class="td"><input name="isBuy" id="<?php echo $row['id']; ?>" type="checkbox" /></div>
		   <div class="td"><?php echo $row['name']; ?></div>
		   <div class="td"><?php echo $row['description']; ?></div>
		   <div class="td"><?php echo $row['price'] - ($row['price'] * ($row['sale'] / 100)); ?> $</div>
		   <div class="td"><img src="img/<?php echo $row['photo']; ?>" width="250" height="250" /></div>
	   </div>
	<?php
	}
	?>
</div>

<div class="user-info"></div>

<script src="js/main.js"></script>