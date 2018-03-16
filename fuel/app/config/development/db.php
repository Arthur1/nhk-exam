<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=nhk-exam',
			'username'   => getenv('DB_USERNAME'),
			'password'   => getenv('DB_PASSWORD'),
		),
	),
);
