<?php
	
	require('gbs.php');
	
?><!DOCTYPE html>
<html lang="en-gb">
	<head>
		<meta charset="utf-8" />
    	<title>GBS experiments</title>

		<?php
			if(!isset($gbs) || $gbs != 'C-grade') {
		?>
		
    	<link rel="stylesheet" href="gbs.css" />

		<?php
			}
		?>
		
	</head>
	<body>
  		<div id="container">	
			<h1>Graded Browser Support</h1>
			
			<?php
			
				if(isset($gbs)) {
					echo '<p>Your browser receives ', $gbs,' support.</p>';
				}
				
			?>
			
		</div>
	</body>
</html>
