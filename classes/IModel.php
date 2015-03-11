<?php

namespace Application\Classes;

interface IModel {
    public static function findAll();
    public static function findByPk($id);
    public static function findByColumn($column, $value);
    public function save();
    public function delete();
}

?>