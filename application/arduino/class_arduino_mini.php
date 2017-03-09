<?php
require_once 'class_arduino.php';
require_once 'interface_sale.php';

class Arduino_Mini extends Arduino implements Sale
{
	public $name	= "Arduino Mini";
	public $proc	= "";
	public $ram		= "";
	public $id		= 2;
	
	// Вернуть процент скидки пользователю
	public function getSale($user_id)
	{
		$mysqli = parent::connect_db();
		
		$query = "SELECT * FROM `sales` WHERE user_id = $user_id and product_id = $this->id";
		$res = $mysqli->query($query);
		if ($res->num_rows != 0) {
			while($row = $res->fetch_assoc())
			{
				$sale = $row['sale'];
			}
			$mysqli->close();
			return $sale;
		}
		return 0;
	}
	
	// Считать скидку и записывать в бд процент
    public function calculateSale($user_id)
	{
		$mysqli = parent::connect_db();
		$sale = 0;
		
		$query = "SELECT * FROM `orders` WHERE user_id = $user_id and product_id = $this->id";
		$res = $mysqli->query($query);
		if ($res->num_rows != 0) {
			$sale = 2 * $res->num_rows;
			$sale = ($sale > 25)?(25):($sale);
			
			$res = $mysqli->query("INSERT INTO `sales` (`id`, `user_id`, `product_id`, `sale`)
												 VALUES (NULL, '$user_id', '$this->id', '$sale')");
												 
			$mysqli->close();
			return $sale;
		}
		return 0;
	}
}