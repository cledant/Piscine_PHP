<?php
foreach ($_GET as $key => $value)
{
	if (strcmp($key, "action") === 0)
	{
		if (strcmp($value, "set") === 0 || strcmp($value, "get") === 0 || strcmp($value, "del") === 0)
			$action = $value;
	}
}
if (strcmp($action, "set") === 0)
{
	foreach($_GET as $key => $value)
	{
		if (strcmp($key, "name") === 0)
			$c_name = $value;
		if (strcmp($key, "value") === 0)
			$c_value = $value;
	}
	setcookie($c_name, $c_value, time() + (3600 * 24));
}
else if (strcmp($action, "get") === 0)
{
	foreach($_GET as $key => $value)
	{
		if (strcmp($key, "name") === 0)
		{
			foreach ($_COOKIE as $key_c => $value_c)
			{
				if (strcmp($key_c, $value) === 0)
					echo $_COOKIE[$key_c]."\n";
			}
		}
	}
}
else if (strcmp($action, "del") === 0)
{
	foreach($_GET as $key => $value)
	{
		if (strcmp($key, "name") === 0)
		{
			setcookie($key, "", time() - 3600);
		}
	}
}
?>
