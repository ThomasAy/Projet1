<?php
require('ghl_fns.php');

do_html_header("GHL TEST");
	$test = db_connect();
	if ($test == true)
		echo "connecté à la base";
	else
		echo "pas connecté à la base";

	$query = "select * from user";
	$result = $test->query($query);

	if($result['num_rows'] > 0)
		echo "il y a au moins un utilisateur dans la base de données";
	else
		echo "Il n'y a aucun utilisateur dans la base de données pour le moment";

	
do_html_footer();
?>
