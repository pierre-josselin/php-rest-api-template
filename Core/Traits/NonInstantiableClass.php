<?php

namespace Core\Traits;

trait NonInstantiableClass
{
    private function __construct()
    {
    }
}
