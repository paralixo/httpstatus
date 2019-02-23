<?php
namespace controllers\internals;

use \models\Websites as ModelWebsites;
use \models\Users as ModelUsers;

class Api extends \InternalController
{
	public function __construct (\PDO $pdo)
	{
		$this->model_websites = new ModelWebsites($pdo);
		$this->model_users = new ModelUsers($pdo);
	}

	public function ckeck_api_key ()
	{
		$api_key = isset($_GET['api_key']) ? $_GET['api_key'] : '';
		$user = $this->model_users->get_one_by_api_key($api_key);
		$is_api_valid = empty($user) ? false : true;

		if (!$is_api_valid)
		{
			return $this->render("index/noapikey");
		}

		return $is_api_valid;
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

	public function remove (int $id)
	{
		$delete = $this->model_websites->remove($id);
		$delete = $delete == 1 ? true : false;
		return array('success' => $delete);
	}

	public function status (int $id)
	{
		$status = $this->model_websites->status($id);
		$website = $this->model_websites->get_one_by_id($id);

		$output = array();
		$output['id'] = $website['id'];
		$output['url'] = $website['url'];
		$output['status'] = array ('code' => $status['status'], 'at' => $status['update_time']);

		return $output;
	}

	public function history (int $id)
	{
		$history = $this->model_websites->history($id);
		$website = $this->model_websites->get_one_by_id($id);

		$output = array();
		$output['id'] = $website['id'];
		$output['url'] = $website['url'];

		$status = array();
		foreach ($history as $hist) {
			array_push($status, ['code' => $hist['status'], 'at' => $hist['update_time']]);
		}

		$output['status'] = $status;
		return $output;
	}
}