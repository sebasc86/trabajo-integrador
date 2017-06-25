<?php

abstract class DB {
	abstract public function find($value);

	abstract public function findAll($model);

	abstract public function save($model);

}
