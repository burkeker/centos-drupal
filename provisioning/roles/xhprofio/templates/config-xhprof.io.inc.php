<?php
return array(
	'url_base' => 'http://xhprof-io.centos-dev.local/',
	'url_static' => null, // When undefined, it defaults to $config['url_base'] . 'public/'. This should be absolute URL.
	'pdo' => new PDO('mysql:dbname=xhprof_io;host=localhost;charset=utf8', '{{ mysql_admin_user }}', '{{ mysql_admin_passwd }}'),
);