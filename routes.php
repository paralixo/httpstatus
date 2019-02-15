<?php

    $routes = array(
		'Index' => [
			'home' => '/',
			'add' => '/add/',
			'connexion' => '/connexion/'
        ],
        'Api' => [
        	'home' => '/api/',
        	'list' => '/api/list/',
        	'delete' => '/api/delete/{id}/',
        	'status' => '/api/status/',
        	'history' => '/api/history/',
        	'add' => '/api/add/'
        ]
    );

    define('ROUTES', $routes);
