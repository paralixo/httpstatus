<?php

    $routes = array(
		'Index' => [
			'home' => '/',
			'home2' => '/bison/',
			'add' => '/add/'
        ],
        'Api' => [
        	'home' => '/api/',
        	'list' => '/api/list/',
        	'delete' => '/api/delete/',
        	'status' => '/api/status/',
        	'history' => '/api/history/',
        	'add' => '/api/add/',
        	'test' => '/api/bison/'
        ]
    );

    define('ROUTES', $routes);
