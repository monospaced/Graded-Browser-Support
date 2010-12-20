<?php

	$gbs = 'A-grade or X-grade';

	if (isset($_COOKIE['gbs'])) {
	
		$gbs = $_COOKIE['gbs'];
	
	} else {

		require('Browscap.php');

		$bc = new Browscap('cache');
		$bc->localFile = 'php_browscap.ini';
		$data = $bc->getBrowser();
		$browser = $data->Browser;
		$version = $data->Version;
		
		if ($browser == 'IE' && $version < 5 ||
			$browser == 'Safari' && $version < 3 ||
			$browser == 'Firefox' && $version < 3 ||
			$browser == 'Opera' && $version < 9.5 ||
			$browser == 'Netscape' && $version < 8) {
				
			$gbs = 'C-grade';
			
		}
	
		setcookie('gbs',$gbs);
	
	}

?>
