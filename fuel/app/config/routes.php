<?php
return array(
	'_root_'    => 'index/index',  // The default route
	'_404_'     => 'index/404',    // The main 404 route
        'user'          => 'user/index',
        'user/(:any)'   => 'user/index/$1',
        '(:any)'    => 'index/$1',
	
);
