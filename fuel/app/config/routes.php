<?php
return array(
	'_root_'    => 'index/index',  // The default route
	'_404_'     => 'index/404',    // The main 404 route
        'login'         => 'index/login',
        'user'          => 'user/index',
        'user/(:any)'   => 'user/index/$1',
	
);
