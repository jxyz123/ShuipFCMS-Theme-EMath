<?php
	$constant_url = array(
		"a_index" => "/teacher"."/index.php?g=Admin&m=A_login&a=index",
		"a_login" => "/teacher"."/index.php?g=Admin&m=Admin&a=teacher",
		"t_login" => "/teacher"."/index.php?g=Admin&m=Teacher&a=index",
		"s_login" => "/teacher"."/index.php?g=Admin&m=Student&a=index",
		"ts_index" => "/teacher"."index.php?g=Admin&m=Ts_login&a=index",
	);

	return array_merge($constant_url);
?>