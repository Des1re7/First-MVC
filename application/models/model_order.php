<?php
class Model_Order extends Model
{
	public function insert_data($items, $email, $phone)
	{	
		$sql_host = "localhost";
		$sql_login = "root";
		$sql_pass = "";
		$sql_bd = "mvc";

		$mysqli = new mysqli($sql_host, $sql_login, $sql_pass, $sql_bd);
		if ($mysqli->connect_errno)
		{
			$msg = "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
			exit;
		}
		$mysqli->query("SET lc_time_names = 'ru_RU'");
		$mysqli->query("SET NAMES 'utf8'");
	
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