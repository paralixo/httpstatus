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

	public function home()
	{
		$value = array('version' => 1, 'list' => 'http://localhost/httpstatus/api/list');
		header('Content-type: application/json');
		echo json_encode($value);	
	}

	public function list()
	{
		$websites = $this->internal_api->list();
		$list = array('version' => 1, 'websites' => $websites);
		header('Content-type: application/json');
		echo json_encode($list);	
	}

	public function add()
	{
		$is_key_valide = $this->internal_api->ckeck_api_key();
		if (!$is_key_valide) return $is_key_valide;

		$url = $_POST["url"];
		$add = $this->internal_api->add($url);
		header('Content-type: application/json');
		echo json_encode($add);
	}

	public function delete(string $id)
	{
		$is_key_valide = $this->internal_api->ckeck_api_key();
		if (!$is_key_valide) return $is_key_valide;

		$delete = $this->internal_api->remove(intval($id));
		header('Content-type: application/json');
		echo json_encode($delete);
	}
}
