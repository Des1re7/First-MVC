<?php
class Model_Main extends Model
{
	public function get_data()
	{
		$mysqli = parent::connect_db();

		$res = $mysqli->query("SELECT * FROM `product`");
		if ($res->num_rows == 0) { $mysqli->close(); return array(); }
		else
		{
			$data = array();
			
			$i = 0;
			while($row = $res->fetch_assoc())
			{
				array_push($data, $row);
				$sale = 0;
				
				if (@isset($_SESSION['user_id']))
				{
					$user_id = $_SESSION['user_id'];
					switch ($data[$i]['id'])
					{
						case '1':
							$product = new Arduino_Uno();
							$sale = $product->getSale($user_id);
							break;
						case '2':
							$product = new Arduino_Mini();
							$sale = $product->getSale($user_id);
							break;
						
						default:
							break;
					}
				}
				$data[$i]['sale'] = $sale;
				$i++;
			}
			$mysqli->close();
			
			/*echo "<pre>";
			var_dump($data);
			echo "</pre>";*/
			
			return $data;
		}
		
		$mysqli->close();
		return -1;
	}
}