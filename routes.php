<?php

    $routes = array(
		'Index' => [
			'home' => '/',
			'add' => '/add/',
			'login' => '/login/',
			'logout' => '/logout/',
            'modify' => '/modify/{id}/',
            'history' => '/history/{id}/'
        ],
        'Api' => [
        	'home' => '/api/',
        	'list' => '/api/list/',
        	'delete' => '/api/delete/{id}/',
        	'status' => '/api/status/{id}/',
        	'history' => '/api/history/{id}/',
        	'add' => '/api/add/',
            'update' => '/api/update/{id}/'
        ]
    );

    define('ROUTES', $routes);
