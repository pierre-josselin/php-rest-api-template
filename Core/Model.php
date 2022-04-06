<?php
namespace Core;

abstract class Model {
    public function __get(string $name) {
        trigger_error("Property " . get_class($this) . "::\${$name} is not declared", E_USER_ERROR);
    }

    public function __set(string $name, $value) {
        trigger_error("Property " . get_class($this) . "::\${$name} is not declared", E_USER_ERROR);
    }
}
