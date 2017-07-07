<?php

abstract class DB {
	abstract public function find($value);

	abstract public function findAll();

	abstract public function save($model);

}
