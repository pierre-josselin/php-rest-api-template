<?php

namespace Core\Traits;

trait NonInstantiableClass
{
    public function __construct()
    {
        trigger_error("Attempt to instantiate the non-instantiable class " . get_class($this), E_USER_ERROR);
    }
}
