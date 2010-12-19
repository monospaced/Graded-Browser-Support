<?php

class Monospaced_GBS
{

	public function getGrade($data)
	{
		$grade = 'X';
		$browser = $data->Browser;
		$version = $data->Version;
		if ($browser == 'IE' && $version < 5 ||
			$browser == 'Safari' && $version < 3 ||
			$browser == 'Firefox' && $version < 3 ||
			$browser == 'Opera' && $version < 9.5 ||
			$browser == 'Netscape' && $version < 8) {
			$grade = 'C';
		}
		return $grade;
	}
		
}	

?>