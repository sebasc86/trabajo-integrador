<?php

require_once 'DB.php';

class JSONDB extends DB {

	private $path;

	public function __construct($path) 
	{
		$this->path = $path;

	}

	public function findAll($model)
	{
		$registros = file_get_contents($this->path);
		$registros = json_decode($registros, true);
		return $registros[$model::$name];
	}

	public function find($value, $model)
	{
		$registros = $this->findAll($model);
		foreach ($registros as $registro) {
			if ($registro[$model::$primaryKey] == $value) {
				$model->toModel($registro);
				return $model;
			}
		}
		return null;
	}

	public function save($model)
	{
		$current = $this->find($model::$primaryKey, $model);
		if (!$current) {
			$usuario = $model->toArray();
			$registros = file_get_contents($this->path);
			$registros = json_decode($registros, true);
			$registros[$model::$name][] = $usuario;
			file_put_contents($this->path, json_encode($registros));
		} else {
			//to do
		}
	}
}
