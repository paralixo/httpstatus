<?php
namespace controllers\publics;

class Index extends \Controller
{
	public function home()
	{
		session_start();

		$content = file_get_contents("http://localhost:8080/httpstatus/api/list");
		$content = json_decode($content);
		return $this->render("index/home", ['websites' => $content->websites]);
	}

	public function add()
	{
		session_start();

		return $this->render("index/add");
	}

	public function connexion() 
	{
		session_start();

		return $this->home();
	}
}
