<?php

    $routes = array(
		'Index' => [
			'home' => '/',
			'add' => '/add/',
			'login' => '/login/',
			'logout' => '/logout/'
        ],
        'Api' => [
        	'home' => '/api/',
        	'list' => '/api/list/',
        	'delete' => '/api/delete/{id}/',
        	'status' => '/api/status/{id}',
        	'history' => '/api/history/{id}',
        	'add' => '/api/add/'
        ]
    );

    define('ROUTES', $routes);
