<?php
return array(
	'_root_'    => 'index/index',  // The default route
	'_404_'     => 'index/404',    // The main 404 route
        'user'          => 'user/index/index',
        'user/(:any)'   => 'user/index/$1',
        'login'     => 'index/login',
        'logout'    => 'index/logout',
        'seminar/(:any)'    => 'seminar/index/$1',
);
