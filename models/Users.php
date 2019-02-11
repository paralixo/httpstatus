<?php
namespace models;

class Users extends \Model
{
	public function get_one_by_api_key (string $api_key) 
	{
		return $this->get_one('users', ['api_key' => $api_key]);
	}
}