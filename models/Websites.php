<?php
namespace models;

class Websites extends \Model
{
	public function get_one_by_id (int $id) 
	{
		return $this->get_one('websites', ['id' => $id]);
	}

	public function get_all ()
	{
		return $this->get('websites');
	}

	public function create (string $url)
	{
		$success = $this->insert('websites', ['url' => $url]);
		$id = $this->last_id();
		return array('success' => $success, 'id' => $id);
	}

	public function remove (int $id)
	{
		return $this->delete('websites', ['id' => $id]);
	}

	public function status (int $id)
	{
		return $this->get_one('history', ['id_website' => $id], 'update_time', true);
	}

	public function history (int $id)
	{
		return $this->get('history', ['id_website' => $id], 'update_time', true);
	}
}