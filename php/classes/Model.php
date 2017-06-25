<?php

abstract class Model {

	private $db;

	public function __construct(DB $db)
	{
		$this->db = $db;
	}

	public function findAll()
	{
		return $this->db->findAll($this);
	}

	public function find($value)
	{
		return $this->db->find($value, $this);
	}

	public function save()
	{
		$this->db->save($this);
	}



	abstract public function toModel($data);

}
