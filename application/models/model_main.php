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
			while($row = $res->fetch_assoc())
			{
				array_push($data, $row);
			}
			$mysqli->close();
			return $data;
		}
		
		$mysqli->close();
		return -1;
	}
}