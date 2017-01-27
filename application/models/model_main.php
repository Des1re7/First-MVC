<?php
class Model_Main extends Model
{
	public function get_data()
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