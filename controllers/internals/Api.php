<?php
namespace controllers\internals;

use \models\Websites as ModelWebsites;

class Api extends \InternalController
{
	public function __construct (\PDO $pdo)
	{
		$this->model_websites = new ModelWebsites($pdo);
	}

	public function home (int $id)
	{
		$website = $this->model_websites->get_one_by_id($id);
		$url = $website["url"];

		return $url;
	}

	public function list ()
	{
		$list = array();
		$url_base = 'http://localhost/httpstatus/api/';
		$websites = $this->model_websites->get_all();

		foreach ($websites as $website) {
			$id = $website['id'];
			$url = $website['url'];
			$w = array( 'id' => $id,
						'url' => $url,
						'delete' => $url_base . 'delete/' . $id,
						'status' => $url_base . 'status/' . $id,
						'history' => $url_base . 'history/' . $id);
			array_push($list, $w);
		}

		return $list;
	}

	public function add (string $url)
	{
		$add = $this->model_websites->create($url);
		$add['success'] = $add['success'] == 1 ? true : false;
		return $add;
	}
}