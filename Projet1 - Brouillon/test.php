<?php
require('ghl_fns.php');
?>
<html>
	<head>
		<title>GHL</title>
		<meta charset="utf-8" content="text/html">
	</head>
	
	<body>
	<?php $test = db_connect();
	if ($test == true)
		echo "connecté à la base";
	else
		echo "pas connecté à la base";

	?>

	</body>

</html>


