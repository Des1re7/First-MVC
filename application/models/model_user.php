<?php
class Model_User extends Model
{
	public function get_data()
	{
		/*$mysqli = parent::connect_db();
		
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
		return -1;*/
	}
	
	
	public function registration($email, $phone, $pass)
	{
		$mysqli = parent::connect_db();
		
		$res = $mysqli->query("INSERT INTO `users` (`id`, `email`, `phone`, `password`)
											VALUES	(NULL, '$email', '$phone', '$pass')");
		$mysqli->close();
		return "Success registration";
	}
	
	public function login($email, $pass)
	{
		$mysqli = parent::connect_db();
		
		$res = $mysqli->query("SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'");
		if ($res->num_rows != 0)
		{
			$row = $res->fetch_assoc();
			$_SESSION['user_id'] = $row['id'];
		}
		else
		{
			$msg = "Wrong email or password";
		}
		$mysqli->close();
		return @$msg;
	}
	
	public function logout()
	{
		unset($_SESSION['user_id']);
	}
}