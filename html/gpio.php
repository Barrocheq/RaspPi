<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Raspberry PI</title>
	</head>
	<body>
		<h1>RaspberryPi Commander</h1>
		<form method="post">
				<?php
					$array = array(14,15,18,23,24,25,8,7,12,16,20,21,2,3,4,17,27,22,10,9,11,5,6,13,19,26);
					$a = 1;
					$b = 1;
					$c = 1;
					while ($a <= 4) {
						echo '<div class="div'.$a.'">';
						echo '<h2>Center '.$a.'</h2>';
						while ($b <= 10) {
							if (!in_array($c,$array)){
								$b = $b +1;
								$c = $c +1;
								continue;
							}
							$var = exec("gpio -g read ".$c);
							if((1-$var) == 0) {
								echo '<button class="on" name="button'.$c.'">LED'.$c.'</button>';
							} else {
								echo '<button class="off" name="button'.$c.'">LED'.$c.'</button>';
							}

							$b = $b +1;
							$c = $c +1;
						}
						$a = $a+1;
						$b = 1;
						echo '</div>';
					}
				 ?>
		</form>
	</body>
</html>



<?php
		$a = 1;
		while ($a <= 40) {
			if (isset($_POST['button'.$a]))
			{
				echo $a;
				$var = exec("gpio -g read ".$a);
				$var = 1-$var;
				exec( "gpio -g mode ".$a." out");
				exec("gpio -g write ".$a." ".$var);
			}
			$a = $a +1;
		}
?>
