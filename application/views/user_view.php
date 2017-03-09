<?php
if (isset($data))
{
	echo $data;
}
else
{
	if (isset($_SESSION['user_id']))
	{
		echo "You arleady logged! ID: " . $_SESSION['user_id'];
		echo "	<form>
					<input type='button' id='logout'     value='Logout'></input> 
					<input type='button' id='send_order' value='Send order'></input><br />	
				</form>
				<script src='js/user.js'></script>";
	}
	else
	{
?>

<form name="registration">
	E-mail:<br />
	<input type="e-mail"	name="email"></input><br /><br />
	Phone:<br />
	<input type="text"		name="phone"></input><br /><br />
	Password:<br />
	<input type="password"	name="password"></input><br /><br />
	<input type="button" name="registration" id="registration" value="Registration"></button><br />
</form>

<hr>

<form name="login">
	E-mail:<br />
	<input type="e-mail"	name="email"></input><br /><br />
	Password:<br />
	<input type="password"	name="password"></input><br /><br />
	<input type="button" name="login" id="login" value="Login"></button>
</form>

<script src="js/user.js"></script>
<?php
	}
}
?>
