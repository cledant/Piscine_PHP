<?PHP
function super()
{
	session_start();
	if (!file_exists("bdd/user"))
		return FALSE;
	$tab = array();
	if (!($tab = unserialize(@file_get_contents("bdd/user"))))
		return FALSE;
	foreach ($tab as $key => $value)
	{
		if (strcmp($key, $_SESSION["ID"]) === 0)
			if ($value["user_type"] == 1)
				return TRUE;
	}
	return FALSE;
}
