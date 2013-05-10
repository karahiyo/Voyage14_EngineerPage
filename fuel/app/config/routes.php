<?php
return array(
	'_root_'    => 'index/index',  // The default route
	'_404_'     => 'index/404',    // The main 404 route
        'user'          => 'user/index/index',
        'login'     => 'index/login',
        'logout'    => 'index/logout',
        'seminar/(:any)'    => 'seminar/index/$1',
);
