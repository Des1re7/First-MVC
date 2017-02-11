<?php
class Model_Order extends Model
{
	public function insert_data($items, $email, $phone)
	{
		$mysqli = parent::connect_db();
	
		$items_arr = explode(',', $items);
		foreach($items_arr as $item)
		{
			$res = $mysqli->query("INSERT INTO `orders` (`id`, `product_id`, `phone`, `email`)
												 VALUES (NULL, '$item', '$phone', '$email');");
			if(!$res)
			{
				$mysqli->close();
				return $res;
			}
		}
		$mysqli->close();
		return 0;
	}
}