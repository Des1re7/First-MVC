<?php
class Model_Order extends Model
{
	public function insert_data($items)
	{
		$mysqli = parent::connect_db();
	
		$items_arr = explode(',', $items);
		$user_id = $_SESSION['user_id'];
		
		foreach($items_arr as $item)
		{
			$res = $mysqli->query("INSERT INTO `orders` (`id`, `product_id`, `user_id`)
												 VALUES (NULL, '$item', '$user_id');");
			if(!$res)
			{
				$mysqli->close();
				return $res;
			}
			switch ($item)
			{
				case '1':
					$product = new Arduino_Uno();
					$product->calculateSale($user_id);
					break;
				case '2':
					$product = new Arduino_Mini();
					$product->calculateSale($user_id);
					break;
				
				default:
					break;
			}
		}
		$mysqli->close();
		return 0;
	}
}