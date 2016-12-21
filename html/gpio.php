<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Raspberry PI</title>
	</head>
	<body>
		<form method="post">
			<table>
				<?php
					$a = 1;
					$b = 1;
					$c = 1;
					while ($a <= 2) {
						echo "<tr>";
						while ($b <= 20) {
							echo "<td>";
							echo '<button name="button'.$c.'">LED'.$c.'</button>';
							echo "</td>";
							$b = $b +1;
							$c = $c +1;
						}
						echo "</tr>";
						echo "\n";
						$a = $a+1;
						$b = 1;
					}
				 ?>
			</table>
	</forme>

	</body>
</html>


<?php
		$a = 1;
		while ($a <= 40) {

			if (isset($_POST['button'.$a]))
			{
				exec( "gpio -g mode ".$a" out");
				exec("gpio -g write ".$a" 1");
			}
			$a = $a +1;
		}
?>
