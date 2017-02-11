<?php
class Model
{
	public function get_data()
	{
	}
	
	public function connect_db()
	{
		require '/../cfg/db_cfg.php';
		
		$mysqli = new mysqli($db_host, $db_login, $db_pass, $db_name);
		if ($mysqli->connect_errno)
		{
			$msg = "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
			exit($msg);
		}
		$mysqli->query("SET lc_time_names = 'ru_RU'");
		$mysqli->query("SET NAMES 'utf8'");
		
		return $mysqli;
	}
}