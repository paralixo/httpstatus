<?php
namespace controllers\publics;

use \controllers\internals\Index as InternalIndex;

class Index extends \Controller
{
	public function __construct (\PDO $pdo)
	{
		parent::__construct($pdo);
		$this->internal_index = new InternalIndex($pdo);
	}

	public function home()
	{
		session_start();

		$content = file_get_contents("http://localhost:8080/httpstatus/api/list");
		$content = json_decode($content);

		foreach ($content->websites as $key => $website) {
			$status = file_get_contents("http://localhost:8080/httpstatus/api/status/" . $website->id);
			$status = json_decode($status);
			$website->status = $status->status->code;
		}

		$is_log = isset($_SESSION['api_key']) ? true : false;
		$api_key = $is_log ? $_SESSION['api_key'] : null;

		return $this->render("index/home", ['websites' => $content->websites, 'is_log' => $is_log, 'api_key' => $api_key]);
	}

	public function add()
	{
		session_start();

		$api_key = isset($_SESSION['api_key']) ? $_SESSION['api_key'] : false;

		return $this->render("index/add", ['api_key' => $api_key]);
	}

	public function login() 
	{
		session_start();

		$email = isset($_POST['email']) ? $_POST['email'] : null;
		$pwd = isset($_POST['password']) ? $_POST['password'] : null;

		$user = $this->internal_index->login($email, $pwd);
		if ($user) 
		{
			$_SESSION['email'] = $user['email'];
			$_SESSION['api_key'] = $user['api_key'];
		}

	  	header('Location: /httpstatus');
  		exit();
	}

	public function logout()
	{
		session_destroy();

		header('Location: /httpstatus');
  		exit();
	}

	public function modify(string $id)
	{
		session_start();
		$api_key = isset($_SESSION['api_key']) ? $_SESSION['api_key'] : false;
		$website = $this->internal_index->modify(intval($id));
		return $this->render("index/modify", ['url' => $website['url'], 'id' => $website['id'], 'api_key' => $api_key]);
	}
}
