<?php

	require('Browscap.php');
	require('gbs.php');
	
	$bc = new Browscap('cache');
	$bc->localFile = 'php_browscap.ini';
	$data = $bc->getBrowser();
	
	$gbs = new Monospaced_GBS();
	$grade = $gbs->getGrade($data);

?>

<!DOCTYPE html>
<html lang="en-gb">
	<head>
		<meta charset="utf-8" />
    	<title>GBS experiments</title>
		<?php
			if($grade != 'C') {
		?>
    	<link rel="stylesheet" href="gbs.css" />
		<?php
			}
		?>
	</head>
	<body>
  		<div id="container">
			
			<h1><a href="http://developer.yahoo.com/yui/articles/gbs/">GBS</a> experiments</h1>
			
			<?php
				echo '<p>', $data->Browser,' ',$data->Version,'</p>';
			?>
			
		</div> <!-- end container -->
  	
	</body>
</html>
