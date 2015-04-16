<?php
	$action_part = array(
		"APP_GROUP_LIST" => "Admin",
		"DEFAULT_GROUP" => "Admin",
	);

	$db_part = array(
		"DB_HOST" => "localhost",
		"DB_USER" => "root",
		"DB_PWD" => "root",
		"DB_NAME" => "teacher",
		"DB_PREFIX" => "ts_",
		"DB_CHARSET" => "utf-8",
	);

	$dir_part = array(
		"TMPL_PARSE_STRING" => array(
			"__PUBLIC__" => '/teacher'.'/'.APP_NAME.'/Tpl/Public',
		),

		"TMPL_VAR_IDENTIFY" => "array",
	);

	$url_part = array(
		"URL_MODEL" => 0,
	);

	$constant_url = array(
		"home_page" => 'http://maths.hust.edu.cn/',
	);

	return array_merge($action_part, $db_part, $dir_part, $url_part, $constant_url);
?>