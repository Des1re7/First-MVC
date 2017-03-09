<?php
require_once 'class_arduino.php';
require_once 'interface_sale.php';

class Arduino_Uno extends Arduino implements Sale
{
	public $name	= "Arduino Uno";
	public $proc	= "";
	public $ram		= "";
	
	// Вернуть процент скидки пользователю
	public function getSale($user_id)
	{
		$mysqli = parent::connect_db();
		
		$res = $mysqli->query("SELECT * FROM `sales` WHERE user_id = $user_id and product_id = 1");
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
		
		$res = $mysqli->query("SELECT * FROM `orders` WHERE user_id = $user_id and product_id = 1");
		if ($res->num_rows != 0) {
			$sale = 1 * $res->num_rows;
			$sale = ($sale > 25)?(25):($sale);
			
			$res = $mysqli->query("INSERT INTO `sales` (`id`, `user_id`, `product_id`, `sale`)
												 VALUES (NULL, '$user_id', '1', '$sale')");
												 
			$mysqli->close();
			return $sale;
		}
		return 0;
	}
}