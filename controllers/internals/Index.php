<?php
namespace controllers\internals;

use \models\Websites as ModelWebsites;
use \models\Users as ModelUsers;

class Index extends \InternalController
{
	public function __construct (\PDO $pdo)
	{
		$this->model_websites = new ModelWebsites($pdo);
		$this->model_users = new ModelUsers($pdo);
	}

	public function login (string $email, string $pwd)
	{
		return $this->model_users->get_one_by_email($email, $pwd);
	}

	public function modify (int $id)
	{
		return $this->model_websites->get_one_by_id(intval($id));
	}
}