<?PHP
	session_start();
	if (!file_exists("bdd/user"))
	{
		echo "ERROR\n";
		return 0;
	}
	
