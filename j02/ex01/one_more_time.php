#!/usr/bin/php
<?php
if (count($argv) === 1)
	exit;
$str = $argv[1];
$ex_date = explode(" ", $str);
if (count($ex_date) !== 5)
{
	echo "Wrong Format\n";
	exit;
}
$day = $ex_date[0];
$day = strtolower($day);
if (preg_match("/^lundi$/", $day) === 0)
{
	if (preg_match("/^mardi$/", $day) === 0)
	{
		if (preg_match("/^mercredi$/", $day) === 0)
		{
			if (preg_match("/^jeudi$/", $day) === 0)
			{
				if (preg_match("/^vendredi$/", $day) === 0)
				{
					if (preg_match("/^samedi$/", $day) === 0)
					{
						if (preg_match("/^dimanche$/", $day) === 0)
						{
							echo "Wrong Format\n";
							exit;
						}
					}
				}
			}
		}
	}
}
$num_day = $ex_date[1];
if ($num_day < 0 || $num_day > 99)
{
	echo "Wrong Format\n";
	exit;
}
$month = $ex_date[2];
$month = strtolower($month);
$num_month = 1;
if (preg_match("/^janvier$/", $month) === 0)
{
	$num_month = 2;
	if (preg_match("/^fevrier$/", $month) === 0)
	{
		$num_month = 3;
		if (preg_match("/^mars$/", $month) === 0)
		{
			$num_month = 4;
			if (preg_match("/^avril$/", $month) === 0)
			{
				$num_month = 5;
				if (preg_match("/^mai$/", $month) === 0)
				{
					$num_month = 6;
					if (preg_match("/^juin$/", $month) === 0)
					{
						$num_month = 7;
						if (preg_match("/^juillet$/", $month) === 0)
						{
							$num_month = 8;
							if (preg_match("/^aout$/", $month) === 0)
							{
								$num_month = 9;
								if (preg_match("/^septembre$/", $month) === 0)
								{
									$num_month = 10;
									if (preg_match("/^octobre$/", $month) === 0)
									{
										$num_month = 11;
										if (preg_match("/^novembre$/", $month) === 0)
										{
											$num_month = 12;
											if (preg_match("/^decembre$/", $month) === 0)
											{
												echo "Wrong Format\n";
												exit;
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
$year = $ex_date[3];
if ($year < 1970 || $year > 9999)
{
	echo "Wrong Format\n";
	exit;
}
$str2 = $ex_date[4];
$ex_time = explode(":", $str2);
if (count($ex_time) !== 3)
{
	echo "Wrong Format\n";
	exit;
}
$hour = $ex_time[0];
if ($hour < 0 || $hour > 99)
{
	echo "Wrong Format\n";
	exit;
}
$minute = $ex_time[1];
if ($minute < 0 || $minute > 99)
{
	echo "Wrong Format\n";
	exit;
}
$second = $ex_time[2];
if ($second < 0 || $second > 99)
{
	echo "Wrong Format\n";
	exit;
}
date_default_timezone_set('Europe/Paris');
$ret_time = mktime($hour, $minute, $second, $num_month, $num_day, $year);
echo $ret_time."\n";
?>
