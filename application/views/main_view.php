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
		   <div class="td"><?php echo $row['price']; ?> $</div>
		   <div class="td"><img src="img/<?php echo $row['photo']; ?>" width="250" height="250" /></div>
	   </div>
	<?php
	}
	?>
</div>

<div>E-mail</div>
<div><input name="email" type="text" /></div>
<div>Phone</div>
<div><input name="phone" type="text" /></div>
<div><input id="send_order" name="submit" type="submit" /></div>

<!-- <div class="main">
	<div class="head">
		<div class="check">Buy</div>
		<div class="name">Name</div>
		<div class="description">Description</div>
		<div class="price">Price</div>
		<div class="photo">Photo</div>
	</div>

	<?php
	foreach($data as $row)
	{
	?>
		<div class="data">
			<div class="check">
				<input type="checkbox" />
			</div>
			<div class="name">			<?php echo $row['name']; ?></div>
			<div class="description">	<?php echo $row['description']; ?></div>
			<div class="price">			<?php echo $row['price']; ?></div>
			<div class="photo">			<img src="img/<?php echo $row['photo']; ?>"  /></div>
		</div>
	<?php
	}
	?>
</div>-->