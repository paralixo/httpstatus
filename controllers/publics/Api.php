<?php
namespace controllers\publics;

use \controllers\internals\Api as InternalApi;

class Api extends \Controller
{
	public function __construct (\PDO $pdo)
	{
		parent::__construct($pdo);
		$this->internal_api = new InternalApi($pdo);
	}

	public function test()
	{
		$url = $this->internal_api->home(1);
		return $this->render("index/home", ["url" => $url]);
	}

	public function home()
	{
		$is_key_valide = $this->internal_api->ckeck_api_key($_GET['api_key']);
		if (!$is_key_valide) return $is_key_valide;

		$value = array('version' => 1, 'list' => 'http://localhost/httpstatus/api/list');
		header('Content-type: application/json');
		echo json_encode($value);	
	}

	public function list()
	{
		$is_key_valide = $this->internal_api->ckeck_api_key($_GET['api_key']);
		if (!$is_key_valide) return $is_key_valide;

		$websites = $this->internal_api->list();
		$list = array('version' => 1, 'websites' => $websites);
		header('Content-type: application/json');
		echo json_encode($list);	
	}

	public function add()
	{
		$is_key_valide = $this->internal_api->ckeck_api_key($_GET['api_key']);
		if (!$is_key_valide) return $is_key_valide;

		$url = $_POST["url"];
		$add = $this->internal_api->add($url);
		header('Content-type: application/json');
		echo json_encode($add);
	}

	public function delete()
	{
		echo 'bison';
	}
}
